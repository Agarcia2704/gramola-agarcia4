<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LLISTA DE CANÇONS</title>
    <link rel="stylesheet" href="css/gramola-css.css">
    <link rel="icon" type="image/png" href="img/logo/logo-gramola.png">
</head>
<body class="body3">
    <div class="contingut">
        <h1 class="llistat" >LLISTAT DE CANÇONS AFEGIDES:
        <a href="../index.php" class="tornar-index2">Tornar a la pàgina principal</a>
        </h1>
        <br>
        <ul id="lista-canciones">
            <!-- Aquí es mostraran les cançons -->
            <div class="lletra-llistat">
            <?php
            // Llegir totes les cançons de l'arxiu JSON
            $canciones = json_decode(file_get_contents("json/canciones.json"), true);
            $rap = file_get_contents("json/rap.json");
            $rock = file_get_contents("json/rock.json");
            $techno = file_get_contents("json/techno.json");
            $urbano = file_get_contents("json/urbano.json");
            // Iterar sobre les cançons i mostrar-ne cadascuna a la llista
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
    </div>
    <!-- JavaScript -->
    <script>
        // Obtenir tots els elements d'enllaç a la llista de cançons
        var linksCanciones = document.querySelectorAll(".cancion");

        // Crear un objecte d'àudio
        var reproductor = new Audio();

        // Afegir un controlador de clic a cada enllaç de cançó
        linksCanciones.forEach(function (link) {
            link.addEventListener("click", function (e) {
                e.preventDefault();

                // Obtenir la URL de la cançó de l'atribut "data-url"
                var urlCancion = link.getAttribute("data-url");

                // Comprovar si la mateixa cançó ja està en reproducció
                if (reproductor.src === urlCancion) {
                    if (reproductor.paused) {
                        reproductor.play(); // Si està en pausa, reprendre la reproducció
                    } else {
                        reproductor.pause(); // Si s'està reproduint, pausar la reproducció
                    }
                } else {
                    reproductor.src = urlCancion; // Carregar la nova cançó
                    reproductor.play(); // Reproduir la nova cançó
                }
            });
        });

        // Obtenir tots els elements d'enllaç a la llista de cançons
        var linksCanciones = document.querySelectorAll(".cancion");

        // Obtenir tots els botons de "Parar"
        var botonesParar = document.querySelectorAll(".boto-parar");

        // Afegir un controlador de clic a cada enllaç de cançó
        linksCanciones.forEach(function (link) {
            link.addEventListener("click", function (e) {
                e.preventDefault();

                // Obtenir la URL de la cançó de l'atribut "data-url"
                var urlCancion = link.getAttribute("data-url");

                // Comprovar si la mateixa cançó ja està en reproducció
                if (reproductor.src === urlCancion) {
                    if (reproductor.paused) {
                        reproductor.play(); // Si està en pausa, reprendre la reproducció
                    } else {
                        reproductor.pause(); // Si s'està reproduint, pausar la reproducció
                    }
                } else {
                    reproductor.src = urlCancion; // Carregar la nova cançó
                    reproductor.play(); // Reproduir la nova cançó
                }
            });
        });

        // Afegir un controlador de clic a cada botó de "Parar"
        botonesParar.forEach(function (boton) {
            boton.addEventListener("click", function (e) {
                e.preventDefault();

                // Pausar la reproducció quan es faci clic al botó de "Parar"
                reproductor.pause();
            });
        });
    </script>
    <script src="js/gramola-js.js"></script>
</body>
</html>

