<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <link rel="stylesheet" href="css/gramola-css.css">
            <script src="js/gramola-js.js"></script>
            <title>Informació Tècnica</title>
        </head>
        <body class="body4">
            <br>
            <div class="cookie">
                <p class="info-cookie">NOM D'USUARI:
                    <?php
                        echo $_COOKIE["username"];
                    ?>
                    </p>
                    <br>
                <p class="info-cookie">ULTIMA PLAYLIST SELECCIONADA:

                <?php
if (isset($_COOKIE['ultimaplaylist'])) {
    // Recupera la cookie y conviértela de nuevo en un objeto JavaScript
    $cookieValue = json_decode($_COOKIE['ultimaplaylist']);
    
    // Accede a los valores de la cookie
    $nombres = $cookieValue->nombre;
    $timestamps = $cookieValue->fecha;
    
    // Configura el huso horario a CEST
    date_default_timezone_set('Europe/Madrid');

    // Puedes hacer lo que quieras con los valores aquí, como mostrarlos en la página
    echo "Playlist " . implode($nombres) . "<br>";

    // Convierte el timestamp a una fecha y hora en PHP
    $timestamp = intval($timestamps[0]);
    $fechaHora = date("d/m/Y H:i", $timestamp);

    echo "DATA I HORA: " . $fechaHora . "<br>";
} else {
    echo "La cookie no está configurada.";
}
?>        
                </p>
                
            </div>
            <a href="index.php" class="tornar-index2">Tornar a la pàgina principal</a>
        </body>
    </html>
    