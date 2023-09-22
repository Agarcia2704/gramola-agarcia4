const cancion = new Audio();
const reproductor = document.getElementById("rep");
const progressBar = document.getElementById("progress");
let parar = document.getElementById("parar");
const currentTimeDisplay = document.getElementById("currentTime"); // Agregamos esta línea
const durationDisplay = document.getElementById("duration"); // Agregamos esta línea
let isPlaying = false;

reproductor.addEventListener("click", toggleAudio);

cancion.addEventListener("timeupdate", updateProgress);
cancion.addEventListener("loadedmetadata", updateDuration); // Agregamos este evento

function toggleAudio() {
    if (isPlaying) {
        cancion.pause();
    } else {
        cancion.play();
    }

    isPlaying = !isPlaying;
    updatePlayButton();
}

function updatePlayButton() {
    reproductor.src = isPlaying
        ? "img/icones/icone-pausa.png"
        : "img/icones/icone-play.png";
}

function updateProgress() {
    const currentTime = cancion.currentTime;
    const duration = cancion.duration;
    const progressWidth = (currentTime / duration) * 100;
    progressBar.style.width = `${progressWidth}%`;

    // Actualiza el tiempo actual de reproducción en formato mm:ss
    const currentTimeMinutes = Math.floor(currentTime / 60);
    const currentTimeSeconds = Math.floor(currentTime % 60);
    currentTimeDisplay.textContent = `${currentTimeMinutes}:${String(currentTimeSeconds).padStart(2, '0')}`;
}

function updateDuration() {
    // Obtiene la duración total de la canción en formato mm:ss
    const durationMinutes = Math.floor(cancion.duration / 60);
    const durationSeconds = Math.floor(cancion.duration % 60);
    durationDisplay.textContent = `${durationMinutes}:${String(durationSeconds).padStart(2, '0')}`;
}

parar.addEventListener("click", () => {
    cancion.pause();
    cancion.currentTime = 0; // Torna al inici
    reproductor.src = "img/icones/icone-play.png"; // Cambia l'icone a "Play"
  });

document.getElementById("rap").addEventListener("click", function() {
    function rap() {
        cancion.src="playlist/rap/Trueno-TRANKYFUNKY.mp3";
            cancion.play();
            reproductor.src="img/icones/icone-pausa.png"
    }
    rap();
});

document.getElementById("rock").addEventListener("click", function() {
    function rock() {
        cancion.src="playlist/rock/ACDC-Thunderstruck.mp3";
            cancion.play();
            reproductor.src="img/icones/icone-pausa.png";
        }
    rock();
});

document.getElementById("techno").addEventListener("click", function() {
    function techno() {
        cancion.src="playlist/techno/TheWhistlers-BrokenTies.mp3";
            cancion.play();
            reproductor.src="img/icones/icone-pausa.png";
    }
    techno();
});

document.getElementById("urbano").addEventListener("click", function() {
    function urbano() {
        cancion.src="playlist/urbano/Quevedo-Columbia.mp3";
            cancion.play();
            reproductor.src="img/icones/icone-pausa.png";
    }
    urbano();
});