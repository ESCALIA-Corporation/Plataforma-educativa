<?php
include __DIR__ . '/../connectiondb.php'; // Conexión a la base de datos

session_start();

try {
    // Validar que haya un usuario autenticado
    if (empty($_SESSION['ID_user'])) {
        throw new Exception("No se encontró un usuario autenticado.");
    }

    $idUsuario = $_SESSION['ID_user'];
    $accion = '';

    $sql = "{CALL SP_D_USUARIO(?, NULL, ?, NULL, NULL, ?)}";
    $params = array(
        $idUsuario,          // @IdUsuario
        $_SESSION['Tipo'],   // @Tipo
        &$accion             // @Accion (referencia para OUTPUT)
    );

    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        throw new Exception("Error al ejecutar la consulta: " . print_r(sqlsrv_errors(), true));
    }

        session_destroy();
        header("Location: /index.php");
        exit;

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
} finally {
    // Cerrar la conexión
    sqlsrv_close($conn);
}
