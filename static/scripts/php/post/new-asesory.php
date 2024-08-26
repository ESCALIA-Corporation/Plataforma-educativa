<?php
include __DIR__ . '/../connectiondb.php';

//TODO: ADD THE EMPTY CELLS
$Id_asesory = $_POST['folio'];
$Topic = $_POST['tema'];
$Schedule = $_POST['horario'];
$Register_date = date("Y-m-d");
$Status = $_POST['estatus'];

try {
    $sql = "EXEC SP_Insertar_Asesoria ?, ?, ?, ?, ?, ?, ?";

    // PARAMETER
    $params = array($Id_asesory, 22011589, 'A', $Topic, $Schedule, $Register_date, $Status);

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
