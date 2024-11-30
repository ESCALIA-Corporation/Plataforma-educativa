<?php
include __DIR__ . '/../connectiondb.php';
session_start();

// Recibir los datos del formulario
$Clav_proedu = $_POST['clave-edu-program'];
$Name = $_POST['name-resp'];
$Respo = $_POST['responsable-pe'];

if (isset($_SESSION['ID_user']) && isset($_SESSION['Nombre_user'])) {
    $userId = $_SESSION['ID_user'];
    try {
        // Obtener el último IdPE
        $lastIdSql = "SELECT MAX(IdPE) AS lastId FROM PROGRAMA_EDUCATIVO"; // Asegúrate de que la tabla sea correcta
        $lastIdStmt = sqlsrv_query($conn, $lastIdSql);

        if ($lastIdStmt === false) {
            throw new Exception(print_r(sqlsrv_errors(), true));
        }

        $lastIdRow = sqlsrv_fetch_array($lastIdStmt, SQLSRV_FETCH_ASSOC);
        $newId_proedu = is_null($lastIdRow['lastId']) ? 1 : $lastIdRow['lastId'] + 1; // Generar nuevo Id_proedu

        // Preparar la consulta para insertar el nuevo programa educativo
        $sql = "EXEC SP_I_PE ?, ?, ?, ?, ?";
        // PARAMETER
        $params = array($newId_proedu, $Clav_proedu, $Name, $Respo, $userId);

        // EXECUTE
        $stmt = sqlsrv_query($conn, $sql, $params);

        if ($stmt === false) {
            throw new Exception(print_r(sqlsrv_errors(), true));
        }

        header('Location: /./pages/administrator/administration.php');
    } catch (Exception $e) {
        echo "Error al insertar el registro: " . $e->getMessage();
    }

    sqlsrv_close($conn);
} else {
    header('Location: /./pages/administrator/administration.php');
}
?>
