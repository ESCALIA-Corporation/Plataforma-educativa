<?php
include __DIR__ . '/../connectiondb.php';

// Recibir los datos del formulario
$descripcion = $_POST['descripcion'];
$usuario = $_POST['usuario'];
$contraseña = $_POST['contrasena'];

try {
    // Verificar si el usuario ya existe
    $checkUserSql = "SELECT COUNT(*) AS userCount FROM Usuario WHERE usuario = ?";
    $checkUserStmt = sqlsrv_query($conn, $checkUserSql, array($usuario));

    if ($checkUserStmt === false) {
        throw new Exception(print_r(sqlsrv_errors(), true));
    }

    $row = sqlsrv_fetch_array($checkUserStmt, SQLSRV_FETCH_ASSOC);
    if ($row['userCount'] > 0) {
        throw new Exception("El usuario ya existe.");
    }

    // Obtener el último IdUsuario
    $lastIdSql = "SELECT MAX(IdUsuario) AS lastId FROM Usuario";
    $lastIdStmt = sqlsrv_query($conn, $lastIdSql);

    if ($lastIdStmt === false) {
        throw new Exception(print_r(sqlsrv_errors(), true));
    }

    $lastIdRow = sqlsrv_fetch_array($lastIdStmt, SQLSRV_FETCH_ASSOC);
    $newId = $lastIdRow['lastId'] + 1; // Generar nuevo ID

    // Si no hay registros, iniciar desde 1
    if (is_null($newId)) {
        $newId = 1;
    }

    // Insertar el nuevo registro
    $sql = "INSERT INTO Usuario (IdUsuario, Descripcion, Tipo, Usuario, Contrasena) VALUES (?, ?, ?, ?, ?)";
    $params = array($newId, $descripcion, 'Administrador', $usuario, $contraseña);

    // EXECUTE
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        throw new Exception(print_r(sqlsrv_errors(), true));
    }

    header('Location: /./pages/administrator/access.php');
} catch (Exception $e) {
    echo "Error al insertar el registro: " . $e->getMessage();
}

sqlsrv_close($conn);
?>
