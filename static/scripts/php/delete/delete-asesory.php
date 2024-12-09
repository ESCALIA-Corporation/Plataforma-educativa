<?php
include __DIR__ . '/../connectiondb.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['asesoria'])) {
        $asesoriaData = explode('-', $_POST['asesoria']);

        $idAsesoria = $asesoriaData[0];
        $matricula = $asesoriaData[1];
        $idAsignatura = $asesoriaData[2];

        $sql = "{CALL SP_D_ASESORIA(?, ?, ?, NULL, NULL, NULL, NULL, NULL, ?)}"; // NULL en los valores que no son necesarios para eliminar
        $accion = '1'; // Acción de eliminar
        $params = array($idAsesoria, $matricula, $idAsignatura, $accion);

        $stmt = sqlsrv_query($conn, $sql, $params);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true)); // En caso de error
        }

        header('Location: /./pages/administrator/dashboard.php');
        exit;
    } else {
        echo "No se seleccionó ninguna asesoría.";
    }
}
