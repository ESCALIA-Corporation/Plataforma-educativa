<?php
include __DIR__ . '/../connectiondb.php';
/*
session_start();

if (isset($_SESSION['ID_user']) && isset($_SESSION['Nombre_user'])) {
    $userId = $_SESSION['ID_user'];
    $userName = $_SESSION['Nombre_user'];
    $Id_programedu = $_SESSION['Id_programaedu'];

    */
    try {
        $sql = "SELECT IdAsesor, Nombre, ApellidoPaterno, Email FROM ASESOR "; /* WHERE IdPE = $Id_programaedu */
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
    /*
} else {
    echo "<p>Necesitas autenticarte para ver esto...</p>";
}
*/