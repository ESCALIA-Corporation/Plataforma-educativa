<?php
include __DIR__ . '/../connectiondb.php';

// Obtener datos del formulario
$Matricula = $_POST['nuevaMatricula']; // Cambiado para coincidir con el formulario actualizado
$IdAsignatura = $_POST['nuevaAsignatura']; // Cambiado para coincidir con el formulario actualizado
$Topic = $_POST['tema'];
$Schedule = $_POST['horario'];
$Hours = $_POST['horas'];
$Register_date = date('Y-m-d');

try {
    // Obtener el último ID de la tabla ASESORIA
    $lastIdSql = "SELECT MAX(IdAsesoria) AS lastId FROM ASESORIA";
    $lastIdStmt = sqlsrv_query($conn, $lastIdSql);

    if ($lastIdStmt === false) {
        throw new Exception(print_r(sqlsrv_errors(), true));
    }

    $lastIdRow = sqlsrv_fetch_array($lastIdStmt, SQLSRV_FETCH_ASSOC);
    $newIdAsesoria = is_null($lastIdRow['lastId']) ? 1 : $lastIdRow['lastId'] + 1; // Generar nuevo IdAsesoria

    // Preparar y ejecutar el procedimiento almacenado
    $sql = "EXEC SP_I_ASESORIA ?, ?, ?, ?, ?, ?, ?, ?";
    $params = array($newIdAsesoria, $Matricula, $IdAsignatura, $Topic, $Schedule, $Hours, $Register_date, 'P'); // Nota el cambio en el orden

    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        throw new Exception(print_r(sqlsrv_errors(), true));
    }

    // Redireccionar al dashboard en caso de éxito
    header('Location: /./pages/administrator/dashboard.php');
    exit;
} catch (Exception $e) {
    // Manejo de errores
    echo "Error al insertar el registro: " . $e->getMessage();
}

// Cerrar la conexión
sqlsrv_close($conn);
?>
