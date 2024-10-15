<?php
include __DIR__ . '/../connectiondb.php';

try {
    $sql = "SELECT IdAsesor, Nombre, ApellidoPaterno, Email FROM ASESOR";
    $stmt = sqlsrv_query($conn, $sql);

    if ($stmt === false) {
        throw new Exception(print_r(sqlsrv_errors(), true));
    }
    // INIT HTML
    echo '<div class="asesors-table">';

    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        echo '<div class="asesor-card">';

        // BASIC DATA
        echo '<div class="data">';
        echo '<p>ID:' . htmlspecialchars($row['IdAsesor']) . '</p>';
        echo '<p> ' . htmlspecialchars($row['Nombre']) . '</p>';
        echo '<p> ' . htmlspecialchars($row['ApellidoPaterno']) . '</p>';
        echo '<p> ' . htmlspecialchars($row['Email']) . '</p>';
        echo '</div>';

        // DETAILS
        // CONTROLS
        echo '</div>';
    }
    echo '</div>';

    sqlsrv_free_stmt($stmt);
} catch (Exception $e) {
    echo "Error al realizar la consulta: " . $e->getMessage();
}

// Cerrar la conexión
sqlsrv_close($conn);
