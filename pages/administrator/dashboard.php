<!DOCTYPE html>
<html lang="en">

<?php session_start(); ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Asesorias Academicas</title>
    <link rel="stylesheet" href="/static/stylesheets/administrator/dashboard.css">
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
                <a href="/pages/administrator/administration.php">
                    <button><img src="/static/pictures/template-icons/settings.svg" alt="">
                        <p>Administration</p>
                    </button>
                </a>
            </li>
            <li class="item">
                <a href="/pages/administrator/access.php">
                    <button><img src="/static/pictures/template-icons/admin-panel.svg" alt="">
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
                <a href="/pages/administrator/profile.php">
                    <button><img src="/static/pictures/template-icons/person.svg" alt="">
                        <p>Profile</p>
                    </button>
                </a>
            </li>
        </ul>
    </section>

    <main class="content" id="content">
        <section class="dash-header">
            <?php

            // Verificar si los valores existen en la sesión
            if (isset($_SESSION['ID_user']) && isset($_SESSION['Nombre_user'])) {
                $userId = $_SESSION['ID_user'];
                $userName = $_SESSION['Nombre_user'];

                echo "<h2>Bienvenido $userName </h2>";
            } else {
            }
            ?>
        </section>
        <section class="dashboard">
            <div class="dash-container">
                <div class="asesories-table dash-into-container">
                    <h3>Proximas Asesorias</h3>

                    <div class="get-asesories">
                        <?php include __DIR__ . '/../../static/scripts/php/get/view-asesories.php'; ?>
                    </div>

                    <div class="controls">
                        <button class="submit" id="new-assesory-button">Nueva Asesoria</button>
                    </div>

                    <div class="new-asesory emergent-sidebar" id="new-assesory-container">
                        <h3>Registrar nueva asesoria</h3>

                        <p>Puedes regsitrar una nueva asesoria para los estudiantes</p>

                        <form action="/./static/scripts/php/post/new-asesory.php" method="post">
                            <div class="placeholder">
                                <input class="input" type="text" name="folio" placeholder="Folio" required>
                            </div>
                            <div class="placeholder">
                                <input class="input" type="text" name="tema" placeholder="Tema" required>
                            </div>
                            <div class="placeholder">
                                <input class="input" type="text" name="horario" placeholder="Horario" required>
                            </div>
                            <div class="placeholder">
                                <input class="input" type="text" name="estatus" placeholder="Estado" required>
                            </div>

                            <div class="controls">
                                <button class="submit" id="close-assesory-button">Cancelar</button>
                                <button class="submit" type="submit">Crear</button>
                            </div>
                        </form>
                    </div>

                </div>
                <div class="schedule dash-into-container">
                    <h3>Horario de Asesores</h3>

                    <form action="" method="GET">
                        <th>esto es un horario</th>
                    </form>
                    <div class="controls">
                        <button class="submit">Modificar Horarios</button>
                    </div>
                </div>
            </div>
            <div class="dash-container">
                <div class="access dash-into-container">
                    <h3>Administracion de Accesso</h3>

                    <div class="role">
                        <a href="../administrator/administration.php">
                            <button class="toadmin">
                                <figure><img src="/static/pictures/administrator/admin.svg" alt="" style="height: 40px;"></figure>
                                <p>Administradores</p>
                            </button>
                        </a>
                        <a href="../administrator/administration.php">
                            <button class="toadmin">
                                <figure><img src="/static/pictures/administrator/school.svg" alt="" style="height: 40px;"></figure>
                                <p>Profesores</p>
                            </button>
                        </a>

                    </div>
                    <div class="controls">
                        <a href="../administrator/administration.php">
                            <button class="submit">Administrar Acceso</button>
                        </a>
                    </div>
                </div>
                <div class="data-manage dash-into-container">
                    <h3>Panel de administarcion de datos</h3>

                    <p>Adminsitra los datos que estan funcionando en la aplicacion y en caso de incongruencias editalo y
                        borralo</p>
                    <div class="controls">
                        <button class="submit">ir a Panel</button>
                    </div>
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
    <script src="/static/scripts/dashboard.js"></script>
</body>

</html>