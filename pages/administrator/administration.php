<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administracion de datos | Plataforma Educativa</title>
    <link rel="stylesheet" href="/static/stylesheets/template.css">
    <link rel="stylesheet" href="/static/stylesheets/administrator/administrator.css">
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
            <li class="item"><a href="/pages/administrator/dashboard.php">
                    <button><img src="/static/pictures/template-icons/dashboard.svg" alt="">
                        <p>Dashboard</p>
                    </button>
                </a>
            </li>
            <li class="item"><button class="active">
                    <img src="/static/pictures/template-icons/settings.svg" alt="">
                    <p>Administration</p>
                </button>
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
            <a href="/index.php">
                <li class="item">
                    <button><img src="/static/pictures/template-icons/logout.svg" alt="">
                        <p>Logout</p>
                    </button>
                </li>
            </a>
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
        <section class="admin-header">
            <h2>Administracion de datos</h2>
        </section>

        <section class="admin">
            <div class="schedule">
                <h3>Centro de carga de Horarios</h3>

                <form action="" method="get">
                    Cargar Horario
                </form>
            </div>

            <div class="container">
                <div class="educative-program">
                    <h3>Programas Educativos Registrados</h3>

                    <div class="get-eduprogram">
                        <?php include __DIR__ . '/../../static/scripts/php/get/view-eduprog.php'; ?>
                    </div>

                    <div class="controls">
                        <button class="submit" id="new-educative-program-button">Nuevo Pograma educativo</button>
                    </div>

                    <div class="new-educative-program emergent-sidebar" id="panel-educative-program">
                        <h3>Nuevo Programa educativo</h3>
                        <form action="/static/scripts/php//post/new-eduprogram.php" method="post">
                            <div class="placeholder">
                                <input class="input" type="text" name="id-edu-program" placeholder="Folio" required>
                            </div>
                            <div class="placeholder">
                                <input class="input" type="text" name="clave-edu-program" placeholder="Clave" required>
                            </div>
                            <div class="placeholder">
                                <input class="input" type="text" name="name-resp" placeholder="Nombre" required>
                            </div>
                            <div class="placeholder">
                                <input class="input" type="text" name="responsable-pe" placeholder="Jefe de Carrera" required>
                            </div>
                            <div class="placeholder">
                                <select class="combobox" name="idusuario" required>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                </select>
                            </div>

                            <div class="controls">
                                <button class="submit" id="close-educative-program-button">Cancelar</button>
                                <button class="submit" type="submit">Crear</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="asignature">
                    <h3>Materias actualmente registradas educativo</h3>

                    <div class="get-mates">
                        <?php include __DIR__ . '/../../static/scripts/php/get/view-mates.php'; ?>
                    </div>

                    <div class="controls">
                        <button class="submit" id="new-assignature-button">Nueva Asignatura</button>
                    </div>
                    <div class="new-asignature emergent-sidebar" id="panel-asignature">
                        <h3>Nueva Asignatura</h3>
                        <form action="/static/scripts/php/post/new-mate.php" method="post">
                            <div class="placeholder">
                                <input class="input" type="text" name="id-materia" placeholder="Folio" required>
                            </div>
                            <div class="placeholder">
                                <input class="input" type="text" name="nombre-materia" placeholder="Nombre" required>
                            </div>
                            <div class="placeholder">
                                <input class="input" type="text" name="creditos" placeholder="Creditos" required>
                            </div>
                            <div class="placeholder">
                                <input class="input" type="text" name="semestre" placeholder="Semestre" required>
                            </div>

                            <div class="controls">
                                <button class="submit" id="close-asignature-button">Cancelar</button>
                                <button class="submit" type="submit">Crear</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        .
        <!-- 
        <section class="schedules">
            <h3>Cargar Horarios</h3>
            <form action="">
                <p>Cargar Horariosn</p>
            </form>
        </section>

        <section class="education-program">
            <h3>Programa Educativo</h3>

            <form action="">
                <div class="placeholder">
                    <p>Clave:</p>
                    <input class="input" type="text" id="contraseña" placeholder=" " required>
                </div>
                <div class="placeholder">
                    <p>Nombre:</p>
                    <input class="input" type="text" id="contraseña" placeholder=" " required>
                </div>
                <div class="placeholder">
                    <p>Responsable:</p>
                    <input class="input" type="text" id="contraseña" placeholder=" " required>
                </div>
            </form>
        </section>
    -->

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
    <script src="/static/scripts/administration.js"></script>
</body>

</html>