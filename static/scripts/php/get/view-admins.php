<?php
include __DIR__ . '/../connectiondb.php';
    try {
        $sql = "SELECT IdUsuario, Descripcion, Usuario FROM USUARIO "; /* WHERE IdPE = $Id_programaedu */
        $stmt = sqlsrv_query($conn, $sql);

        if ($stmt === false) {
            throw new Exception(print_r(sqlsrv_errors(), true));
        }
        // INIT HTML
        echo '<div class="students-table">';

        echo '<div class="data">';
        echo '<p>ID</p>';
        echo '<p>Descripcion</p>';
        //echo '<p>Apellido Materno</p>';
        echo '<p>Usuario</p>';

        echo '</div>';

        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            echo '<div class="asesor-card">';

            // BASIC DATA
            echo '<div class="data">';
            echo '<p> ' . htmlspecialchars($row['IdUsuario']) . '</p>';
            echo '<p> ' . htmlspecialchars($row['Descripcion']) . '</p>';
            echo '<p> ' . htmlspecialchars($row['Usuario']) . '</p>';
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