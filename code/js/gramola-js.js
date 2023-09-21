const cancion = new Audio();
const reproductor = document.getElementById("rep");
const progressBar = document.getElementById("progress");
let isPlaying = false;

reproductor.addEventListener("click", toggleAudio);

cancion.src = "playlist/techno/TheWhistlers-Lapaka.mp3";
cancion.addEventListener("timeupdate", updateProgress);

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
}