<?php
include __DIR__ . '/../connectiondb.php';

// Recibir los datos del formulario
$name_mate = $_POST['nombre-materia'];
$credits = $_POST['creditos'];
$semes = $_POST['semestre'];

try {
    // Obtener el último IdAsignatura
    $lastIdSql = "SELECT MAX(IdAsignatura) AS lastId FROM ASIGNATURA"; // Asegúrate de que la tabla sea correcta
    $lastIdStmt = sqlsrv_query($conn, $lastIdSql);

    if ($lastIdStmt === false) {
        throw new Exception(print_r(sqlsrv_errors(), true));
    }

    $lastIdRow = sqlsrv_fetch_array($lastIdStmt, SQLSRV_FETCH_ASSOC);
    $newIdAsignatura = is_null($lastIdRow['lastId']) ? 'A0001' : incrementId($lastIdRow['lastId']); // Generar nuevo IdAsignatura

    // Preparar la consulta para insertar la nueva asignatura
    $sql = "SP_I_ASIGNATURA ?, ?, ?, ?";
    // PARAMETER
    $params = array($newIdAsignatura, $name_mate, $credits, $semes);

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

// Función para incrementar el IdAsignatura
function incrementId($lastId) {
    // Suponiendo que el IdAsignatura tiene un formato como 'A0001', 'A0002', etc.
    $prefix = substr($lastId, 0, 1); // Obtener el prefijo (por ejemplo, 'A')
    $number = intval(substr($lastId, 1)); // Obtener el número y convertirlo a entero
    $newNumber = str_pad($number + 1, 4, '0', STR_PAD_LEFT); // Incrementar y rellenar con ceros
    return $prefix . $newNumber; // Retornar el nuevo IdAsignatura
}
?>
