<?php
include __DIR__ . '/../connectiondb.php';

//TODO: ADD THE EMPTY CELLS
$Id_asesory = $_POST['folio'];
$Matricula = $_POST['matricula'];
$Topic = $_POST['tema'];
$Schedule = $_POST['horario'];
$Hours = $_POST['horas'];
$Register_date = date('Y-m-d');


try {
    $sql = "SP_I_ASESORIA ?, ?, ?, ?, ?, ?, ?, ?";

    // PARAMETER
    $params = array($Id_asesory, $Matricula, 'A', $Topic, $Schedule, $Hours ,$Register_date, 'P');

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
