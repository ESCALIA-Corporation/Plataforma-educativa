<?php
include __DIR__ . '/../connectiondb.php';

// Verificar si se han enviado los datos del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $idAsignatura = $_POST['idAsignatura'] ?? null;
    $nombre = $_POST['n-nombre'] ?? null;
    $creditos = $_POST['n-creditos'] ?? null;
    $semestre = $_POST['n-semestre'] ?? null;

    if ($idAsignatura && $nombre && $creditos !== null && $semestre !== null) {
        // Preparar la consulta para actualizar la asignatura
        $sql = "EXEC SP_U_ASIGNATURA @IdAsignatura = ?, @Nombre = ?, @Creditos = ?, @Semestre = ?";
        $params = array($idAsignatura, $nombre, $creditos, $semestre);
        $stmt = sqlsrv_prepare($conn, $sql, $params);

        if (sqlsrv_execute($stmt)) {
            header('Location: /pages/administrator/administration.php');

        } else {
            // Manejar el error de ejecución
            die(print_r(sqlsrv_errors(), true));
        }
    } else {
        echo "Por favor, completa todos los campos requeridos.";
    }
} else {
    echo "Método de solicitud no válido.";
}

// Cerrar la conexión
sqlsrv_close($conn);
?>
