<?php
include __DIR__ . '/../connectiondb.php';
session_start();

// Verifica si se ha recibido el IdPE desde la URL
if (isset($_GET['idPE'])) {
    $idPE = $_GET['idPE'];

    $sql = "SELECT IdPE, ClavePE, Nombre, Responsable FROM PROGRAMA_EDUCATIVO WHERE IdPE = ?";
    $params = array($idPE);
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true)); // Manejo de errores si la consulta falla
    }

    // Si el IdPE existe en la base de datos, obtenemos los valores
    $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
    if ($row) {
        $clavePE = $row['ClavePE'];
        $nombre = $row['Nombre'];
        $responsable = $row['Responsable'];
    } else {
        echo "No se encontró el programa educativo con el IdPE proporcionado.";
        exit();
    }

    sqlsrv_free_stmt($stmt);
} else {
    echo "Faltan parámetros para cargar los datos.";
    exit();
}

sqlsrv_close($conn);