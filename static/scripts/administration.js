document.getElementById("new-educative-program-button").addEventListener("click", function () {
    document.getElementById("panel-educative-program").style.display = "block";
});

// HIDE THE PANEL WHEN USER CLICK ON CANCEL
document.getElementById("close-educative-program-button").addEventListener("click", function () {
    document.getElementById("panel-educative-program").style.display = "none";
});

document.getElementById("new-assignature-button").addEventListener("click", function () {
    document.getElementById("panel-asignature").style.display = "block";
});

// HIDE THE PANEL WHEN USER CLICK ON CANCEL
document.getElementById("close-asignature-button").addEventListener("click", function () {
    document.getElementById("panel-asignature").style.display = "none";
});