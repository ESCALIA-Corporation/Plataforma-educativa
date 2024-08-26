<?php
include __DIR__ . '/../connectiondb.php';

try {
    $sql = "SELECT IdAsesoria, Matricula, Tema, Estatus FROM ASESORIA";
    $stmt = sqlsrv_query($conn, $sql);

    if ($stmt === false) {
        throw new Exception(print_r(sqlsrv_errors(), true));
    }

    // INIT HTML
    echo '<div class="user-container">';

    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        echo '<div class="asesory-card">';

        // BASIC DATA
        echo '<div class="basic-data">';
            echo '<p>ID:' . htmlspecialchars($row['IdAsesoria']) . '</p>';
            echo '<p> ' . htmlspecialchars($row['Matricula']) . '</p>';
        echo '</div>';

        // DETAILS
        echo '<div class="details-data">';
            echo '<div class="theme-data">';
                echo '<p>' . htmlspecialchars($row['Tema']) . '</p>';
            echo '</div>';
            echo '<div class="status-data">';
            echo '</div>';
            // CONTROLS
            echo '<div class="controls">';
                echo '<button class="status-asesory-span">' . htmlspecialchars($row['Estatus']) . '</button>';
                echo '<button class="asesory-control" style="background-color: yellow;">E</button>';
                echo '<button class="asesory-control" style="background-color: red;">D</button>';
            echo '</div>';
        echo '</div>';

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
