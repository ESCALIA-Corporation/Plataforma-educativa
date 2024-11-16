<?php
include __DIR__ . '/../connectiondb.php';

//TODO: ADD THE EMPTY CELLS
$Id_asesor = $_POST['Id-asesor'];
$nombre = $_POST['nombre-asesor'];
$Apellido_p = $_POST['apellido-p'];
$Apellido_m = $_POST['apellido-m'];
$Sexo = $_POST['genero'];
$telefono = $_POST['telefono'];
$email = $_POST['correo'];
$id_pe = $_POST['programa-educativo'];

$IdUsuario int ,
@Descripcion nchar(25),
@Tipo nchar (15),
@Usuario nchar (15),
@Contrasena nchar (15)

try {
    $sql = "SP_I_ASESOR ?, ?, ?, ?, ?, ?, ?, ?";

    // PARAMETER
    $params = array($Id_asesor, $nombre, $Apellido_p, $Apellido_m, $Sexo, $telefono, $email, $id_pe);

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
