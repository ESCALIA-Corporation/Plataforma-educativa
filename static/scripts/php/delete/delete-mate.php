<?php
include __DIR__ . '/../connectiondb.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['idAsignatura'])) {
        $idAsignatura = $_POST['idAsignatura'];
        $accion = '1'; // Acción de eliminar

        // Preparar el procedimiento almacenado
        $sql = "{CALL SP_D_ASIGNATURA(?, NULL, NULL, NULL, ?)}"; // NULL para los valores no necesarios
        $params = array($idAsignatura, &$accion); // Pasar el parámetro de salida por referencia

        // Ejecutar la consulta
        $stmt = sqlsrv_query($conn, $sql, $params);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true)); // Manejar errores
        }

        // Redirigir con el mensaje de acción
        header('Location: /./pages/administrator/administration.php');
        exit;
    } else {
        echo "No se seleccionó ninguna asignatura para eliminar.";
    }
}
?>
