/*ESCAPE GAME*/
document.getElementById("closed_door").addEventListener("click", clickDoor);
document.getElementById("padlock").addEventListener("click", clickPadlock);
document.getElementById("lock").addEventListener("click", clickLock);
document.getElementById("key").addEventListener("click", clickKey);
document.getElementById("letter").addEventListener("click", clickLetter);

function showMessage(texte) {
    const card = document.getElementById("message-card");
    card.textContent = texte;
    card.style.display = "block";

    setTimeout(() => {
        card.style.display = "none";
        card.textContent = "";
    }, 8000);
}

/* Porte */
function clickDoor() {
    showMessage("Qu'y a-t-il derrière cette porte ?");
}

/* Lettre */
function clickLetter() {
    const message = `Ingrédients importants : Vanadium, Iode, Radium, Uranium, Soufre`;
    showMessage(message);
}

/*Serrure*/
let haveKey = false;
let etatLock = "verrouillée";

function clickLock() {
    if (!haveKey) {
        showMessage("La serrure est bloquée.");
        return;
    }
    etatLock = "déverrouillée";
    showMessage("La serrure est déverrouillée.");
    checkTheRoom();
}

/* Clef */
function clickKey() {
    haveKey = true;
    showMessage("La clé est dans ton inventaire");
    document.getElementById("key").style.display = "none";
}

/* Cadenas */
let etatPadlock = "verrouillé";

function clickPadlock() {
    let padlockCode = prompt("Entrer le code d'accès. (mot de 5 lettres)");

    // Vérifie que l'utilisateur a bien écrit quelque chose
    // Puis convertit tout en majuscules pour comparer correctement
    if (padlockCode && padlockCode.toUpperCase() === "VIRUS") {
        etatPadlock = "déverrouillé";
        showMessage("Le cadenas est déverrouillé.");
        checkTheRoom(); // Vérifie si les conditions de sortie sont remplies
    } else {
        showMessage("Erreur de code.");
    }
}

/* Clef obtenue et code de Cadenas correct */
function checkTheRoom() {
    if (etatPadlock === "déverrouillé" && etatLock === "déverrouillée") {
        document.getElementById("escape").style.display = "block";
        document.getElementById("escape").addEventListener("click", () => {
            window.location.href = "play_ending.php";
        });
    }
}

/*Effets sonores*/
const music = document.getElementById("bg-music");
const soundBtn = document.getElementById("sound-btn");
const soundIcon = document.getElementById("sound-icon");

let musicOn = false;

soundBtn.addEventListener("click", () => {
    if (musicOn) {
        music.pause();
        soundIcon.src = "./public/images/no_sound.png";
        soundIcon.alt = "Son désactivé";
    } else {
        music.play();
        soundIcon.src = "./public/images/sound.png";
        soundIcon.alt = "Son activé";
    }
    musicOn = !musicOn;
});
