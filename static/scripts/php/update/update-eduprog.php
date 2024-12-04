<?php
include __DIR__ . '/../connectiondb.php'; // Asegúrate de que la conexión a la base de datos esté incluida

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica que se reciban los datos necesarios
    if (isset($_POST['idPE'], $_POST['clavePE'], $_POST['nombre'], $_POST['responsable'], $_POST['idUsuario'])) {
        $idPE = $_POST['idPE'];
        $clavePE = $_POST['clavePE'];
        $nombre = $_POST['nombre'];
        $responsable = $_POST['responsable'];
        $idUsuario = $_POST['idUsuario']; // Asegúrate de que este campo esté en tu formulario

        // Prepara la llamada al procedimiento almacenado
        $sql = "{CALL SP_U_PE(?, ?, ?, ?, ?)}";
        $params = array($idPE, $clavePE, $nombre, $responsable, $idUsuario);

        // Ejecuta el procedimiento almacenado
        $stmt = sqlsrv_query($conn, $sql, $params);

        if ($stmt === false) {
            // Manejo de errores en caso de que la consulta falle
            die(print_r(sqlsrv_errors(), true));
        } else {
            // Redirige a una página de éxito o muestra un mensaje de éxito
            echo "Datos actualizados correctamente.";
            // Puedes redirigir a otra página si lo deseas
            // header("Location: success.php");
            // exit();
        }

        // Libera la declaración
        sqlsrv_free_stmt($stmt);
    } else {
        echo "Faltan datos para actualizar.";
    }
} else {
    echo "Método de solicitud no válido.";
}

// Cierra la conexión
sqlsrv_close($conn);
?>
