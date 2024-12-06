<?php

try {
    // Verifica si el ID del usuario está en la sesión
    if (isset($_SESSION['IdAsesor'])) {
        $idAsesor = (int)$_SESSION['IdAsesor']; // Asegúrate de que sea un entero

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

        // Manejo de errores en la consulta
        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true)); // Muestra errores de SQL Server
        }

        // Mostrar los resultados
        echo '<div class="user-container">';
        $found = false; // Variable para verificar si se encontraron registros
        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            $found = true; // Se encontró al menos un registro
            echo '<div class="asesory-card">';

            // BASIC DATA
            echo '<div class="basic-data">';
                echo '<p>' . htmlspecialchars($row['NombreAsignatura']) . '</p>'; // Mostrar el nombre de la asignatura
            echo '</div>';

            // DETAILS
            echo '<div class="details-data">';
                echo '<div class="theme-data">';
                    echo '<p>Tipo: ' . htmlspecialchars($row['TipoAsesoria']) . '</p>';
                echo '</div>';
                echo '<div class="status-data">';
                    // Manejo de la fecha
                    $fechaAsignacion = $row['FechaAsignacion'];
                    if ($fechaAsignacion) {
                        echo '<p>Fecha: ' . htmlspecialchars($fechaAsignacion->format('Y-m-d')) . '</p>';
                    } else {
                        echo '<p>Fecha: No disponible</p>'; // Manejo de caso nulo
                    }
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
            echo '</div>'; // Cierra details-data

            echo '</div>'; // Cierra asesory-card
        }

        if (!$found) {
            echo '<p>No se encontraron asesorías asignadas.</p>'; // Mensaje si no hay registros
        }

        echo '</div>'; // Cierra user-container

        // Liberar el statement
        sqlsrv_free_stmt($stmt);
    } else {
        echo "No se ha encontrado el ID del usuario en la sesión.";
    }
} catch (Exception $e) {
    echo "Error al realizar la consulta: " . $e->getMessage();
}


sqlsrv_close($conn);

