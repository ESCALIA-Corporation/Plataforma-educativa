<?php
// Asegúrate de que la sesión esté iniciada
//include __DIR__ . '/../connectiondb.php';

try {
    if (isset($_SESSION['ID_user'])) {
        $idAsesor = '2  ';

        $sql = "
            SELECT 
                A.IdAsignatura, 
                S.Nombre AS NombreAsignatura, 
                A.IdAsesor, 
                A.TipoAsesoria, 
                A.FechaAsignacion, 
                A.Lugar, 
                A.HorasEstimadas, 
                A.Horario 
            FROM ASIGNACION A
            JOIN ASIGNATURA S ON A.IdAsignatura = S.IdAsignatura
            WHERE A.IdAsesor = ?
        ";
        $params = array($idAsesor);
        $stmt = sqlsrv_query($conn, $sql, $params);

        if ($stmt === false) {
            throw new Exception(print_r(sqlsrv_errors(), true));
        }

        echo '<div class="user-container">';
        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            echo '<div class="asesory-card">';

            // BASIC DATA
            echo '<div class="basic-data">';
                echo '<p>    ' . htmlspecialchars($row['NombreAsignatura']) . '</p>'; // Mostrar el nombre de la asignatura
            echo '</div>';

            // DETAILS
            echo '<div class="details-data">';
                echo '<div class="theme-data">';
                    echo '<p>Tipo: ' . htmlspecialchars($row['TipoAsesoria']) . '</p>';
                echo '</div>';
                echo '<div class="status-data">';
                    echo '<p>Fecha: ' . htmlspecialchars($row['FechaAsignacion']->format('Y-m-d')) . '</p>';
                echo '</div>';
                echo '<div class="status-data">';
                    echo '<p>Lugar: ' . htmlspecialchars($row['Lugar']) . '</p>';
                echo '</div>';
                echo '<div class="status-data">';
                    echo '<p>Horas: ' . htmlspecialchars($row['HorasEstimadas']) . '</p>';
                echo '</div>';
                echo '<div class="status-data">';
                    echo '<p>Horario: ' . htmlspecialchars($row['Horario']) . '</p>';
                echo '</div>';
                // CONTROLS
                //echo '<div class="controls">';
                //    echo '<button class="submit asesory-control new-assignment-button" data-id="' . htmlspecialchars($row['IdAsignatura']) . '">Bitacora</button>';
                //echo '</div>';
            echo '</div>';

            echo '</div>'; // Cierra asesory-card
        }
        echo '</div>'; // Cierra user-container

        sqlsrv_free_stmt($stmt);
    } else {
        echo "No se ha encontrado el ID del usuario en la sesión.";
    }
} catch (Exception $e) {
    echo "Error al realizar la consulta: " . $e->getMessage();
}

// Cerrar la conexión
sqlsrv_close($conn);
?>
