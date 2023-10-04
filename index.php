<?php
    /*Codi PHP que llegeix el contingut de quatre fitxers JSON diferents
    i emmagatzema aquest contingut en quatre variables diferents*/
    $rap = file_get_contents("code/json/rap.json");
    $rock = file_get_contents("code/json/rock.json");
    $techno =file_get_contents("code/json/techno.json");
    $urbano = file_get_contents("code/json/urbano.json");
    $object = (object) [
        'nombre' => [],
        'fecha' => [],
      ];
      if(isset($_COOKIE["ultimaplaylist"])){

      }else{
        setcookie ('ultimaplaylist', json_encode($object), time()+2678400);
      }

    /*Codi PHP que verifica si s'ha enviat un nom d'usuari a través d'un formulari i,
    si és així, emmagatzema aquest nom d'usuari a la variable $usuari*/

   $inicisessio = false;

   if (isset($_POST["username"])) {
    $usuari = $_POST["username"];
    $inicisessio = true;
    setcookie("username", $usuari, time()+ 3600);
   }

   if (isset($_COOKIE["username"])) {
     $usuari = $_COOKIE["username"];
     $inicisessio = true;
    }



    if (isset($_GET["playlist"])) {
        $playlist = $_GET["playlist"]; //Obté el nom de la playlist seleccionada

        //Obté la hora i la data actual
        $fechaHora = date("Y-m-d H:i:s");

        $infoPlaylist = array(
            "playlist" => $playlist,
            "fechaHora" => $fechaHora
        );

        $infoPlaylistJSON = json_encode($infoPlaylist);
        //Estableix la coockie amb la informació
        setcookie("lastPlaylist", $infoPlaylistJSON, time() + 3600); // Expira en 1 hora
    }
?>

<!-- Comença el codi HTML -->
<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">

            <!-- Logo del projecte -->
            <link rel="icon" type="image/png" href="code/img/logo/logo-gramola.png">

            <!-- Vinculació del CSS amb l'HTML -->
            <link rel="stylesheet" href="code/css/gramola-css.css">

            <!-- Titol del projecte -->
            <title>GRAMOLA 2.0</title>

        </head>
        <body>
            <!-- La secció <body> conté el contingut principal de la pàgina web.-->
            <header>

                <!--L'element <header> conté elements que apareixen a la part superior de la pàgina web-->
                <div class="logo">
                    <img src="code/img/logo/logo-gramola.png" class="img-logo" id="recargar" >
                </div>
                <div class="perfil">
                <?php if (!$inicisessio): ?>

                <!-- Video per a la pàgina web -->
                <video src="code/vid/banner-gramola.mp4" class="banner" autoplay loop></video>

                <?php endif; ?>
                <?php if ($inicisessio): ?>
                    <a href="code/log-out.php" class="log-out-form">LOG OUT</a>
                    <div class="nom-form">

                        <!-- PHP per mostrar per pantalla Hola, + el nom de l'usuari que ha posat al formulari -->
                        <?php echo 'Hola, ' . $usuari ?>

                    </div>
                    <?php endif; ?> 
                </div>

                <div class="navegador">
                <?php if ($inicisessio): ?>
                    <div class="banner-boto">
                    <a href="code/informacio-tecnica.php" class="boto-web">Informació Tècnica</a>
                    <a href="code/afegir-canço.php" class="boto-web" >Afegir cançó</a>
                    <a href="code/llista-cançons.php" class="boto-web" >Llista cançons</a>
                    </div>
                    <!-- Video per a la pàgina web -->
                    <?php endif; ?>
                <?php if (!$inicisessio): ?>

                <!-- Formulari de inici de sessió via el nom de l'usuari-->
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

                    <!-- Imatges de les playlist amb onclick -->
                    <div class="contingut-principal">
                        <img src="code/img/playlists/rap.jpg" class="playlist-rap" id="rap" onclick="rap()">
                        <img src="code/img/playlists/rock.jpg" class="playlist-rock" id="rock" onclick="rock()">
                        <img src="code/img/playlists/techno.jpg" class="playlist-techno" id="techno" onclick="techno()">
                        <img src="code/img/playlists/urbano.jpg" class="playlist-urbano" id="urbano" onclick="urbano()">
                    </div>

                <div class="contingut-secundari">

                    <!-- Llista per mostrar la informació (portada, titol i artista) de cada cançó de cada playlist -->
                    <div class="contingut-secundari">
                        <div class="info-secundari">
                            <ul id="lista-canciones"></ul>
                        </div>
                    </div>

                </div>
            <nav>
                <!-- Barra del navegador -->
                <div class="nav"></div>
            </nav>
            <!-- Script per afegir JavaScript al document -->
            <script>

                //Creem la variable song
                var song;

                //Funció que assigna l'array $rap a la variable song mitjançant la funció JSON.parse()
                function rap(){
                    song = JSON.parse(<?php echo json_encode($rap)?>);
                    x = 0;
                    //crida la funció selected i mostrarLlista
                    selected();
                    mostrarLista(song);

                    let cookie = JSON.parse(getCookie("ultimaplaylist"));
                    let fecha = new Date();
                    let timestamp = fecha.getTime() / 1000;
                    cookie.nombre[0] = "rap";
                    cookie.fecha[0] = timestamp;
                    document.cookie = "ultimaplaylist=" + JSON.stringify(cookie) + "; expires=Thu, 01 Jan 2024 00:00:00; path=/;";
                }

                //Funció que assigna l'array $rock a la variable song mitjançant la funció JSON.parse()
                function rock(){
                    song = JSON.parse(<?php echo json_encode($rock)?>);
                    x = 0;
                    //crida la funció selected i mostrarLlista
                    selected();
                    mostrarLista(song);
                    let cookie = JSON.parse(getCookie("ultimaplaylist"));
                    let fecha = new Date();
                    let timestamp = fecha.getTime() / 1000;
                    cookie.nombre[0] = "rock";
                    cookie.fecha[0] = timestamp;
                    document.cookie = "ultimaplaylist=" + JSON.stringify(cookie) + "; expires=Thu, 01 Jan 2024 00:00:00; path=/;";
                }

                //Funció que assigna l'array $techno a la variable song mitjançant la funció JSON.parse()
                function techno(){
                    song = JSON.parse(<?php echo json_encode($techno)?>);
                    x = 0;
                    //crida la funció selected i mostrarLlista
                    selected();
                    mostrarLista(song);

                    let cookie = JSON.parse(getCookie("ultimaplaylist"));
                    let fecha = new Date();
                    let timestamp = fecha.getTime() / 1000;
                    cookie.nombre[0] = "techno";
                    cookie.fecha[0] = timestamp;
                    document.cookie = "ultimaplaylist=" + JSON.stringify(cookie) + "; expires=Thu, 01 Jan 2024 00:00:00; path=/;";
                }

                //Funció que assigna l'array $urbano a la variable song mitjançant la funció JSON.parse()
                function urbano(){
                    song = JSON.parse(<?php echo json_encode($urbano)?>);
                    x = 0;
                    //crida la funció selected i mostrarLlista
                    selected();
                    mostrarLista(song);

                    let cookie = JSON.parse(getCookie("ultimaplaylist"));
                    let fecha = new Date();
                    let timestamp = fecha.getTime() / 1000;
                    cookie.nombre[0] = "urbano";
                    cookie.fecha[0] = timestamp;
                    document.cookie = "ultimaplaylist=" + JSON.stringify(cookie) + "; expires=Thu, 01 Jan 2024 00:00:00; path=/;";
                }
            </script>

            <footer class="footer">

                <!--L'element <footer> conté informació que apareix a la part inferior de la pàgina web-->
                <div class="reproductor">

                    <!-- Aqui es mostrara l'informació (portada, titol i artista) de cada cançó de cada playlist-->
                    <div class="text-info">
                    <img src="" alt="" id="cover" hidden>
                        <div class="info">
                            <span id="titol"></span>
                            <br>
                            <b id="artista"></b>
                        </div>
                    </div>

                    <!-- Totes les imatges del icones de reproducció -->
                    <div class="icones">
                        <img src="code/img/icones/icone-aleatori-desactivat.png" class="icone-aleatori" id="aleatori" onmouseover="cambiarAleatori()" onmouseout="restaurarAleatori()" onclick="aleatori()" disabled>
                        <img src="code/img/icones/icone-enrere-desactivat.png" class="icone-enrere" id="enrere" onmouseover="cambiarEnrere()" onmouseout="restaurarEnrere()" onclick="back()" disabled>
                        <img src="code/img/icones/icone-play-desactivat.png" class="stop" id="rep" onmouseover="cambiarPlay()" onmouseout="restaurarPlay()">
                        <img src="code/img/icones/icone-avançar-desactivat.png" class="icone-avançar" id="avançar" onmouseover="cambiarAvançar()" onmouseout="restaurarAvançar()" onclick="next()" disabled>
                        <img src="code/img/icones/icone-parar-desactivat.png" class="icone-parar" id="parar"onmouseover="cambiarParar()" onmouseout="restaurarParar()" disabled >
                    </div>

                    <!-- Tots els divs per les barres del mesurador de volum "fals" -->
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
                        <div class="equalizer__bar"></div>
                        <div class="equalizer__bar"></div>
                        <div class="equalizer__bar"></div>
                        <div class="equalizer__bar"></div>
                        <div class="equalizer__bar"></div>
	                </div>

                    <div>
                        <!-- divs per mostrar la duració de la cançó i el progrés de la cançó en segons -->
                        <div id="currentTime">0:00</div>
                        <div id="duration">0:00</div>
                    </div>
                    <!-- divs per mostrar la barra de progrés de la cançó -->
                    <div class="audio-controls">
                        <div class="progress-container">
                        <div class="progress" id="progress">
                    </div>
                        </div>
                    </div>

                </div>
                <!--Vinculació del JavaScript amb l'HTML-->
                <script src="code/js/gramola-js.js"></script>
            </footer>
        </body>
    </html>