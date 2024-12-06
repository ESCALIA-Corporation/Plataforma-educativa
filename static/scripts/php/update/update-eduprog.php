<?php
include __DIR__ . '/../connectiondb.php';

session_start();

// Verificar que el usuario está autenticado
if (!isset($_SESSION['ID_user'])) {
    die("Error: Sesión no iniciada. No se puede proceder.");
}

$idUsuario = $_SESSION['ID_user'];

// Obtener los datos del formulario
$idPE = $_POST['idPE'] ?? null; // ID del programa educativo
$clavePE = $_POST['n-clavePE'] ?? null; // Clave del programa educativo
$nombre = $_POST['n-nombre'] ?? null; // Nombre del programa educativo
$responsable = $_POST['n-responsable'] ?? null; // Responsable del programa educativo

try {
    // Validar que todos los datos requeridos están presentes
    if (empty($idPE) || empty($clavePE) || empty($nombre) || empty($responsable)) {
        throw new Exception("Faltan datos para actualizar. Verifica el formulario.");
    }

    // Verificar conexión a la base de datos
    if (!$conn) {
        throw new Exception("Error en la conexión a la base de datos: " . print_r(sqlsrv_errors(), true));
    }

    // Preparar la consulta para el procedimiento almacenado
    $sql = "{CALL SP_U_PE(?, ?, ?, ?, ?)}";
    $params = array($idPE, $clavePE, $nombre, $responsable, $idUsuario);

    // Depuración: Verificar parámetros
    // echo "<pre>"; print_r($params); echo "</pre>"; die();

    // Ejecutar la consulta
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        throw new Exception("Error al ejecutar la consulta: " . print_r(sqlsrv_errors(), true));
    }

    // Si la consulta fue exitosa, redirigir
    header('Location: /pages/administrator/administration.php');
    exit;
} catch (Exception $e) {
    // Manejar errores y mostrar mensaje
    echo "Error al actualizar el registro: " . $e->getMessage();
}

// Cerrar la conexión
if ($conn) {
    sqlsrv_close($conn);
}
