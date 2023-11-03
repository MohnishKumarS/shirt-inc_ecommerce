var loader = document.getElementById("preloader");

window.addEventListener("load", function () {
    // Simulate a 3-second loading time before hiding the preloader
    setTimeout(function () {
        loader.style.display = "none";
    }, 500); // 3000 milliseconds = 3 seconds
});