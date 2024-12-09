<?php
include __DIR__ . '/../connectiondb.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['idPE'])) {
        $idPE = $_POST['idPE'];
        $accion = '1'; // Acción de eliminar

        // Preparar el procedimiento almacenado
        $sql = "{CALL SP_D_PE(?, NULL, NULL, NULL, NULL, ?)}"; // NULL para los valores que no son necesarios
        $params = array($idPE, &$accion); // El parámetro de salida debe pasarse por referencia

        // Ejecutar la consulta
        $stmt = sqlsrv_query($conn, $sql, $params);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true)); // Manejar errores
        }

        // Redirigir con un mensaje
        header('Location: /./pages/administrator/administration.php');
        exit;
    } else {
        echo "No se seleccionó ningún programa educativo.";
    }
}
?>
