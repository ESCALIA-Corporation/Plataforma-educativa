<?php
include __DIR__ . '/../connectiondb.php';

//TODO: ADD THE EMPTY CELLS
$matricula = $_POST['matricula'];
$nombre = $_POST['nombre-estudiante'];
$Apellido_p = $_POST['apellido-p'];
$Apellido_m = $_POST['apellido-m'];
$Sexo = $_POST['genero'];
$semestre = $_POST['semestre'];
$grupo = $_POST['grupo'];
$fecha = '2003-03-04';
$id_pe = $_POST['programa-educativo'];
$idusuario = $_POST['id-usuario'];

try {
    $sql = "SP_I_ALUMNO ?, ?, ?, ?, ?, ?, ?, ?, ?, ?";

    // PARAMETER
    $params = array($matricula, $nombre, $Apellido_p, $Apellido_m, $Sexo, $semestre, $grupo, $fecha, $id_pe, $idusuario);

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
