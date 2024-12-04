// TOGGLE SIDEBAR TO EXPAND
const menuBar = document.querySelector('#sidebar div #menu-button');
const sidebar = document.getElementById('sidebar');

menuBar.addEventListener('click', function () {
	sidebar.classList.toggle('hide');
})

