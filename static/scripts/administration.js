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

// Ocultar el panel cuando el usuario hace clic en el botón de cerrar
document.getElementById("close-assigment-button").addEventListener("click", function () {
    document.getElementById("edit-panel-educative-program").style.display = "none";
});

// También puedes ocultar el contenedor si se hace clic fuera de él
window.addEventListener("click", function (event) {
    var modal = document.getElementById("open-edit-eduprog");
    if (event.target == modal) {
        modal.style.display = "none";
    }
});
