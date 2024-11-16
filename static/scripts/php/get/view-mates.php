<?php
include __DIR__ . '/../connectiondb.php';

try {
    $sql = "SELECT IdAsignatura, Nombre, Creditos, Semestre FROM ASIGNATURA";
    $stmt = sqlsrv_query($conn, $sql);

    if ($stmt === false) {
        throw new Exception(print_r(sqlsrv_errors(), true));
    }
    // INIT HTML
    echo '<div class="mate-table">';

    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        echo '<div class="mate-card">';

        // BASIC DATA
        echo '<div class="data">';
        echo '<p>ID:' . htmlspecialchars($row['IdAsignatura']) . '</p>';
        echo '<p> ' . htmlspecialchars($row['Nombre']) . '</p>';
        echo '<p> ' . htmlspecialchars($row['Creditos']) . '</p>';
        echo '<p> ' . htmlspecialchars($row['Semestre']) . '</p>';
        echo '<button class="submit">Editar datos</button>';
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
