<?php
// TODO: CHANGE FOR A PROCEDURE QUERY
// TODO: AUTENTICACION PARA ASESORES

include __DIR__ . '/connectiondb.php';

session_start();
$inputUsername = trim($_POST['adminusuario']);
$inputPassword = trim($_POST['admincontraseña']);

$sql = "SELECT * FROM USUARIO WHERE Usuario = ?";
$params = array($inputUsername);
$stmt = sqlsrv_query($conn, $sql, $params);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

$user = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

//var_dump($inputPassword, $user['Tipo']); // COMPARE THE QUERRY WITH THE POST DATA
if ($user && $inputPassword === trim($user['Contrasena'])) {
    $_SESSION['ID_user'] = $user['IdUsuario'];
    $_SESSION['Nombre_user'] = $user['Descripcion'];
    $_SESSION['Id_programaedu'] = $user['IdPE'];

    header('Location: /./pages/administrator/dashboard.php');
    exit();
} else {
    echo "Usuario o contraseña incorrectos.";
}

sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);
