<?php
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $titol = $_POST["titol"];
    $artista = $_POST["artista"];
    $arxiu_mp3 = $_FILES["arxiu_mp3"];
    $arxiu_img = $_FILES["arxiu_img"];
    
    // Verificar que los archivos sean válidos
    if ($arxiu_mp3["error"] === 0 && $arxiu_img["error"] === 0) {
        // Mover los archivos a las carpetas correspondientes (json y caratulas)
        $nombre_mp3 = "json/" . $arxiu_mp3["name"];
        $nombre_imagen = "caratulas/" . $arxiu_img["name"];
        move_uploaded_file($arxiu_mp3["tmp_name"], $nombre_mp3);
        move_uploaded_file($arxiu_img["tmp_name"], $nombre_imagen);
        
        // Cargar el JSON actual
        $canciones = json_decode(file_get_contents("json/canciones.json"), true);
        
        // Crear un nuevo objeto de canción
        $nuevaCancion = [
            "titol" => $titol,
            "artista" => $artista,
            "url" => $nombre_mp3,
            "cover" => $nombre_imagen
        ];
        
        // Agregar la nueva canción al JSON
        array_push($canciones, $nuevaCancion);
        
        // Guardar el JSON actualizado
        file_put_contents("json/canciones.json", json_encode($canciones));
        
        // Redireccionar de vuelta a la página de lista de canciones
        header("Location: lista_canciones.php");
        exit;
    } else {
        echo "Error al cargar los archivos.";
    }
}
?>
