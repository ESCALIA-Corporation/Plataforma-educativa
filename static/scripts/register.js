const contenedor = document.getElementById("signup");
const panel1 = document.getElementById("panel-registration-asesor");
const panel2 = document.getElementById("panel-registration-admin");
const boton1 = document.getElementById("button-assesor");
const boton2 = document.getElementById("button-admin");

panel1.style.display = "block";
panel2.style.display = "none";

boton1.addEventListener("click", () => {
    panel1.style.display = "block";
    panel2.style.display = "none";
});

boton2.addEventListener("click", () => {
    panel1.style.display = "none";
    panel2.style.display = "block";
});
