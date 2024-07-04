const contenedor = document.getElementById("l_f_container");
const panel1 = document.getElementById("s_l-panel");
const panel2 = document.getElementById("t_l-panel");
const boton1 = document.getElementById("s_l-button");
const boton2 = document.getElementById("t_l-button");

// SHOWS PANEL 1 FOR DEFAULT
panel1.style.display = "block";
panel2.style.display = "none";

// WHEN PUSH THE BUTTON SHOWS THE PANEL 1
boton1.addEventListener("click", () => {
    panel1.style.display = "block";
    panel2.style.display = "none";
});

// WHEN PUSH THE BUTTON SHOWS THE PANEL 2
boton2.addEventListener("click", () => {
    panel1.style.display = "none";
    panel2.style.display = "block";
});