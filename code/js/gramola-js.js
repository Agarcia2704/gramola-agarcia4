//Variable per poder recargar la web al fer click al logo
var elementoRecargar = document.getElementById("recargar");
elementoRecargar.addEventListener("click", function () {
  location.reload();
});

//Creació de totes les variables
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

//codi que afeguirà diversos esdeveniments a diferents elements
reproductor.addEventListener("click", toggleAudio);
cancion.addEventListener("timeupdate", updateProgress);
cancion.addEventListener("loadedmetadata", updateDuration);
progressBarContainer.addEventListener("click", seekTo);

//funció per alternar entre reproduir i pausar una cançó
function toggleAudio() {
  if (isPlaying) {
    cancion.pause();
    //si la cançó esta parada, no mostrarà el medidor de volum
    equalizer.style.display = "none";
  } else {
    cancion.play();
    //si la cançó s'esta reproduint, mostrarà el medidor de volum
    equalizer.style.display = "flex";
  }

  isPlaying = !isPlaying;
  updatePlayButton();
}

//funció que actualitza la imatge de play i pausa depentent de si hi ha una cançó posada o no
function updatePlayButton() {
  reproductor.src = isPlaying
    ? "img/icones/icone-pausa.png"
    : "img/icones/icone-play.png";
}

//funció que actualitza la barra de progrès basant-se en el temps actual de reproducció
function updateProgress() {
  const currentTime = cancion.currentTime;
  const duration = cancion.duration;
  const progressWidth = (currentTime / duration) * 100;
  progressBar.style.width = `${progressWidth}%`;

  //Actualitza el temsp actual de reproducció en format mm:ss
  const currentTimeMinutes = Math.floor(currentTime / 60);
  const currentTimeSeconds = Math.floor(currentTime % 60);
  currentTimeDisplay.textContent = `${currentTimeMinutes}:${String(
    currentTimeSeconds
  ).padStart(2, "0")}`;
}


function updateDuration() {
  //Obté la duració total de la cançó en format mm:ss
  const durationMinutes = Math.floor(cancion.duration / 60);
  const durationSeconds = Math.floor(cancion.duration % 60);
  durationDisplay.textContent = `${durationMinutes}:${String(
    durationSeconds
  ).padStart(2, "0")}`;
}

//esdeveniment per 
parar.addEventListener("click", () => {
  cancion.pause();
  cancion.currentTime = 0; // Torna al inici
  reproductor.src = "img/icones/icone-play.png"; // Cambia l'icone a "Play"
  equalizer.style.display = "none";
});

cancion.addEventListener("ended", function () {
  x = x + 1;
  if (x >= song.length) {
    x = 0;
  }
  selected();
});

cover.src = song[x].cover;
//Aixo treu l'atribut hidden per mostrar la imatge
cover.removeAttribute("hidden");

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
  equalizer.style.display = "flex";

  const aleatori = document.getElementById("aleatori");
  const enrere = document.getElementById("enrere");
  const avançar = document.getElementById("avançar");
  const parar = document.getElementById("parar");
  aleatori.src = "img/icones/icone-aleatori.png";
  enrere.src = "img/icones/icone-enrere.png";
  avançar.src = "img/icones/icone-avançar.png";
  parar.src = "img/icones/icone-parar.png";
  document.getElementById("aleatori").disabled = false;
  document.getElementById("enrere").disabled = false;
  document.getElementById("avançar").disabled = false;

  if (x === 0) {
    //Icone desactivat
    enrere.src = "img/icones/icone-enrere-desactivat.png";
    //Icone activat
    avançar.src = "img/icones/icone-avançar.png";
  } else if (x === song.length - 1) {
    //Icone activat
    enrere.src = "img/icones/icone-enrere.png";
    //Icone desactivat
    avançar.src = "img/icones/icone-avançar-desactivat.png";
  } else {
    //Icone activat
    enrere.src = "img/icones/icone-enrere.png";
    //Icone activat
    avançar.src = "img/icones/icone-avançar.png";
  }
}

//funció per fer funcionar la barra de progres per poder avançar i enrrederir la cançó a gust
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

//funció per mostrar la llista de cançons amb el titol, l'artista y la portada
function mostrarLista(listaCanciones) {
  const listaCancionesElement = document.getElementById("lista-canciones");
  listaCancionesElement.innerHTML = ""; // Limpia la lista

  for (let i = 0; i < listaCanciones.length; i++) {
    const cancion = listaCanciones[i];
    const listItem = document.createElement("li");

    // Crear un elemento de texto para el título y el artista de la canción
    const textoCancion = document.createElement("span");
    textoCancion.textContent = `${cancion.titol} - ${cancion.artista}`;
    textoCancion.addEventListener("click", function () {
      reproducirCancion(cancion);
    });

    //Crea la imatge de la portada de la cançó
    const portadaImg = document.createElement("img");
    portadaImg.src = cancion.cover;
    portadaImg.alt = `${cancion.titol} - ${cancion.artista}`;
    portadaImg.addEventListener("click", function () {
      reproducirCancion(cancion);
    });

    //Agrega el text de la cançó i la portada a la llista de reproducció
    listItem.appendChild(portadaImg);
    listItem.appendChild(textoCancion);

    listaCancionesElement.appendChild(listItem);
  }
}

//funció per guardar la variable x a cançó
function reproducirCancion(cancion) {
  x = song.indexOf(cancion);
  selected();
}

//funció per fer funcionar el botó de avançar de cançó
function next() {
  if (x < song.length - 1) {
    x = x + 1;
    selected();
  }
}

//funció per fer funcionar el botó de enrere de cançó
function back() {
  if (x !== 0) {
    x = x - 1;
    selected();
  }
}

//funció per fer que el botó de aleatori funcioni i fagui un canvi de cançó aleatori
function aleatori() {
  var cancionrandom = Math.floor(Math.random() * song.length);
  var randomSong = song[cancionrandom];
  x = cancionrandom;
  selected();
}