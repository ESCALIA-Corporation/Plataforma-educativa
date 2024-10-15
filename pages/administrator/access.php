<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/static/stylesheets/template.css">
    <link rel="stylesheet" href="/static/stylesheets/administrator/access.css">
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
            <li class="item">
                <a href="/pages/administrator/administration.php">
                    <button><img src="/static/pictures/template-icons/settings.svg" alt="">
                        <p>Administration</p>
                    </button>
                </a>
            </li>
            <li class="item"><button class="active">
                    <img src="/static/pictures/template-icons/admin-panel.svg" alt="">
                    <p>Access</p>
                </button>
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
        <section class="access-header">
            <h2>Centro de administracion de accesso</h2>
        </section>
        <section class="description">

        </section>

        <section class="access">
            <div class="accounds-table">
                <div class="controls">
                    <button class="submit" id="new-assesor-button">Nuevo Asesor</button>
                    <button class="submit" id="new-admin-button">Nuevo Administrador</button>
                    <button class="submit" id="new-student-button">Nuevo Estudiante</button>
                </div>

                <div class="get-asesors">
                    <h3>Lista de Asesores</h3>
                    <?php include __DIR__ . '/../../static/scripts/php/get/view-asesors.php'; ?>
                </div>

                <div class="get-students">
                    <h3>Lista de Estudiantes</h3>
                    <?php include __DIR__ . '/../../static/scripts/php/get/view-students.php'; ?>
                </div>

                <div class="new-accound assesor emergent-sidebar" id="new-assesor-accound-container">
                    <h3>Registrar un nuevo Asesor academico</h3>
                    <form action="/static/scripts/php/post/new-asesor.php" method="post">
                        <div class="placeholder">
                            <input id="name" type="text" name="Id-asesor" placeholder="ID de Asesor" required>
                        </div>
                        <div class="placeholder">
                            <input type="text" name="nombre-asesor" placeholder="Nombre" required>
                        </div>
                        <div class="placeholder">
                            <input type="text" name="apellido-p" placeholder="Apellido Paterno" required>
                        </div>
                        <div class="placeholder">
                            <input type="text" name="apellido-m" placeholder="Apellido Materno" required>
                        </div>
                        <div class="placeholder">
                            <select id="genre" name="genero" required>
                                <option value="Masculino">Hombre</option>
                                <option value="Femenino">Mujer</option>
                            </select>
                        </div>
                        <div class="placeholder">
                            <input type="text" name="telefono" placeholder="Telefono" required>
                        </div>
                        <div class="placeholder">
                            <input type="text" name="correo" placeholder="Correo Electronico" required>
                        </div>
                        <div class="placeholder">
                            <select class="combobox" name="programa-educativo" required>
                                <option value="1">Gestion Empresarial</option>
                                <option value="2">Sistemas Computacionales</option>
                                <option value="3">Arquitectura</option>
                                <option value="4">Tecnologias de la Informacion y comunicaciones</option>
                            </select>
                        </div>

                        <div class="signup-controls">
                            <button class="submit" id="close-assesor-button">Cancelar</button>
                            <button class="submit" type="submit">Registrar</button>
                        </div>
                    </form>
                </div>

                <div class="new-accound admin emergent-sidebar" id="new-admin-accound-container">
                    <h3>Registrar un nuevo administrador</h3>
                    <form action="" method="post">
                        <div class="placeholder">
                            <input class="matricula" type="text" name="matricula" placeholder="Matricula" required>
                        </div>
                        <div class="placeholder">
                            <input type="text" name="nombre" placeholder="Nombre" required>
                        </div>
                        <div class="placeholder">
                            <input type="text" name="apaterno" placeholder="Apellido Paterno" required>
                        </div>
                        <div class="placeholder">
                            <input type="text" name="amaterno" placeholder="Apellido Materno" required>
                        </div>
                        <div class="placeholder">
                            <select class="type" name="tipo">
                                <option value="Masculino">Hombre</option>
                                <option value="Femenino">Mujer</option>
                            </select>
                        </div>

                        <div class="placeholder">
                            <select class="combobox" name="programa-educativo" required>
                                <option value="1">Gestion Empresarial</option>
                                <option value="2">Sistemas Computacionales</option>
                                <option value="3">Arquitectura</option>
                                <option value="4">Tecnologias de la Informacion y comunicaciones</option>
                            </select>
                        </div>

                        <div class="placeholder">
                            <input type="text" name="usuario" placeholder="Usuario" required>
                        </div>
                        <div class="placeholder">
                            <input type="password" name="contraseña" placeholder="Contraseña" required>
                        </div>
                        <div class="placeholder">
                            <input type="password" name="confirm-contraseña" placeholder="Contraseña" required>
                        </div>

                        <div class="signup-controls">
                            <button class="submit" id="close-admin-button">Cancelar</button>
                            <button class="submit" type="submit">Registrar</button>
                        </div>
                    </form>
                </div>
                <div class="new-accound student emergent-sidebar" id="new-student-accound-container">
                    <h3>Registrar un nuevo Alumno</h3>
                    <form action="/static/scripts/php/post/new-student.php" method="post">
                        <div class="placeholder">
                            <input class="matricula" type="text" name="matricula" placeholder="Matricula" required>
                        </div>
                        <div class="placeholder">
                            <input type="text" name="nombre-estudiante" placeholder="Nombre" required>
                        </div>
                        <div class="placeholder">
                            <input type="text" name="apellido-p" placeholder="Apellido Paterno" required>
                        </div>
                        <div class="placeholder">
                            <input type="text" name="apellido-m" placeholder="Apellido Materno" required>
                        </div>
                        <div class="placeholder">
                            <select class="type" name="genero">
                                <option value="Masculino">Hombre</option>
                                <option value="Femenino">Mujer</option>
                            </select>
                        </div>

                        <div class="placeholder">
                            <input type="text" name="semestre" placeholder="Semestre" required>
                            <input type="text" name="grupo" placeholder="grupo" required>
                            <select class="combobox" name="programa-educativo" required>
                                <option value="1">Gestion Empresarial</option>
                                <option value="2">Sistemas Computacionales</option>
                                <option value="3">Arquitectura</option>
                                <option value="4">Tecnologias de la Informacion y comunicaciones</option>
                            </select>
                        </div>

                        <div class="placeholder">
                            <select class="combobox" name="idusuario" required>
                                <option value="1">1</option>
                                <option value="2">2</option>
                            </select>
                        </div>

                        <div class="signup-controls">
                            <button class="submit" id="close-student-button">Cancelar</button>
                            <button class="submit" type="submit">Registrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>

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
    <script src="/static/scripts/access.js"></script>
</body>

</html>