<?php
include __DIR__ . '/../../static/scripts/php/connectiondb.php';

$alumnos = [];
$alumnosSql = "SELECT Matricula, Nombre, ApellidoPaterno, ApellidoMaterno FROM ALUMNO";
$alumnosStmt = sqlsrv_query($conn, $alumnosSql);

if ($alumnosStmt === false) {
    die("Error al consultar alumnos: " . print_r(sqlsrv_errors(), true));
}

while ($row = sqlsrv_fetch_array($alumnosStmt, SQLSRV_FETCH_ASSOC)) {
    $alumnos[] = [
        'Matricula' => $row['Matricula'],
        'Nombre' => $row['Nombre'],
        'ApellidoPaterno' => $row['ApellidoPaterno'],
        'ApellidoMaterno' => $row['ApellidoMaterno']
    ];
}

$asignaturas = [];
$asignaturasSql = "SELECT IdAsignatura, Nombre FROM ASIGNATURA";
$asignaturasStmt = sqlsrv_query($conn, $asignaturasSql);

if ($asignaturasStmt === false) {
    die("Error al consultar asignaturas: " . print_r(sqlsrv_errors(), true));
}

while ($row = sqlsrv_fetch_array($asignaturasStmt, SQLSRV_FETCH_ASSOC)) {
    $asignaturas[] = [
        'IdAsignatura' => $row['IdAsignatura'],
        'Nombre' => $row['Nombre']
    ];
}

$asesores = [];
$asesorSql = "SELECT IdAsesor, Nombre, ApellidoPaterno FROM ASESOR";
$asesorStmt = sqlsrv_query($conn, $asesorSql);

if ($asesorStmt === false) {
    die("Error al consultar asesores: " . print_r(sqlsrv_errors(), true));
}

while ($row = sqlsrv_fetch_array($asesorStmt, SQLSRV_FETCH_ASSOC)) {
    $asesores[] = [
        'IdAsesor' => $row['IdAsesor'],
        'Nombre' => $row['Nombre'],
        'ApellidoPaterno' => $row['ApellidoPaterno']
    ];
}

$asesorias = [];
$asesoriasSql = "SELECT IdAsesoria, Matricula FROM ASESORIA";
$asesoriasStmt = sqlsrv_query($conn, $asesoriasSql);

if ($asesoriasStmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

while ($row = sqlsrv_fetch_array($asesoriasStmt, SQLSRV_FETCH_ASSOC)) {
    $asesorias[] = [
        'IdAsesoria' => $row['IdAsesoria'],
        'Matricula' => $row['Matricula']
    ];
}


$asesorias = [];
$asesoriasSql = "SELECT IdAsesoria, Matricula, IdAsignatura FROM ASESORIA";
$asesoriasStmt = sqlsrv_query($conn, $asesoriasSql);

if ($asesoriasStmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

while ($row = sqlsrv_fetch_array($asesoriasStmt, SQLSRV_FETCH_ASSOC)) {
    $asesoriaDetallesSql = "SELECT B.Nombre AS Asignatura 
                            FROM ASIGNATURA B
                            WHERE B.IdAsignatura = ?";

    $stmtDetalles = sqlsrv_query($conn, $asesoriaDetallesSql, array($row['IdAsignatura']));
    $detalle = sqlsrv_fetch_array($stmtDetalles, SQLSRV_FETCH_ASSOC);

    $asignatura = $detalle['Asignatura'];

    $asesorias[] = [
        'IdAsesoria' => $row['IdAsesoria'],
        'Matricula' => $row['Matricula'],
        'IdAsignatura' => $row['IdAsignatura'],
        'Asignatura' => $asignatura
    ];
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
                <a href="/static/scripts/php/logout.php">
                    <button>
                        <img src="/static/pictures/template-icons/logout.svg" alt="">
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
                        <button class="submit open-edit-asesoria">Editar Asesoria</button>
                        <button class="submit open-delete-asesoria">Eliminar Asesoría</button>
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
                                <?php if (!empty($asesores) && is_array($asesores)): ?>
                                    <?php foreach ($asesores as $asesor): ?>
                                        <option value="<?php echo htmlspecialchars($asesor['IdAsesor']); ?>">
                                            <?php echo htmlspecialchars($asesor['Nombre'] . ' ' . $asesor['ApellidoPaterno']); ?>
                                        </option>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <option value="" disabled>No hay asesores disponibles</option>
                                <?php endif; ?>
                            </select>
                            <br><br>

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
                <div class="profile dash-into-container">
                    <h3>Perfil de Asesor</h3>

                    <p>Accede y edita la información de tu perfil</p>
                    <div class="controls">
                        <a href="/pages/administrator/profile.php">
                            <button class="submit">Ir a Perfil</button>
                        </a>
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

        <section>
            <div class="emergent-sidebar" id="edit-panel-asesoria">
                <h3>Edita una Asesoría</h3>
                <br>
                <form action="/static/scripts/php/update/update-asesoria.php" method="post">
                    <label for="asesoria">Selecciona una Asesoría:</label>
                    <select id="asesoria" name="idAsesoria" required>
                        <option value="">Selecciona una asesoría</option>
                        <?php foreach ($asesorias as $asesoria): ?>
                            <option value="<?php echo htmlspecialchars($asesoria['IdAsesoria']); ?>"
                                <?php echo isset($idAsesoria) && $idAsesoria == $asesoria['IdAsesoria'] ? 'selected' : ''; ?>>
                                <?php echo htmlspecialchars("Asesoría {$asesoria['IdAsesoria']} - Matricula {$asesoria['Matricula']}"); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <br><br>

                    <label for="alumno">Selecciona un Alumno:</label>
                    <select id="alumno" name="matricula" required>
                        <option value="">Selecciona un alumno</option>
                        <?php foreach ($alumnos as $alumno): ?>
                            <option value="<?php echo htmlspecialchars($alumno['Matricula']); ?>"
                                <?php echo isset($matricula) && $matricula == $alumno['Matricula'] ? 'selected' : ''; ?>>
                                <?php echo htmlspecialchars($alumno['Matricula'] . ' - ' . $alumno['Nombre'] . ' ' . $alumno['ApellidoPaterno'] . ' ' . $alumno['ApellidoMaterno']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <br><br>
                    <label for="asignatura">Selecciona una Asignatura:</label>
                    <select id="asignatura" name="idAsignatura" required>
                        <option value="">Selecciona una asignatura</option>
                        <?php foreach ($asignaturas as $asignatura): ?>
                            <option value="<?php echo htmlspecialchars($asignatura['IdAsignatura']); ?>"
                                <?php echo isset($idAsignatura) && $idAsignatura == $asignatura['IdAsignatura'] ? 'selected' : ''; ?>>
                                <?php echo htmlspecialchars($asignatura['IdAsignatura'] . ' - ' . $asignatura['Nombre']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <br><br>
                    <input type="text" id="tema" name="n-tema" placeholder="Tema"
                        value="<?php echo htmlspecialchars($tema ?? ''); ?>" pattern=".{1,255}" title="Máximo 255 caracteres" required>
                    <br><br>
                    <input type="time" id="horario" name="n-horario" placeholder="Horario"
                        value="<?php echo htmlspecialchars($horario ?? ''); ?>" required>
                    <br><br>
                    <input type="number" id="totalHoras" name="n-totalHoras" placeholder="Total Horas"
                        value="<?php echo htmlspecialchars($totalHoras ?? ''); ?>" min="1" max="12" required>
                    <br><br>
                    <input type="date" id="fechaRegistro" name="n-fechaRegistro"
                        value="<?php echo htmlspecialchars($fechaRegistro ?? ''); ?>" required>
                    <br><br>
                    <button type="button" class="submit" id="cancel-asesoria-button" onclick="closeEditPanel()">Cancelar</button>
                    <button class="submit" type="submit">Actualizar</button>
                </form>
            </div>

            <div class="emergent-sidebar" id="delete-panel-asesoria">
                <h3>Eliminar una Asesoría</h3>
                <br>
                <form action="/static/scripts/php/delete/delete-asesory.php" method="post">
                    <select id="asesoria" name="asesoria" required>
                        <option value="">Selecciona una asesoría</option>
                        <?php foreach ($asesorias as $asesoria): ?>
                            <option value="<?php echo htmlspecialchars("{$asesoria['IdAsesoria']}-{$asesoria['Matricula']}-{$asesoria['IdAsignatura']}"); ?>">
                                <?php echo htmlspecialchars("Asesoría: {$asesoria['IdAsesoria']} - {$asesoria['Matricula']} - {$asesoria['Asignatura']}"); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <br><br>

                    <button type="button" class="submit" id="cancel-delete-button" onclick="closeDeletePanel()">Cancelar</button>
                    <button class="submit" type="submit">Eliminar</button>
                </form>
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
    <script src="/static/scripts/dashboard.js"></script>
</body>

</html>