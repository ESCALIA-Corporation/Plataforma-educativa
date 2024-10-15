<?php
include __DIR__ . '/../connectiondb.php';

//TODO: ADD THE EMPTY CELLS
$Id_mate = $_POST['id-materia'];
$name_mate = $_POST['nombre-materia'];
$credits = $_POST['creditos'];
$semes = $_POST['semestre'];

try {
    $sql = "SP_I_ASIGNATURA ?, ?, ?, ?";

    // PARAMETER
    $params = array($Id_mate, $name_mate, $credits, $semes);

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
