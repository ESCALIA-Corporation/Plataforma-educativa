<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asesor Academico</title>
    <link rel="stylesheet" href="/static/stylesheets/assesor/dashboard.css">
    <link rel="stylesheet" href="/static/stylesheets/template.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&display=swap" rel="stylesheet">
</head>

<body>
    <section class="sidebar" id="sidebar">
        <div class="menu-box">
            <button id="menu-button"><img src="/static/pictures/template-icons/menu.svg" alt=""></button>
        </div>
        <ul class="menu">
            <li class="item"><button class="active">
                    <img src="/static/pictures/template-icons/dashboard.svg" alt="">
                    <p>Dashboard</p>
                </button>
            </li>
            <li class="item">
                <a href="">
                    <button><img src="" alt="">
                        <p>Administration</p>
                    </button>
                </a>
            </li>
            <li class="item">
                <a href="">
                    <button><img src="" alt="">
                        <p>Access</p>
                    </button>
                </a>
            </li>
        </ul>
        <ul class="sidebar-controls">
            <li class="item">
                <a href="/index.php">
                    <button><img src="/static/pictures/template-icons/logout.svg" alt="">
                        <p>Logout</p>
                    </button>
                </a>
            </li>
            <li class="item">
                <a href="/pages/assesor/profile.php">
                    <button><img src="/static/pictures/template-icons/person.svg" alt="">
                        <p>Profile</p>
                    </button>
                </a>
            </li>
        </ul>
    </section>

    <main class="content" id="content">
        <section class="dash-header">
            <h2>Hola de nuevo $USER$</h2>
        </section>
        <section class="description">
            <p>Este es el dashboard designado para el profesor, diviertete</p>
        </section>

        <section class="dashboard">
            <div class="dash-container">
                <div class="asesories-table dash-into-container">
                    <h3>Asesorias Asignadas para ti</h3>

                    <form action="" method="GET">
                        <table>
                            <tr>
                                <th>Hora</th>
                                <th>Alumno</th>
                                <th>Materia</th>
                                <th>Horas</th>
                            </tr>
                            <tr>
                                <td>Data 1</td>
                                <td>Data 2</td>
                                <td>Data 3</td>
                            </tr>
                            <tr>
                                <td>Data 4</td>
                                <td>Data 5</td>
                                <td>Data 6</td>
                            </tr>
                            <tr>
                                <td>Data 4</td>
                                <td>Data 5</td>
                                <td>Data 6</td>
                            </tr>
                        </table>
                    </form>
                    <div class="controls">
                        <button class="submit">Generar Bitacora(Preview)</button>
                        <button class="submit" id="new-assesory-button">Nueva Asesoria</button>
                    </div>

                    <!-- NEW ASSESORY
                    <div class="new-asesory" id="new-assesory-container">
                        <h3>Registrar nueva asesoria</h3>

                        <p>Puedes regsitrar una nueva asesoria para los estudiantes</p>

                        <form action="" method="post">
                            <div class="placeholder">
                                <p>Folio:</p>
                                <input class="input" type="text" id="folio" placeholder=" " required>
                            </div>
                            <div class="placeholder">
                                <p>Tema:</p>
                                <input class="input" type="text" id="tema" placeholder=" " required>
                            </div>
                            <div class="placeholder">
                                <p>Horario:</p>
                                <input class="input" type="text" id="horario" placeholder=" " required>
                            </div>
                            <div class="placeholder">
                                <p>Fecha registro:</p>
                                <input class="input" type="text" id="f-registro" placeholder=" " required>
                            </div>
                            <div class="placeholder">
                                <p>Estatus:</p>
                                <input class="input" type="text" id="estatus" placeholder=" " required>
                            </div>

                            <div class="controls">
                                <button class="submit" id="close-assesory-button">Cerrar</button>
                                <button class="submit" type="submit">Crear</button>
                            </div>
                        </form>
                    </div>
                    -->
                </div>
                <div class="schedule dash-into-container">
                    <h3>Horario de Asesores</h3>

                    <form action="" method="GET">
                        <th>hola</th>
                    </form>
                </div>
            </div>
        </section>

        <!-- FOOTER INTO THE MAIN CONTAINER -->
        <footer>
            <ul class="links">
                <li>Politicas de seguridad</li>
                <li>Terminos de uso</li>
            </ul>
            <div class="credits">
                <p>&#169 ESCALIA 2024</p>
            </div>
        </footer>
    </main>

    <script src="/static/scripts/main.js"></script>
</body>

</html>