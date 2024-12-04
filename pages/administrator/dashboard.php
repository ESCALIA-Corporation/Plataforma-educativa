<?php
include __DIR__ . '/../../static/scripts/php/connectiondb.php';

// Obtener las matrículas disponibles
$matriculas = [];
$matriculasSql = "SELECT Matricula FROM ALUMNO"; // Asegúrate de que la tabla sea correcta
$matriculasStmt = sqlsrv_query($conn, $matriculasSql);

if ($matriculasStmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

while ($row = sqlsrv_fetch_array($matriculasStmt, SQLSRV_FETCH_ASSOC)) {
    $matriculas[] = $row['Matricula'];
}

$asignaturas = [];
$asignaturasSql = "SELECT IdAsignatura, Nombre FROM ASIGNATURA"; // Asegúrate de que la tabla sea correcta
$asignaturasStmt = sqlsrv_query($conn, $asignaturasSql);

if ($asignaturasStmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

while ($row = sqlsrv_fetch_array($asignaturasStmt, SQLSRV_FETCH_ASSOC)) {
    $asignaturas[] = $row; // Almacena el array completo
}

// Consultar la tabla ASESOR
$asesores = [];
$asesorSql = "SELECT IdAsesor, Nombre, ApellidoPaterno FROM ASESOR";
$asesorStmt = sqlsrv_query($conn, $asesorSql);

if ($asesorStmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

while ($row = sqlsrv_fetch_array($asesorStmt, SQLSRV_FETCH_ASSOC)) {
    $asesores[] = $row;
}

// Consultar la tabla ASIGNATURA
$asignaturas = [];
$asignaturaSql = "SELECT IdAsignatura, Nombre FROM ASIGNATURA";
$asignaturaStmt = sqlsrv_query($conn, $asignaturaSql);

if ($asignaturaStmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

while ($row = sqlsrv_fetch_array($asignaturaStmt, SQLSRV_FETCH_ASSOC)) {
    $asignaturas[] = $row;
}

sqlsrv_close($conn);
?>

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
                    <p>Panel</p>
                </button>
            </li>
            <li class="item">
                <a href="/pages/administrator/administration.php">
                    <button><img src="/static/pictures/template-icons/settings.svg" alt="">
                        <p>Administracion</p>
                    </button>
                </a>
            </li>
            <li class="item">
                <a href="/pages/administrator/access.php">
                    <button><img src="/static/pictures/template-icons/admin-panel.svg" alt="">
                        <p>Acceso</p>
                    </button>
                </a>
            </li>
        </ul>
        <ul class="sidebar-controls">
            <li class="item">
                <a href="/index.php">
                    <button><img src="/static/pictures/template-icons/logout.svg" alt="">
                        <p>Salir</p>
                    </button>
                </a>
            </li>
            <li class="item">
                <a href="/pages/administrator/profile.php">
                    <button><img src="/static/pictures/template-icons/person.svg" alt="">
                        <p>Perfil</p>
                    </button>
                </a>
            </li>
        </ul>
    </section>

    <main class="content" id="content">
        <section class="dash-header">
            <?php

            // Verificar si los valores existen en la señsión
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
                            <br>
                            <select name="matricula" id="matricula" required>
                                <option value="">Seleccione una matrícula</option>
                                <?php foreach ($matriculas as $matricula): ?>
                                    <option value="<?php echo htmlspecialchars($matricula); ?>"><?php echo htmlspecialchars($matricula); ?></option>
                                <?php endforeach; ?>
                            </select>
                            <br>
                            <br>
                            <select name="asignatura" id="asignatura" required>
                                <option value="">Seleccione una asignatura</option>
                                <?php foreach ($asignaturas as $asignatura): ?>
                                    <option value="<?php echo htmlspecialchars($asignatura['IdAsignatura']); ?>">
                                        <?php echo htmlspecialchars($asignatura['Nombre']); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <br>
                            <div class="placeholder">
                                <input class="input" type="text" name="tema" placeholder="Tema" required>
                            </div>
                            <div class="placeholder">
                                <input class="input" type="text" name="horario" placeholder="Horario" required>
                            </div>
                            <div class="placeholder">
                                <input class="input" type="text" name="horas" placeholder="Horas por Semana" required>
                            </div>

                            <div class="controls">
                                <button class="submit" id="close-assesory-button">Cancelar</button>
                                <button class="submit" type="submit">Crear</button>
                            </div>
                        </form>
                    </div>

                    <div class="emergent-sidebar" id="new-assigment-container">
                        <h1>Crear Asignación</h1>
                        <br>
                        <form method="POST" action="/static/scripts/php/post/new-asigment.php">
                            <select id="idAsignatura" name="idAsignatura" required>
                                <option value="">Seleccione una Asignatura</option>
                                <?php foreach ($asignaturas as $asignatura): ?>
                                    <option value="<?php echo htmlspecialchars($asignatura['IdAsignatura']); ?>">
                                        <?php echo htmlspecialchars($asignatura['Nombre']); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select><br><br>

                            <label for="idAsesor">Asesor:</label>
                            <select id="idAsesor" name="idAsesor" required>
                                <option value="">Seleccione un Asesor</option>
                                <?php foreach ($asesores as $asesor): ?>
                                    <option value="<?php echo htmlspecialchars($asesor['IdAsesor']); ?>">
                                        <?php echo htmlspecialchars($asesor['Nombre'] . ' ' . $asesor['ApellidoPaterno']); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select><br>
                            <br>

                            <select name="tipoAsesoria" id="tipoAsesoria" required>
                                <option value="">Tipo de Asesoría</option>
                                <option value="Individual">Individual</option>
                                <option value="Grupal">Grupal</option>
                            </select><br>
                            <br>

                            <label for="fechaAsignacion">Fecha de Asignación:</label>
                            <input type="date" id="fechaAsignacion" name="fechaAsignacion" required><br>

                            <input type="text" id="lugar" name="lugar" required placeholder="Lugar:"><br>

                            <input type="number" id="horasEstimadas" name="horasEstimadas" required placeholder="Horas estimadas:"><br>

                            <input type="text" id="horario" name="horario" required placeholder="Horario:"><br>

                            <button class="submit" type="submit">Crear Asignación</button>
                            <button class="submit" id="close-assigment-button">Cancelar</button>
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
                        <a href="../administrator/access.php">
                            <button class="toadmin">
                                <figure><img src="/static/pictures/administrator/admin.svg" alt="" style="height: 40px;"></figure>
                                <p>Administradores</p>
                            </button>
                        </a>
                        <a href="../administrator/access.php">
                            <button class="toadmin">
                                <figure><img src="/static/pictures/administrator/school.svg" alt="" style="height: 40px;"></figure>
                                <p>Profesores</p>
                            </button>
                        </a>

                    </div>
                    <div class="controls">
                        <a href="../administrator/access.php">
                            <button class="submit">Administrar Acceso</button>
                        </a>
                    </div>
                </div>
                <div class="data-manage dash-into-container">
                    <h3>Panel de administarcion de datos</h3>

                    <p>Adminsitra los datos que estan funcionando en la aplicacion y en caso de incongruencias editalo y
                        borralo</p>
                    <div class="controls">
                        <a href="../administrator/administration.php">
                            <button class="submit">ir a Panel</button>
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
    <script src="/static/scripts/dashboard.js"></script>
</body>

</html>