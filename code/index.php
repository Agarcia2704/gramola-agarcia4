<?php
    $rap = file_get_contents("json/rap.json");
    $rock = file_get_contents("json/rock.json");
    $techno =file_get_contents("json/techno.json");
    $urbano = file_get_contents("json/urbano.json");
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
                    <img src="img/logo/logo-gramola.png" class="img-logo" id="recargar" >
                </div>
                <div class="perfil">
                    <p class="form" >Hola, "NOM"</p>
                </div>
                <div class="navegador"></div>
            </header>
            
                <div class="contingut">
                <div class="contingut-principal">
                    <img src="img/playlists/rap.jpg" class="playlist-rap" id="rap" onclick="rap()">
                    <img src="img/playlists/rock.jpg" class="playlist-rock" id="rock" onclick="rock()">
                    <img src="img/playlists/techno.jpg" class="playlist-techno" id="techno" onclick="techno()">
                    <img src="img/playlists/urbano.jpg" class="playlist-urbano" id="urbano" onclick="urbano()">
                </div>
                <div class="contingut-secundari">
                        
                   

                    </div>
                </div>
            <nav>
                <div class="nav"></div>
            </nav>


            <script>
                var song;
                function rap(){
                    song = JSON.parse(<?php echo json_encode($rap)?>);
                    x = 0;
                    selected();
                }

                function rock(){
                    song = JSON.parse(<?php echo json_encode($rock)?>);
                    x = 0;
                    selected();
                }

                function techno(){
                    song = JSON.parse(<?php echo json_encode($techno)?>);
                    x = 0;
                    selected();

                }

                function urbano(){
                    song = JSON.parse(<?php echo json_encode($urbano)?>);
                    x = 0;
                    selected();
                }

                
            </script>

            <footer class="footer">
                <!--L'element <footer> conté informació que apareix a la part inferior de la pàgina web-->
                <div class="reproductor">

                
                    <div class="text-info">
                        <img src="" alt="" id="cover">
                        <div class="info">
                            <span id="titol"></span>
                            <br>
                            <span id="artista"></span>
                        </div>
                    </div>

                    <div class="icones">
                        <img src="img/icones/icone-aleatori.png" class="icone-aleatori" id="aleatori">
                        <img src="img/icones/icone-enrere.png" class="icone-enrere" id="enrere" onclick="back()">
                        <img src="img/icones/icone-play.png" class="stop" id="rep">
                        <img src="img/icones/icone-avançar.png" class="icone-avançar" id="avançar" onclick="next()">
                        <img src="img/icones/icone-parar.png" class="icone-parar" id="parar">
                    </div>

                    <div>
                        <div id="currentTime">0:00</div>
                        <div id="duration">0:00</div>
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
