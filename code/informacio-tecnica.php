<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/gramola-css.css"> <!-- Enllaça a l'arxiu CSS per a l'estil -->
    <link rel="icon" type="image/png" href="img/logo/logo-gramola.png"> <!-- Defineix una icona per a la pestanya del navegador -->
    <script src="js/gramola-js.js"></script> <!-- Enllaça a l'arxiu JavaScript -->
    <title>INFORMACIÓ TÈCNICA</title> <!-- Defineix el títol de la pàgina -->
</head>
<body class="body4"> <!-- Estableix la classe del cos de la pàgina -->

<br>

<div class="cookie"> <!-- Inicia una secció amb una classe "cookie" -->
    <p class="info-cookie">NOM D'USUARI:
        <?php
            echo $_COOKIE["username"]; // Mostra el valor de la cookie "username"
        ?>
    </p>
    <br>
    <p class="info-cookie">ULTIMA PLAYLIST SELECCIONADA:

    <?php
    if (isset($_COOKIE['ultimaplaylist'])) { // Comprova si existeix la cookie "ultimaplaylist"
        $cookieValue = json_decode($_COOKIE['ultimaplaylist']); // Decodifica el valor de la cookie com a JSON
        $nombres = $cookieValue->nombre; // Obté els noms de les playlists de l'objecte JSON
        $timestamps = $cookieValue->fecha; // Obté els timestamps de les playlists de l'objecte JSON

        date_default_timezone_set('Europe/Madrid'); // Estableix la zona horària

        echo "Playlist " . implode($nombres) . "<br>"; // Mostra els noms de les playlists concatenats

        $timestamp = intval($timestamps[0]); // Obté el primer timestamp com a enter
        $fechaHora = date("d/m/Y H:i", $timestamp); // Formateja el timestamp com a data i hora

        echo "DATA I HORA: " . $fechaHora . "<br>"; // Mostra la data i hora formatejades
    } else {
        echo "La cookie no está configurada."; // Mostra un missatge si la cookie no existeix
    }
    ?>
    </p>
</div>

<a href="../index.php" class="tornar-index2">Tornar a la pàgina principal</a> <!-- Crea un enllaç per tornar a la pàgina principal -->
</body>
</html>
