<?php
include __DIR__ . '/../connectiondb.php';

try {
    $sql = "SELECT * FROM vw_Alumno";
    $stmt = sqlsrv_query($conn, $sql);

    if ($stmt === false) {
        throw new Exception(print_r(sqlsrv_errors(), true));
    }

    // INIT HTML
    echo '<select class="">';

    // Agregar una opción por defecto
    echo '<option value="">Seleccione un Alumno</option>';

    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        // Usar el ID como valor de la opción
        echo '<option value="' . htmlspecialchars($row['Matricula']) . '">';
        echo htmlspecialchars($row['Nombre']);
        echo '</option>';
    }
    echo '</select>';

    sqlsrv_free_stmt($stmt);
} catch (Exception $e) {
    echo "Error al realizar la consulta: " . $e->getMessage();
}

// Cerrar la conexión
sqlsrv_close($conn);
?>
