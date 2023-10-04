<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lista de Canciones</title>
    <link rel="stylesheet" href="css/gramola-css.css">
</head>
<body class="body3">
    <div class="contingut">
        <h1 class="llistat" >LLISTAT DE CANÇONS AFEGIDES:</h1>
        <br>
        <ul id="lista-canciones">
            <!-- Aquí se mostrarán las canciones -->
            <div class="lletra-llistat">
            <?php
            // Leer todas las canciones del archivo JSON
            $canciones = json_decode(file_get_contents("json/canciones.json"), true);
            $rap = file_get_contents("json/rap.json");
            $rock = file_get_contents("json/rock.json");
            $techno =file_get_contents("json/techno.json");
            $urbano = file_get_contents("json/urbano.json");
            // Iterar sobre las canciones y mostrar cada una en la lista
            foreach ($canciones as $cancion) {
                echo "<li>";
                echo "<a class='cancion' data-url='" . $cancion["url"] . "'>";
                echo "<img src='" . $cancion["cover"] . "' alt='" . $cancion["titol"] . "'>";
                echo "<a class='cancion' data-url='" . $cancion["url"] . "'>";
                echo $cancion["titol"] . " - " . $cancion["artista"];
                echo "</a>";
                echo "<button class='boto-parar' data-url='" . $cancion["url"] . "'>Parar</button>";
                echo "</li>";
            }
            ?>
            </div>
        </ul>
        <a href="index.php" class="tornar-index2">Tornar a la pàgina principal</a>
    </div>
    <!-- JavaScript -->
    <script>
        // Obtener todos los elementos de enlace en la lista de canciones
        var linksCanciones = document.querySelectorAll(".cancion");

        // Crear un objeto de audio
        var reproductor = new Audio();

        // Agregar un controlador de clic a cada enlace de canción
        linksCanciones.forEach(function (link) {
            link.addEventListener("click", function (e) {
                e.preventDefault();

                // Obtener la URL de la canción del atributo "data-url"
                var urlCancion = link.getAttribute("data-url");

                // Verificar si la misma canción ya está en reproducción
                if (reproductor.src === urlCancion) {
                    if (reproductor.paused) {
                        reproductor.play(); // Si está en pausa, reanudar la reproducción
                    } else {
                        reproductor.pause(); // Si se está reproduciendo, pausar la reproducción
                    }
                } else {
                    reproductor.src = urlCancion; // Cargar la nueva canción
                    reproductor.play(); // Reproducir la nueva canción
                }
            });
        });

        // Obtener todos los elementos de enlace en la lista de canciones
        var linksCanciones = document.querySelectorAll(".cancion");

        // Obtener todos los botones de "Parar"
        var botonesParar = document.querySelectorAll(".boto-parar");

        // Agregar un controlador de clic a cada enlace de canción
        linksCanciones.forEach(function (link) {
            link.addEventListener("click", function (e) {
                e.preventDefault();

                // Obtener la URL de la canción del atributo "data-url"
                var urlCancion = link.getAttribute("data-url");

                // Verificar si la misma canción ya está en reproducción
                if (reproductor.src === urlCancion) {
                    if (reproductor.paused) {
                        reproductor.play(); // Si está en pausa, reanudar la reproducción
                    } else {
                        reproductor.pause(); // Si se está reproduciendo, pausar la reproducción
                    }
                } else {
                    reproductor.src = urlCancion; // Cargar la nueva canción
                    reproductor.play(); // Reproducir la nueva canción
                }
            });
        });

        // Agregar un controlador de clic a cada botón de "Parar"
        botonesParar.forEach(function (boton) {
            boton.addEventListener("click", function (e) {
                e.preventDefault();

                // Pausar la reproducción cuando se haga clic en el botón de "Parar"
                reproductor.pause();
            });
        });
    </script>
    <script src="js/gramola-js.js"></script>
</body>
</html>
