<?php
include __DIR__ . '/../connectiondb.php';

// Recibir los datos del formulario
$IdAsignatura = $_POST['idAsignatura'];
$IdAsesor = $_POST['idAsesor'];
$TipoAsesoria = $_POST['tipoAsesoria'];
$FechaAsignacion = $_POST['fechaAsignacion'];
$Lugar = $_POST['lugar'];
$HorasEstimadas = $_POST['horasEstimadas'];
$Horario = $_POST['horario'];

try {
    // Preparar la consulta para insertar la nueva asignación
    $sql = "EXEC SP_I_ASIGNACION ?, ?, ?, ?, ?, ?, ?";
    
    // PARAMETROS
    $params = array($IdAsignatura, $IdAsesor, $TipoAsesoria, $FechaAsignacion, $Lugar, $HorasEstimadas, $Horario);

    // EXECUTAR
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        throw new Exception(print_r(sqlsrv_errors(), true));
    }

    // Redirigir a la página de dashboard después de la inserción
    header('Location: /./pages/administrator/dashboard.php');
    exit; // Asegúrate de salir después de redirigir
} catch (Exception $e) {
    echo "Error al insertar el registro: " . $e->getMessage();
}

// Cerrar la conexión
sqlsrv_close($conn);
?>
