

<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <link rel="stylesheet" href="css/gramola-css.css">
            <script src="js/gramola-js.js"></script>
            <title>Informació Tècnica</title>
        </head>
        <body>
            <br>
            <div class="coockie">
                <p class="info-coockie">NOM D'USUARI:
                    <?php
                        echo $_COOKIE["username"];
                    ?>
                    </p>
                    <br>
                <p class="info-coockie">ULTIMA PLAYLIST SELECCIONADA:
                <>
                
                    <?php
                        //echo $_COOKIE["lastPlaylist"]
                        if (isset($_COOKIE["lastPlaylist"])) {
                            echo $_COOKIE["lastPlaylist"];
                        } else {
                            echo "No s'ha seleccionat cap playlist.";
                        }
                    ?>
                    
                </p>
            </div>
        </body>
    </html>
    