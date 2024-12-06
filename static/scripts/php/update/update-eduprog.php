<?php
include __DIR__ . '/../connectiondb.php';

session_start();

if (!isset($_SESSION['ID_user'])) {
    die("Error: Sesión no iniciada. No se puede proceder.");
}

$idUsuario = $_SESSION['ID_user'];

$idPE = $_POST['idPE'] ?? null; // ID del programa educativo
$clavePE = $_POST['n-clavePE'] ?? null; // Clave del programa educativo
$nombre = $_POST['n-nombre'] ?? null; // Nombre del programa educativo
$responsable = $_POST['n-responsable'] ?? null; // Responsable del programa educativo

try {
    if (empty($idPE) || empty($clavePE) || empty($nombre) || empty($responsable)) {
        throw new Exception("Faltan datos para actualizar. Verifica el formulario.");
    }

    if (!$conn) {
        throw new Exception("Error en la conexión a la base de datos: " . print_r(sqlsrv_errors(), true));
    }

    $sql = "{CALL SP_U_PE(?, ?, ?, ?, ?)}";
    $params = array($idPE, $clavePE, $nombre, $responsable, $idUsuario);
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        throw new Exception("Error al ejecutar la consulta: " . print_r(sqlsrv_errors(), true));
    }

    header('Location: /pages/administrator/administration.php');
    exit;
} catch (Exception $e) {
    echo "Error al actualizar el registro: " . $e->getMessage();
}

if ($conn) {
    sqlsrv_close($conn);
}
