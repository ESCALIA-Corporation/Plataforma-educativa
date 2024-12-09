<?php
include __DIR__ . '/../connectiondb.php'; // Incluir conexión a la base de datos
session_start();

if (!isset($_SESSION['ID_user'])) {
    die("Error: Sesión no iniciada. No se puede proceder.");
}

$idUsuario = $_SESSION['ID_user']; // Obtener el ID del usuario

$idAsesoria = $_POST['idAsesoria'] ?? null; // ID de la asesoría
$matricula = $_POST['matricula'] ?? null; // Matricula del alumno
$idAsignatura = $_POST['idAsignatura'] ?? null; // ID de la asignatura
$tema = $_POST['n-tema'] ?? null; // Tema de la asesoría
$horario = $_POST['n-horario'] ?? null; // Horario
$totalHoras = $_POST['n-totalHoras'] ?? null; // Total de horas
$fechaRegistro = $_POST['n-fechaRegistro'] ?? null; // Fecha de registro

try {
    if (empty($idAsesoria) || empty($matricula) || empty($idAsignatura) || empty($tema) || empty($horario) || empty($totalHoras) || empty($fechaRegistro)) {
        throw new Exception("Faltan datos para actualizar. Verifica el formulario.");
    }

    $sql = "{CALL SP_U_ASESORIA(?, ?, ?, ?, ?, ?, ?, ?)}";
    $params = array($idAsesoria, $matricula, $idAsignatura, $tema, $horario, $totalHoras, $fechaRegistro, 'P');

    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        throw new Exception("Error al ejecutar la consulta: " . print_r(sqlsrv_errors(), true));
    }

    header('Location: /./pages/administrator/dashboard.php');
    exit;
} catch (Exception $e) {
    echo "Error al actualizar el registro: " . $e->getMessage();
}

if ($conn) {
    sqlsrv_close($conn);
}
