<?php
include __DIR__ . '/../connectiondb.php'; // Incluir conexión a la base de datos

session_start();

// Verificar que la sesión esté iniciada
if (!isset($_SESSION['ID_user'])) {
    die("Error: Sesión no iniciada. No se puede proceder.");
}

$idUsuario = $_SESSION['ID_user']; // Obtener el ID del usuario

// Obtener los valores del formulario
$idAsesoria = $_POST['idAsesoria'] ?? null; // ID de la asesoría
$matricula = $_POST['matricula'] ?? null; // Matricula del alumno
$idAsignatura = $_POST['idAsignatura'] ?? null; // ID de la asignatura
$tema = $_POST['n-tema'] ?? null; // Tema de la asesoría
$horario = $_POST['n-horario'] ?? null; // Horario
$totalHoras = $_POST['n-totalHoras'] ?? null; // Total de horas
$fechaRegistro = $_POST['n-fechaRegistro'] ?? null; // Fecha de registro

try {
    // Validar que todos los campos necesarios estén presentes
    if (empty($idAsesoria) || empty($matricula) || empty($idAsignatura) || empty($tema) || empty($horario) || empty($totalHoras) || empty($fechaRegistro)) {
        throw new Exception("Faltan datos para actualizar. Verifica el formulario.");
    }

    // Verificar la conexión a la base de datos
    if (!$conn) {
        throw new Exception("Error en la conexión a la base de datos: " . print_r(sqlsrv_errors(), true));
    }

    // Llamar al procedimiento almacenado para actualizar la asesoría
    $sql = "{CALL SP_U_ASESORIA(?, ?, ?, ?, ?, ?, ?, ?)}";
    $params = array($idAsesoria, $matricula, $idAsignatura, $tema, $horario, $totalHoras, $fechaRegistro, 'P');
    
    // Ejecutar la consulta
    $stmt = sqlsrv_query($conn, $sql, $params);

    // Comprobar si la consulta fue exitosa
    if ($stmt === false) {
        throw new Exception("Error al ejecutar la consulta: " . print_r(sqlsrv_errors(), true));
    }

    // Redireccionar a la página de administración
    header('Location: /pages/administrator/administration.php');
    exit;
} catch (Exception $e) {
    // Mostrar el mensaje de error si ocurre una excepción
    echo "Error al actualizar el registro: " . $e->getMessage();
}

// Cerrar la conexión a la base de datos si es necesario
if ($conn) {
    sqlsrv_close($conn);
}
?>
