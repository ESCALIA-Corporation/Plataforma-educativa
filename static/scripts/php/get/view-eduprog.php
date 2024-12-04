<?php
include __DIR__ . '/../connectiondb.php';

try {
    $sql = "select * from vw_Programa_Educativo";
    $stmt = sqlsrv_query($conn, $sql);

    if ($stmt === false) {
        throw new Exception(print_r(sqlsrv_errors(), true));
    }
    // INIT HTML
    echo '<div class="eduprogram-table">';

    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        echo '<div class="eduprogram-card">';

        // BASIC DATA
        echo '<div class="data">';
        echo '<p> ' . htmlspecialchars($row['ClavePE']) . '</p>';
        echo '<p> ' . htmlspecialchars($row['Nombre']) . '</p>';
        echo '<p> ' . htmlspecialchars($row['Responsable']) . '</p>';
        echo '<button class="submit open-edit-eduprog" data-id="' . htmlspecialchars($row['IdPE']) . '">Editar</button>';
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
?>
