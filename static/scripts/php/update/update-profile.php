<?php
include __DIR__ . '/../connectiondb.php';
session_start();

if (isset($_SESSION['ID_user']) && isset($_SESSION['Nombre_user'])) {
    $userId = $_SESSION['ID_user'];
    $userName = $_SESSION['Nombre_user'];

    try {
        $sql = "SP_U_USUARIO ?, ?, ?, ? WHERE ";
        $stmt = sqlsrv_query($conn, $sql);

        if ($stmt === false) {
            throw new Exception(print_r(sqlsrv_errors(), true));
        }
        sqlsrv_free_stmt($stmt);
    } catch (Exception $e) {
        echo "Error al realizar la consulta: " . $e->getMessage();
    }

    // Cerrar la conexión
    sqlsrv_close($conn);
} else {
    echo "<p>Necesitas autenticarte para ver esto...</p>";
}
