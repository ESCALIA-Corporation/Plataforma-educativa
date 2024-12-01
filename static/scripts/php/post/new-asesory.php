<?php
include __DIR__ . '/../connectiondb.php';

// Recibir los datos del formulario
$Matricula = $_POST['matricula'];
$IdAsignatura = $_POST['asignatura'];
$Topic = $_POST['tema'];
$Schedule = $_POST['horario'];
$Hours = $_POST['horas'];
$Register_date = date('Y-m-d');

try {
    // Obtener el último IdAsesoria
    $lastIdSql = "SELECT MAX(IdAsesoria) AS lastId FROM ASESORIA"; // Asegúrate de que la tabla sea correcta
    $lastIdStmt = sqlsrv_query($conn, $lastIdSql);

    if ($lastIdStmt === false) {
        throw new Exception(print_r(sqlsrv_errors(), true));
    }

    $lastIdRow = sqlsrv_fetch_array($lastIdStmt, SQLSRV_FETCH_ASSOC);
    $newIdAsesoria = is_null($lastIdRow['lastId']) ? 1 : $lastIdRow['lastId'] + 1; // Generar nuevo IdAsesoria

    // Preparar la consulta para insertar la nueva asesoría
    $sql = "SP_I_ASESORIA ?, ?, ?, ?, ?, ?, ?, ?";
    // PARAMETER
    $params = array($newIdAsesoria, $Matricula, 'A', $Topic, $Schedule, $Hours, $Register_date, 'P');

    // EXECUTE
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        throw new Exception(print_r(sqlsrv_errors(), true));
    }

    header('Location: /./pages/administrator/dashboard.php');
} catch (Exception $e) {
    echo "Error al insertar el registro: " . $e->getMessage();
}

sqlsrv_close($conn);
?>
