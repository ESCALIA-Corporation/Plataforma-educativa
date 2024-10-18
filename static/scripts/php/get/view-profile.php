<?php
include __DIR__ . '/../connectiondb.php';
session_start();

if (isset($_SESSION['ID_user']) && isset($_SESSION['Nombre_user'])) {
    $userId = $_SESSION['ID_user'];
    $userName = $_SESSION['Nombre_user'];
    $Id_programaedu = $_SESSION['Id_programaedu'];

    try {
        $sql = "SELECT * FROM USUARIO WHERE IdUsuario = $userId";
        $stmt = sqlsrv_query($conn, $sql);

        if ($stmt === false) {
            throw new Exception(print_r(sqlsrv_errors(), true));
        }
        // INIT HTML
        echo '<div class="profile-container">';

        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            echo '<div class="profile-name-data">';
                echo '<h2>' . htmlspecialchars($row['Descripcion']) . '</h2>';
            echo '</div>';

            echo '<div class="profile-full-data">';

            echo '<p>ID:' . htmlspecialchars($row['IdUsuario']) . '</p>';
            echo '<p>Tipo de Usuario: ' . htmlspecialchars($row['Tipo']) . '</p>';
            echo '<p>Usuario: ' . htmlspecialchars($row['Usuario']) . '</p>';
            echo '<p>Contraseña: ' . htmlspecialchars($row['Contrasena']) . '</p>';
            echo '</div>';

            // DETAILS
            // CONTROLS
            
        }
        echo '</div>';

        sqlsrv_free_stmt($stmt);
    } catch (Exception $e) {
        echo "Error al realizar la consulta: " . $e->getMessage();
    }

    // Cerrar la conexión
    sqlsrv_close($conn);
} else {
    echo "<p>Necesitas autenticarte para ver esto...</p>";
}
