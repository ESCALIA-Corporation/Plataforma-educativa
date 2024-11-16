<?php
include __DIR__ . '/../connectiondb.php';

session_start();
$idUsuario = $_SESSION['ID_user'];

//$idUsuario = $_POST['idUsuario'];
$descripcion = $_POST['n-descripcion'];
$tipo = $_POST['tipo'];
$usuario = $_POST['usuario'];
$contrasenaNueva = $_POST['contrasenaNueva'];

try {
    // Preparar la consulta
    $sql = "SP_U_USUARIO ?, ?, ?, ?, ?";
    $params = array($idUsuario, $descripcion, $tipo, $usuario, $contrasenaNueva);

    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        throw new Exception(print_r(sqlsrv_errors(), true));
    }

    header('Location: /./pages/administrator/profile.php');
} catch (Exception $e) {
    echo "Error al insertar el registro: " . $e->getMessage();
}


sqlsrv_close($conn);
