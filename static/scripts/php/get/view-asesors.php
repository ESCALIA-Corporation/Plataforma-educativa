<?php
include __DIR__ . '/../connectiondb.php';
    try {
        $sql = "SELECT IdAsesor, Nombre, ApellidoPaterno, Email FROM ASESOR "; /* WHERE IdPE = $Id_programaedu */
        $stmt = sqlsrv_query($conn, $sql);

        if ($stmt === false) {
            throw new Exception(print_r(sqlsrv_errors(), true));
        }
        // INIT HTML
        echo '<div class="students-table">';

        echo '<div class="data">';
        echo '<p>ID Asesor</p>';
        echo '<p>Nombre</p>';
        echo '<p>A. Paterno</p>';
        //echo '<p>Apellido Materno</p>';
        echo '<p>Correo</p>';

        echo '</div>';

        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            echo '<div class="asesor-card">';

            // BASIC DATA
            echo '<div class="data">';
            echo '<p>' . htmlspecialchars($row['IdAsesor']) . '</p>';
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
    /*
} else {
    echo "<p>Necesitas autenticarte para ver esto...</p>";
}
*/