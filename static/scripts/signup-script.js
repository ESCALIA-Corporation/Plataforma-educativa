const contenedor = document.getElementById("signup");
const panel1 = document.getElementById("c_students");
const panel2 = document.getElementById("c_teachers");
const boton1 = document.getElementById("b_students");
const boton2 = document.getElementById("b_teachers");

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
