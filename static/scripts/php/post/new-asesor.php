<?php
include __DIR__ . '/../connectiondb.php';

// Recibir los datos del formulario
$nombre = $_POST['nombre-asesor'];
$Apellido_p = $_POST['apellido-p'];
$Apellido_m = $_POST['apellido-m'];
$Sexo = $_POST['genero'];
$telefono = $_POST['telefono'];
$email = $_POST['correo'];
$id_pe = $_POST['programa-educativo'];

$Descripcion = $_POST['descripcion'];
$Tipo = 'Asesor';
$Usuario = $_POST['Usuario'];
$Contrasena = $_POST['Contraseña'];

try {
    // Obtener el último IdUsuario
    $lastIdSql = "SELECT MAX(IdUsuario) AS lastId FROM Usuario";
    $lastIdStmt = sqlsrv_query($conn, $lastIdSql);

    if ($lastIdStmt === false) {
        throw new Exception(print_r(sqlsrv_errors(), true));
    }

    $lastIdRow = sqlsrv_fetch_array($lastIdStmt, SQLSRV_FETCH_ASSOC);
    $newIdUsuario = is_null($lastIdRow['lastId']) ? 1 : $lastIdRow['lastId'] + 1; // Generar nuevo IdUsuario

    // Obtener el último Id_asesor
    $lastAsesorIdSql = "SELECT MAX(IdAsesor) AS lastId FROM Asesor"; // Asegúrate de que la tabla sea correcta
    $lastAsesorIdStmt = sqlsrv_query($conn, $lastAsesorIdSql);

    if ($lastAsesorIdStmt === false) {
        throw new Exception(print_r(sqlsrv_errors(), true));
    }

    $lastAsesorIdRow = sqlsrv_fetch_array($lastAsesorIdStmt, SQLSRV_FETCH_ASSOC);
    $newIdAsesor = is_null($lastAsesorIdRow['lastId']) ? 1 : $lastAsesorIdRow['lastId'] + 1; // Generar nuevo Id_asesor

    // Preparar la consulta para insertar el nuevo usuario
    $sql = "SP_I_USER ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?";
    $params = array(
        $newIdAsesor,        // @IdAsesor
        $nombre,             // @Nombre
        $Apellido_p,        // @ApellidoPaterno
        $Apellido_m,        // @ApellidoMaterno
        $Sexo,               // @Sexo
        $telefono,           // @Telefono
        $email,              // @Email
        $newIdUsuario,       // @IdUsuario
        $id_pe,              // @IdPE
        $Descripcion,        // @Descripcion
        $Tipo,               // @Tipo
        $Usuario,            // @Usuario
        $Contrasena          // @Contrasena
    );

    // Ejecutar la consulta
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        throw new Exception(print_r(sqlsrv_errors(), true));
    }

    // Redirigir a la página de acceso
    header('Location: /./pages/administrator/access.php');
} catch (Exception $e) {
    echo "Error al insertar el registro: " . $e->getMessage();
}

// Cerrar la conexión
sqlsrv_close($conn);
?>
