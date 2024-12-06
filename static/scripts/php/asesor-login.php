<?php
// TODO: CHANGE FOR A PROCEDURE QUERY
// TODO: AUTENTICACION PARA ASESORES
include __DIR__ . '/connectiondb.php';

session_start();

// Obtener y sanitizar los datos ingresados por el usuario
$inputUsername = trim($_POST['asesorusuario']);
$inputPassword = trim($_POST['asesorcontraseña']);

try {
    // Consulta para verificar el usuario
    $sql = "SELECT * FROM USUARIO WHERE Usuario = ? AND Tipo = ?";
    $params = array($inputUsername, 'Asesor'); // Filtrar por tipo "Asesor"
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        throw new Exception(print_r(sqlsrv_errors(), true));
    }

    $user = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

    if ($user && $inputPassword === trim($user['Contrasena'])) {
        // Guardar datos del usuario en la sesión
        $_SESSION['ID_user'] = $user['IdUsuario'];
        $_SESSION['Nombre_user'] = trim($user['Descripcion']);
        $_SESSION['Id_programaedu'] = $user['IdPE'];
        $_SESSION['Tipo'] = trim($user['Tipo']); 

        // Ahora, obtener el IdAsesor de la tabla ASESOR
        $sqlAsesor = "SELECT IdAsesor FROM ASESOR WHERE IdUsuario = ?";
        $paramsAsesor = array($user['IdUsuario']);
        $stmtAsesor = sqlsrv_query($conn, $sqlAsesor, $paramsAsesor);

        if ($stmtAsesor === false) {
            throw new Exception(print_r(sqlsrv_errors(), true));
        }

        $asesor = sqlsrv_fetch_array($stmtAsesor, SQLSRV_FETCH_ASSOC);
        if ($asesor) {
            $_SESSION['IdAsesor'] = $asesor['IdAsesor']; // Guardar el IdAsesor en la sesión
        } else {
            echo "No se encontró el asesor asociado a este usuario.";
        }

        sqlsrv_free_stmt($stmtAsesor);

        // Redirigir al dashboard del asesor
        header('Location: /pages/assesor/dashboard.php');
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
