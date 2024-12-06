<?php
include __DIR__ . '/../connectiondb.php';

session_start();

try {
    if (!isset($_SESSION['ID_user'])) {
        throw new Exception("El usuario no está autenticado.");
    }

    $idUsuario = $_SESSION['ID_user'];

    if (empty($idUsuario)) {
        throw new Exception("ID de usuario no encontrado.");
    }

    $sql = "{CALL SP_D_USER(?)}";
    $params = array($idUsuario);
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        $error = sqlsrv_errors();
        throw new Exception("Error al ejecutar la consulta: " . print_r($error, true));
    }

    session_unset();
    session_destroy();
    header("Location: /index.php");
    exit;

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
} finally {
    if (isset($conn)) {
        sqlsrv_close($conn);
    }
}