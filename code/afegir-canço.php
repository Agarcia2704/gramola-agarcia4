<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titol = $_POST["titol"];
    $artista = $_POST["artista"];
    $arxiu_mp3 = $_FILES["arxiu_mp3"];
    $arxiu_img = $_FILES["arxiu_img"];
    // Verificar que los archivos sean válidos
if ($arxiu_mp3["error"] === 0 && $arxiu_img["error"] === 0) {
    $nombre_mp3 = "playlist/cançons-afeguides/" . $arxiu_mp3["name"];
    $nombre_imagen = "img/cover-cançons-afeguides/" . $arxiu_img["name"];
if (move_uploaded_file($arxiu_mp3["tmp_name"], $nombre_mp3) && move_uploaded_file($arxiu_img["tmp_name"], $nombre_imagen)) {
    $canciones = json_decode(file_get_contents("json/canciones.json"), true);
    $nuevaCancion = [
        "titol" => $titol,
        "artista" => $artista,
        "url" => $nombre_mp3,
        "cover" => $nombre_imagen
    ];
    array_push($canciones, $nuevaCancion);
    if (file_put_contents("json/canciones.json", json_encode($canciones))) {
        header("Location: llista-cançons.php");
        exit;
    } else {
        echo "Error al guardar les dades a l'arxiu JSON.";
    }
    } else {
        echo "Error al moure els arxius moguts.";
    }
} else {
    echo "Error al carregar els arxius. Codi d'error MP3: " . $arxiu_mp3["error"] . ", Codi d'error Imagen: " . $arxiu_img["error"];
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/gramola-css.css">
    <script src="js/gramola-js.js"></script>
    <title>Pujar cançó</title>
</head>
<body class="body2">
    <h1 class="pujar-canço">PUJAR CANÇÓ</h1>
    <form method="post" enctype="multipart/form-data">
        <div class="formulari-pujar-cançons">
            <label for="titol">Titol:</label>
            <input type="text" name="titol" required><br><br>
            <label for="artista">Artista:</label>
            <input type="text" name="artista" required><br><br>
            <label for="arxiu_mp3">Arxiu MP3:</label>
            <input type="file" name="arxiu_mp3" accept=".mp3" required><br><br>
            <label for="arxiu_img">Cover (JPG i PNG):</label>
            <input type="file" name="arxiu_img" accept=".jpg, .png, jpeg" required><br><br>
            <input type="submit" value="Pujar cançó" class="boto-pujar">
        </div>
    </form>
    <br>
    <a href="index.php" class="tornar-index">Tornar a la pàgina principal</a>
</body>
</html>