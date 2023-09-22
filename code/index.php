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
                <div class="perfil">
                    <p class="form" >Hola, "NOM"</p>
                </div>
                <div class="navegador"></div>
            </header>
            
                <div class="contingut">
                <div class="contingut-principal">
                    
                    <a href="index.php?playlist=rap.json">
                    <img src="img/playlists/rap.jpg" class="playlist-rap">
                    </a>
                    <a href="index.php?playlist=rock.json">
                    <img src="img/playlists/rock.jpg" class="playlist-rock">
                    </a>
                    <a href="index.php?playlist=techno.json">
                    <img src="img/playlists/techno.jpg" class="playlist-techno">
                    </a>
                    <a href="index.php?playlist=urbano.json">
                    <img src="img/playlists/urbano.jpg" class="playlist-urbano">
                    </a>  
                </div>
                    
                    <div class="contingut-secundari">
                        <p>
                        <?php
                            echo $_GET["playlist"];
                        ?>
                        </p>
                    </div>
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
                        <div id="currentTime">0:00</div>
                        <div id="duration">0:00</div>
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
