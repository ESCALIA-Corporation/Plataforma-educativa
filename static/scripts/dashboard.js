document.getElementById("new-assesory-button").addEventListener("click", function () {
    document.getElementById("new-assesory-container").style.display = "block";
});

// HIDE THE PANEL WHEN USER CLICK ON CANCEL
document.getElementById("close-assesory-button").addEventListener("click", function () {
    document.getElementById("new-assesory-container").style.display = "none";
});