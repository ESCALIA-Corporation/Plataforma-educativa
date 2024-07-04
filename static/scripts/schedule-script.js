// CHANGE SCHEDULES FOR REQUEST A ASESORY
const contenedor = document.getElementById("s_container");
const panel1 = document.getElementById("c_teacher1");
const panel2 = document.getElementById("c_teacher2");
const panel3 = document.getElementById("c_teacher3");
const panel4 = document.getElementById("c_teacher4");

const boton1 = document.getElementById("b_teacher1");
const boton2 = document.getElementById("b_teacher2");
const boton3 = document.getElementById("b_teacher3");
const boton4 = document.getElementById("b_teacher4");

// PANEL 1 SHOWS FOR DEFAULT
panel1.style.display = "block";
panel2.style.display = "none";
panel3.style.display = "none";
panel4.style.display = "none";

boton1.addEventListener("click", () => {
    panel1.style.display = "block";
    panel2.style.display = "none";
    panel3.style.display = "none";
    panel4.style.display = "none";
});

boton2.addEventListener("click", () => {
    panel1.style.display = "none";
    panel2.style.display = "block";
    panel3.style.display = "none";
    panel4.style.display = "none";
});

boton3.addEventListener("click", () => {
    panel1.style.display = "none";
    panel2.style.display = "none";
    panel3.style.display = "block";
    panel4.style.display = "none";
});

boton4.addEventListener("click", () => {
    panel1.style.display = "none";
    panel2.style.display = "none";
    panel3.style.display = "none";
    panel4.style.display = "block";
});

// SHOW THE PANEL FOR THE NEW ASESORY
document.getElementById("s_r_request").addEventListener("click", function () {
    document.getElementById("c_panel-request").style.display = "block";
});

// HIDE THE PANEL WHEN USER CLICK ON CANCEL
document.getElementById("s_r_close-request").addEventListener("click", function () {
    document.getElementById("c_panel-request").style.display = "none";
});

const allSideMenu = document.querySelectorAll('#sidebar .side-menu.top li a');

allSideMenu.forEach(item=> {
	const li = item.parentElement;

	item.addEventListener('click', function () {
		allSideMenu.forEach(i=> {
			i.parentElement.classList.remove('active');
		})
		li.classList.add('active');
	})
});