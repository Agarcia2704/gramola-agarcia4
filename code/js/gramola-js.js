var elementoRecargar = document.getElementById("recargar");
  elementoRecargar.addEventListener("click", function () {
    location.reload();
});

//variables
var x = 0;
var cancion = new Audio();
var reproductor = document.getElementById("rep");
var progressBar = document.getElementById("progress");
var progressBarContainer = document.querySelector(".progress-container");
var parar = document.getElementById("parar");
var cover = document.getElementById("cover");
var currentTimeDisplay = document.getElementById("currentTime"); // Agregamos esta línea
var durationDisplay = document.getElementById("duration"); // Agregamos esta línea
var isPlaying = false;

//esdeveniments
reproductor.addEventListener("click", toggleAudio);
cancion.addEventListener("timeupdate", updateProgress);
cancion.addEventListener("loadedmetadata", updateDuration);
progressBarContainer.addEventListener("click", seekTo);

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
  currentTimeDisplay.textContent = `${currentTimeMinutes}:${String(
    currentTimeSeconds
  ).padStart(2, "0")}`;
}

function updateDuration() {
  // Obtiene la duración total de la canción en formato mm:ss
  const durationMinutes = Math.floor(cancion.duration / 60);
  const durationSeconds = Math.floor(cancion.duration % 60);
  durationDisplay.textContent = `${durationMinutes}:${String(
    durationSeconds
  ).padStart(2, "0")}`;
}

parar.addEventListener("click", () => {
  cancion.pause();
  cancion.currentTime = 0; // Torna al inici
  reproductor.src = "img/icones/icone-play.png"; // Cambia l'icone a "Play"
});

cancion.addEventListener("ended", function () {
  x = x + 1;
  if (x >= song.length) {
    x = 0;
  }
  selected();
});

cover.src = song[x].cover;
cover.removeAttribute("hidden"); // Esto quita el atributo hidden para mostrar la imagen

function selected() {
  cancion.src = song[x].url;
  cancion.play();
  reproductor.src = "img/icones/icone-pausa.png";
  var titol = document.getElementById("titol");
  titol.textContent = song[x].titol;
  var artista = document.getElementById("artista");
  artista.textContent = song[x].artista;
  var cover = document.getElementById("cover");
  cover.src = song[x].cover;
  cover.removeAttribute("hidden");
}

function seekTo(event) {
  var clickX =
    event.clientX - progressBarContainer.getBoundingClientRect().left;
  var progressBarWidth = progressBarContainer.offsetWidth;
  var duration = cancion.duration;
  var newPosition = (clickX / progressBarWidth) * duration;

  var wasPlaying = isPlaying;

  cancion.pause();

  cancion.currentTime = newPosition;
  if (wasPlaying) {
    cancion.play();
  }
}

function mostrarLista(listaCanciones) {
  const listaCancionesElement = document.getElementById("lista-canciones");
  listaCancionesElement.innerHTML = ""; // Limpia la lista

  for (let i = 0; i < listaCanciones.length; i++) {
    const cancion = listaCanciones[i];
    const listItem = document.createElement("li");

    // Crear la imagen de la portada
    const portadaImg = document.createElement("img");
    portadaImg.src = cancion.cover;
    portadaImg.alt = `${cancion.titol} - ${cancion.artista}`;

    // Crear el texto con el título y el artista
    const textoCancion = document.createTextNode(
      `${cancion.titol} - ${cancion.artista}`
    );

    // Agregar la portada y el texto a la lista de reproducción
    listItem.appendChild(portadaImg);
    listItem.appendChild(textoCancion);

    listaCancionesElement.appendChild(listItem);
  }
}

function next() {
  x = x + 1;
  selected();
}

function back() {
  x = x - 1;
  selected();
}