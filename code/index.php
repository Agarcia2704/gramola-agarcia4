<?php
    $rap = json_decode(file_get_contents("json/rap.json"));
    $rock = json_decode(file_get_contents("json/rock.json"));
    $techno = json_decode(file_get_contents("json/techno.json"));
    $urbano = json_decode(file_get_contents("json/urbano.json"));
?>

<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <link rel="icon" type="image/png" href="img/logo/logo-gramola.png">
            <link rel="stylesheet" href="css/gramola-css.css">
            
            
            <title>GRAMOLA 2.0</title>
            
        </head>
        <body>
            <!-- La secció <body> conté el contingut principal de la pàgina web.-->
            
            <!--Vinculació del JavaScript amb l'HTML-->
            <header>
                <!--L'element <header> conté elements que apareixen a la part superior de la pàgina web-->
                <div class="logo">
                    <img src="img/logo/logo-gramola.png" class="img-logo">
                </div>
                <div class="perfil"></div>
                <div class="navegador"></div>
            </header>
            
                <div class="contingut">
                <div class="contingut-principal">
                    <img onclick="playPlaylist(<?php echo json_encode($rap) ?>)" src="img/playlists/rap.jpg" class="playlist-rap">
                    <img onclick="playPlaylist(<?php echo json_encode($rock) ?>)" src="img/playlists/rock.jpg" class="playlist-rock">
                    <img onclick="playPlaylist(<?php echo json_encode($techno) ?>)" src="img/playlists/techno.jpg" class="playlist-techno">
                    <img onclick="playPlaylist(<?php echo json_encode($urbano) ?>)" src="img/playlists/urbano.jpg" class="playlist-urbano">   
                </div>
                    
                    <div class="contingut-secundari"></div>
                </div>
            <nav>
                <div class="nav"></div>
            </nav>

            <footer class="footer">
                <!--L'element <footer> conté informació que apareix a la part inferior de la pàgina web-->
                <div class="reproductor">
                    <div class="icones">
                        <img src="img/icones/icone-aleatori.png" class="icone-aleatori" id="aleatori">
                        <img src="img/icones/icone-enrere.png" class="icone-enrere" id="enrere">
                        <img src="img/icones/icone-play.png" class="stop" id="rep">
                        <img src="img/icones/icone-avançar.png" class="icone-avançar" id="avançar">
                        <img src="img/icones/icone-parar.png" class="icone-parar" id="parar">
                    </div>
                    <div class="audio-controls">
                        <div class="progress-container">
                            <div class="progress" id="progress"></div>
                        </div>
                    </div>
                </div>
                <script src="js/gramola-js.js"></script>

            </footer>
        </body>
    </html>
