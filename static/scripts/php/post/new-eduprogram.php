<?php
include __DIR__ . '/../connectiondb.php';

//TODO: ADD THE EMPTY CELLS
$Id_proedu = $_POST['id-edu-program'];
$Clav_proedu = $_POST['clave-edu-program'];
$Name = $_POST['name-resp'];
$Respo = $_POST['responsable-pe'];
$id_usuario = $_POST['idusuario'];

try {
    $sql = "EXEC SP_I_PE ?, ?, ?, ?, ?";

    // PARAMETER
    $params = array($Id_proedu, $Clav_proedu, $Name, $Respo, $id_usuario);

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
