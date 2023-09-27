<?php
    $rap = file_get_contents("json/rap.json");
    $rock = file_get_contents("json/rock.json");
    $techno =file_get_contents("json/techno.json");
    $urbano = file_get_contents("json/urbano.json");
?>

<?php
   
   $inicisessio = false;
   
   if (isset($_POST["username"])) {
    $usuari = $_POST["username"];
    $inicisessio = true;
   }
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
                <?php if (!$inicisessio): ?>
                <video src="vid/banner-gramola.mp4" class="banner" autoplay loop></video>
                <?php endif; ?>
                <?php if ($inicisessio): ?>
                    <a href="index.php" class="log-out-form">LOG OUT</a>
                    <div class="nom-form">
                        <?php echo 'Hola, ' . $usuari ?>
                    </div>
                    <?php endif; ?> 
                    
                </div>

                <div class="navegador">
                <?php if ($inicisessio): ?>
                    
                    <video src="vid/banner-gramola.mp4" class="banner" autoplay loop></video>

                    <?php endif; ?>
                <?php if (!$inicisessio): ?>
                <div class="formulario">
                
                    <h2 class="lletra-form">Formulari Inici de Sessió</h2>
                    <form action="#" method="post">
                        <input class="lletra-form" type="text" name="username" placeholder="Nom d'usuari" required>
                        <button class="lletra-form" type="submit">Enviar</button>
                    </form>
                </div> 
                <?php endif; ?> 

                </div>
            </header>
            
                <div class="contingut">
                <div class="contingut-principal">
                    <img src="img/playlists/rap.jpg" class="playlist-rap" id="rap" onclick="rap()">
                    <img src="img/playlists/rock.jpg" class="playlist-rock" id="rock" onclick="rock()">
                    <img src="img/playlists/techno.jpg" class="playlist-techno" id="techno" onclick="techno()">
                    <img src="img/playlists/urbano.jpg" class="playlist-urbano" id="urbano" onclick="urbano()">
                </div>
                <div class="contingut-secundari">

                <div class="contingut-secundari">
                    <div class="info-secundari">
                        <ul id="lista-canciones"></ul>
                    </div>
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
                    mostrarLista(song);
                }

                function rock(){
                    song = JSON.parse(<?php echo json_encode($rock)?>);
                    x = 0;
                    selected();
                    mostrarLista(song);
                }

                function techno(){
                    song = JSON.parse(<?php echo json_encode($techno)?>);
                    x = 0;
                    selected();
                    mostrarLista(song);
                }

                function urbano(){
                    song = JSON.parse(<?php echo json_encode($urbano)?>);
                    x = 0;
                    selected();
                    mostrarLista(song);
                }
                
            </script>

            <footer class="footer">
                <!--L'element <footer> conté informació que apareix a la part inferior de la pàgina web-->
                <div class="reproductor">                
                    <div class="text-info">
                    <img src="" alt="" id="cover" hidden>
                        <div class="info">
                            <span id="titol"></span>
                            <br>
                            <b id="artista"></b>
                        </div>
                    </div>

                    <div class="icones">
                        <img src="img/icones/icone-aleatori.png" class="icone-aleatori" id="aleatori" onmouseover="cambiarAleatori()" onmouseout="restaurarAleatori()" onclick="aleatori()">
                        <img src="img/icones/icone-enrere.png" class="icone-enrere" id="enrere" onmouseover="cambiarEnrere()" onmouseout="restaurarEnrere()" onclick="back()">
                        <img src="img/icones/icone-play.png" class="stop" id="rep" onmouseover="cambiarPlay()" onmouseout="restaurarPlay()">
                        <img src="img/icones/icone-avançar.png" class="icone-avançar" id="avançar" onmouseover="cambiarAvançar()" onmouseout="restaurarAvançar()" onclick="next()">
                        <img src="img/icones/icone-parar.png" class="icone-parar" id="parar"onmouseover="cambiarParar()" onmouseout="restaurarParar()" >
                    </div>

                    <div class="equalizer" id="equalizer">
                        <div class="equalizer__bar"></div>
                        <div class="equalizer__bar"></div>
                        <div class="equalizer__bar"></div>
                        <div class="equalizer__bar"></div>
                        <div class="equalizer__bar"></div>
                        <div class="equalizer__bar"></div>
                        <div class="equalizer__bar"></div>
                        <div class="equalizer__bar"></div>
                        <div class="equalizer__bar"></div>
                        <div class="equalizer__bar"></div>
                        <div class="equalizer__bar"></div>
                        <div class="equalizer__bar"></div>
                        <div class="equalizer__bar"></div>
                        <div class="equalizer__bar"></div>
                        <div class="equalizer__bar"></div>
                        <div class="equalizer__bar"></div>
	                </div>

                    <div>
                        <div id="currentTime">0:00</div>
                        <div id="duration">0:00</div>
                    </div>

                    <div class="audio-controls">
                        <div class="progress-container">
                        <div class="progress" id="progress">
                    </div>
                        </div>
                    </div>

                </div>
                <script src="js/gramola-js.js"></script>
            </footer>
        </body>
    </html>
