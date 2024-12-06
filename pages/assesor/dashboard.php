<!DOCTYPE html>
<html lang="en">

<?php
session_start();
include __DIR__ . '/../../static/scripts/php/connectiondb.php';
?>

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
        </ul>
        <ul class="sidebar-controls">
            <li class="item">
                <a href="/static/scripts/php/logout.php">
                    <button>
                        <img src="/static/pictures/template-icons/logout.svg" alt="">
                        <p>Salir</p>
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

                    <div class="get-assigments">
                        <?php include __DIR__ . '/../../static/scripts/php/get/asesor/view-asigments.php'; ?>

                        <form class="controls" action="/static/scripts/php/print/print-bitacory.php" method="post">
                            <button class="submit" type="submit">Generar PDF</button>
                        </form>

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
                <div class="profile dash-into-container">
                    <h3>Perfil de Asesor</h3>

                    <p>Accede y edita la información de tu perfil</p>
                    <div class="controls">
                        <a href="/pages/assesor/profile.php">
                            <button class="submit">Ir a Perfil</button>
                        </a>
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
</body>

</html>