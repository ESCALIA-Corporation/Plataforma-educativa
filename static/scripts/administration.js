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


// Mostrar el contenedor de asignación cuando se hace clic en cualquier botón de asignación
document.querySelectorAll(".open-edit-eduprog").forEach(function (button) {
    button.addEventListener("click", function () {
        document.getElementById("edit-panel-educative-program").style.display = "block";
    });
});

document.getElementById("cancel-educative-program-button").addEventListener("click", function () {
    document.getElementById("edit-panel-educative-program").style.display = "none";
});

window.addEventListener("click", function (event) {
    var modal = document.getElementById("open-edit-eduprog");
    if (event.target == modal) {
        modal.style.display = "none";
    }
});

document.querySelectorAll(".open-edit-asignatura").forEach(function (button) {
    button.addEventListener("click", function () {
        document.getElementById("edit-panel-asignatura").style.display = "block";
    });
});

// Cerrar el panel de edición al hacer clic en el botón de cancelar
document.getElementById("cancel-asignatura-button").addEventListener("click", function () {
    document.getElementById("edit-panel-asignatura").style.display = "none";
});

// Cerrar el panel de edición al hacer clic fuera de él
window.addEventListener("click", function (event) {
    var modal = document.getElementById("edit-panel-asignatura");
    if (event.target == modal) {
        modal.style.display = "none";
    }
});

// Cerrar el panel de edición al presionar la tecla "Escape"
window.addEventListener("keydown", function (event) {
    if (event.key === "Escape") {
        document.getElementById("edit-panel-asignatura").style.display = "none";
    }
});


document.querySelectorAll(".open-delete-program").forEach(function (button) {
    button.addEventListener("click", function () {
        // Mostrar el panel de eliminación
        document.getElementById("delete-panel-program").style.display = "block";
    });
});

// Cerrar el panel de eliminación al hacer clic en el botón de cancelar
document.getElementById("cancel-delete-program-button").addEventListener("click", function () {
    // Ocultar el panel de eliminación
    document.getElementById("delete-panel-program").style.display = "none";
});

// Cerrar el panel de eliminación al hacer clic fuera de él
window.addEventListener("click", function (event) {
    var modal = document.getElementById("delete-panel-program");
    if (event.target == modal) {
        modal.style.display = "none";
    }
});

// Cerrar el panel de eliminación al presionar la tecla "Escape"
window.addEventListener("keydown", function (event) {
    if (event.key === "Escape") {
        document.getElementById("delete-panel-program").style.display = "none";
    }
});


document.querySelectorAll(".open-delete-asignatura").forEach(function (button) {
    button.addEventListener("click", function () {
        // Mostrar el panel de eliminación
        document.getElementById("delete-panel-asignatura").style.display = "block";
    });
});

// Cerrar el panel de eliminación al hacer clic en el botón de cancelar
document.getElementById("cancel-delete-asignatura-button").addEventListener("click", function () {
    // Ocultar el panel de eliminación
    document.getElementById("delete-panel-asignatura").style.display = "none";
});

// Cerrar el panel de eliminación al hacer clic fuera de él
window.addEventListener("click", function (event) {
    var modal = document.getElementById("delete-panel-asignatura");
    if (event.target == modal) {
        modal.style.display = "none";
    }
});

// Cerrar el panel de eliminación al presionar la tecla "Escape"
window.addEventListener("keydown", function (event) {
    if (event.key === "Escape") {
        document.getElementById("delete-panel-asignatura").style.display = "none";
    }
});