<!DOCTYPE html>
<html lang="en">

<?php
include __DIR__ . '/../../static/scripts/php/connectiondb.php';

// Obtener el idPE de la solicitud (GET o POST)
$idPE = $_GET['idPE'] ?? null; // Cambia a $_POST si es necesario

// Inicializar variables para el nombre y responsable
$nombre = '';
$responsable = '';

// Obtener los programas educativos disponibles
$programasEducativos = [];
$programasSql = "SELECT IdPE, ClavePE, Nombre FROM PROGRAMA_EDUCATIVO"; // Asegúrate de que la tabla sea correcta
$programasStmt = sqlsrv_query($conn, $programasSql);

if ($programasStmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

while ($row = sqlsrv_fetch_array($programasStmt, SQLSRV_FETCH_ASSOC)) {
    $programasEducativos[] = [
        'IdPE' => $row['IdPE'],
        'ClavePE' => $row['ClavePE'],
        'Nombre' => $row['Nombre']
    ];
}

// Si se proporciona un idPE, obtener los detalles del programa educativo
if ($idPE) {
    $detallesSql = "SELECT Nombre, Responsable FROM PROGRAMA_EDUCATIVO WHERE IdPE = ?";
    $detallesStmt = sqlsrv_prepare($conn, $detallesSql, array($idPE));

    if (sqlsrv_execute($detallesStmt)) {
        if ($row = sqlsrv_fetch_array($detallesStmt, SQLSRV_FETCH_ASSOC)) {
            $nombre = $row['Nombre'];
            $responsable = $row['Responsable'];
        } else {
            // Manejar el caso en que no se encuentra el programa educativo
            echo "No se encontró el programa educativo.";
        }
    } else {
        die(print_r(sqlsrv_errors(), true));
    }
}
?>

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
                        <p>Panel</p>
                    </button>
                </a>
            </li>
            <li class="item"><button class="active">
                    <img src="/static/pictures/template-icons/settings.svg" alt="">
                    <p>Administracion</p>
                </button>
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
                        <p>Perfile</p>
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
                        <button class="submit open-edit-eduprog">Editar Pograma educativo</button>
                    </div>

                    <div class="new-educative-program emergent-sidebar" id="panel-educative-program">
                        <h3>Nuevo Programa educativo</h3>
                        <form action="/static/scripts/php//post/new-eduprogram.php" method="post">
                            <div class="placeholder">
                                <input class="input" type="text" name="clave-edu-program" placeholder="Clave" required>
                            </div>
                            <div class="placeholder">
                                <input class="input" type="text" name="name-resp" placeholder="Nombre" required>
                            </div>
                            <div class="placeholder">
                                <input class="input" type="text" name="responsable-pe" placeholder="Jefe de Carrera" required>
                            </div>

                            <div class="controls">
                                <button class="submit" id="close-educative-program-button">Cancelar</button>
                                <button class="submit" type="submit">Crear</button>
                            </div>
                        </form>
                    </div>
                    <div class="emergent-sidebar" id="edit-panel-educative-program">
                        <h3>Edita un Programa educativo</h3>
                        <br>
                        <form action="/static/scripts/php/update/update-eduprog.php" method="post">
                            <select id="programaEducativo" name="idPE" required>
                                <option value="">Selecciona un programa educativo </option>
                                <?php foreach ($programasEducativos as $programa): ?>
                                    <option value="<?php echo htmlspecialchars($programa['IdPE']); ?>"
                                        <?php echo ($programa['IdPE'] == $idPE) ? 'selected' : ''; ?>>
                                        <?php echo htmlspecialchars($programa['ClavePE'] . ' - ' . $programa['Nombre']); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <br>
                            <br>
                            <input type="text" id="clavePE" name="n-clavePE" placeholder="Clave del Programa Educativo" value="<?php echo htmlspecialchars($clavePE ?? ''); ?>" required>
                            <br><br>
                            <input type="text" id="n-nombre" name="n-nombre" placeholder="Nombre de programa educativo" value="<?php echo htmlspecialchars($responsable ?? ''); ?>" required>
                            <br><br>
                            <input type="text" id="responsable" name="n-responsable" placeholder="Responsable del Programa Educativo" value="<?php echo htmlspecialchars($responsable ?? ''); ?>" required>
                            <br>
                            <button class="submit" id="cancel-educative-program-button">Cancelar</button>
                            <button class="submit" type="submit">Actualizar</button>
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