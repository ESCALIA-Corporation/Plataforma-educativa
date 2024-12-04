document.getElementById("new-assesory-button").addEventListener("click", function () {
    document.getElementById("new-assesory-container").style.display = "block";
});

// HIDE THE PANEL WHEN USER CLICK ON CANCEL
document.getElementById("close-assesory-button").addEventListener("click", function () {
    document.getElementById("new-assesory-container").style.display = "none";
});

// Mostrar el contenedor de asignación cuando se hace clic en cualquier botón de asignación
document.querySelectorAll(".new-assignment-button").forEach(function(button) {
    button.addEventListener("click", function () {
        document.getElementById("new-assigment-container").style.display = "block";
    });
});

// Ocultar el panel cuando el usuario hace clic en el botón de cerrar
document.getElementById("close-assigment-button").addEventListener("click", function () {
    document.getElementById("new-assigment-container").style.display = "none";
});

// También puedes ocultar el contenedor si se hace clic fuera de él
window.addEventListener("click", function(event) {
    var modal = document.getElementById("new-assigment-container");
    if (event.target == modal) {
        modal.style.display = "none";
    }
});
