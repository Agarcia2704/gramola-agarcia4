<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") { // Comprova si la sol·licitud és una sol·licitud POST
    $titol = $_POST["titol"]; // Obté el valor del camp "titol" del formulari POST
    $artista = $_POST["artista"]; // Obté el valor del camp "artista" del formulari POST
    $arxiu_mp3 = $_FILES["arxiu_mp3"]; // Obté la informació de l'arxiu MP3 carregat
    $arxiu_img = $_FILES["arxiu_img"]; // Obté la informació de l'arxiu d'imatge carregat

    // Verifica que els arxius carregats siguin vàlids
    if ($arxiu_mp3["error"] === 0 && $arxiu_img["error"] === 0) {
        // Defineix els noms d'arxius de destinació per a l'arxiu MP3 i la imatge
        $nombre_mp3 = "playlist/cançons-afeguides/" . $arxiu_mp3["name"];
        $nombre_imagen = "img/cover-cançons-afeguides/" . $arxiu_img["name"];

        // Mou els arxius carregats a les seves ubicacions de destinació
        if (move_uploaded_file($arxiu_mp3["tmp_name"], $nombre_mp3) && move_uploaded_file($arxiu_img["tmp_name"], $nombre_imagen)) {
            // Llegeix el contingut actual del fitxer JSON de les cançons
            $canciones = json_decode(file_get_contents("json/canciones.json"), true);

            // Crea una nova entrada de cançó amb les dades proporcionades
            $nuevaCancion = [
                "titol" => $titol,
                "artista" => $artista,
                "url" => $nombre_mp3,
                "cover" => $nombre_imagen
            ];

            // Afegix la nova cançó a l'array de cançons
            array_push($canciones, $nuevaCancion);

            // Guarda les dades actualitzades al fitxer JSON
            if (file_put_contents("json/canciones.json", json_encode($canciones))) {
                // Redirigeix l'usuari a una altra pàgina després d'afegir la cançó
                header("Location: llista-cançons.php");
                exit;
            } else {
                echo "Error al guardar les dades a l'arxiu JSON.";
            }
        } else {
            echo "Error al moure els arxius moguts.";
        }
    } else {
        // Mostra un missatge d'error si hi ha problemes amb els arxius carregats
        echo "Error al carregar els arxius. Codi d'error MP3: " . $arxiu_mp3["error"] . ", Codi d'error Imagen: " . $arxiu_img["error"];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/gramola-css.css">
    <link rel="icon" type="image/png" href="img/logo/logo-gramola.png">
    <script src="js/gramola-js.js"></script>
    <title>AFEGUIR CANÇÓ</title>
</head>
<body class="body2">
    <h1 class="pujar-canço">AFEGIR CANÇÓ</h1>
    <!--formulari per afegir cançó-->
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
    <a href="../index.php" class="tornar-index">Tornar a la pàgina principal</a>
</body>
</html>