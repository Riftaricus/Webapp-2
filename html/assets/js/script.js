console.log("Welcome to Volare Airways!");

document.addEventListener("DOMContentLoaded", () => {
  showLoadScreen();

  setTimeout(hideLoadScreen, 3000);
});

function showLoadScreen() {
  let loadingScreen = document.getElementById("overlay");
  if (loadingScreen) {
    loadingScreen.style.display = "inline";
    loadingScreen.style.opacity = "1";
  }
}

function hideLoadScreen() {
  let loadingScreen = document.getElementById("overlay");
  if (loadingScreen) {
    let steps = 100;
    for (let i = 0; i <= steps; i++) {
      setTimeout(() => {
        loadingScreen.style.opacity = ((steps - i) / steps).toString();
      }, 1 * i);
    }
    setTimeout(() => {
      loadingScreen.style.display = "none";
    }, 1000 * (steps + 1));
  }
}
