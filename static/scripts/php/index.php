<?php
// TODO: CHANGE FOR A PROCEDURE QUERY
// TODO: AUTENTICACION PARA ADMINISTRADORES
include __DIR__ . '/connectiondb.php';

session_start();

// Obtener y sanitizar los datos ingresados por el usuario
$inputUsername = trim($_POST['adminusuario']);
$inputPassword = trim($_POST['admincontraseña']);

try {
    // Consulta para obtener al usuario y validar su tipo
    $sql = "SELECT * FROM USUARIO WHERE Usuario = ? AND Tipo = ?";
    $params = array($inputUsername, 'Administrador'); // Filtrar por tipo "Administrador"
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        throw new Exception(print_r(sqlsrv_errors(), true));
    }

    $user = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

    // Validar contraseña y tipo de usuario
    if ($user && $inputPassword === trim($user['Contrasena'])) {
        // Iniciar sesión y guardar datos del usuario
        $_SESSION['ID_user'] = $user['IdUsuario'];
        $_SESSION['Nombre_user'] = trim($user['Descripcion']);
        $_SESSION['Id_programaedu'] = $user['IdPE'];
        $_SESSION['Tipo'] = trim($user['Tipo']); // Guardar el tipo de usuario para validaciones posteriores

        // Redirigir al dashboard del administrador
        header('Location: /pages/administrator/dashboard.php');
        exit();
    } else {
        // Usuario o contraseña incorrectos
        echo "Usuario o contraseña incorrectos, o no tiene permiso para acceder.";
    }

    sqlsrv_free_stmt($stmt);
} catch (Exception $e) {
    echo "Error en la autenticación: " . $e->getMessage();
} finally {
    sqlsrv_close($conn);
}
?>
