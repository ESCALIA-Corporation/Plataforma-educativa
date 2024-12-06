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

document.querySelectorAll(".open-edit-asesoria").forEach(function (button) {
    button.addEventListener("click", function () {
        // Mostrar el panel de edición
        document.getElementById("edit-panel-asesoria").style.display = "block";
    });
});

// Cerrar el panel de edición al hacer clic en el botón de cancelar
document.getElementById("cancel-asesoria-button").addEventListener("click", function () {
    // Ocultar el panel de edición
    document.getElementById("edit-panel-asesoria").style.display = "none";
});

// Cerrar el panel de edición al hacer clic fuera de él
window.addEventListener("click", function (event) {
    var modal = document.getElementById("edit-panel-asesoria");
    if (event.target == modal) {
        modal.style.display = "none";
    }
});

// Cerrar el panel de edición al presionar la tecla "Escape"
window.addEventListener("keydown", function (event) {
    if (event.key === "Escape") {
        document.getElementById("edit-panel-asesoria").style.display = "none";
    }
});