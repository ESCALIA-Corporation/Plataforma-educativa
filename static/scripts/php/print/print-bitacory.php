<?php
include __DIR__ . '/../connectiondb.php';

try {
    $sql = "SELECT DISTINCT AlumnoFechaRegistro, Matricula, AlumnoNombre, AsignaturaNombre, Tema, ProgramaNombre, AsesorNombre FROM vw_Bitacora_asesoria";
    $stmt = sqlsrv_query($conn, $sql); // Usa DISTINCT para evitar duplicados

    if ($stmt === false) {
        throw new Exception(print_r(sqlsrv_errors(), true));
    }

    $pdf_content = "%PDF-1.4\n";
    $pdf_content .= "1 0 obj\n";
    $pdf_content .= "<< /Type /Catalog /Pages 2 0 R >>\n";
    $pdf_content .= "endobj\n";
    $pdf_content .= "2 0 obj\n";
    $pdf_content .= "<< /Type /Pages /Kids [3 0 R] /Count 1 >>\n";
    $pdf_content .= "endobj\n";
    $pdf_content .= "3 0 obj\n";
    $pdf_content .= "<< /Type /Page /Parent 2 0 R /MediaBox [0 0 842 595] /Contents 4 0 R /Resources << /Font << /F1 0 0 R >> >> >>\n";
    $pdf_content .= "endobj\n";
    $pdf_content .= "4 0 obj\n";
    $pdf_content .= "<< /Length 5 0 R >>\n";
    $pdf_content .= "stream\n";

    // Título
    $pdf_content .= "BT\n";
    $pdf_content .= "/F1 14 Tf\n"; // Tamaño reducido para el título
    $pdf_content .= "250 570 Td\n";
    $pdf_content .= "(Bitacora de Asesoria) Tj\n";
    $pdf_content .= "ET\n";

    // Encabezado de la tabla
    $pdf_content .= "BT\n";
    $pdf_content .= "/F1 10 Tf\n"; // Tamaño pequeño para el encabezado
    $pdf_content .= "50 540 Td\n";
    $pdf_content .= "(Fecha Registro   | Matricula   | Nombre Completo           | Asignatura      | Tema             | Programa       | Asesor) Tj\n";
    $pdf_content .= "ET\n";

    $y_position = 520; // Posición inicial para los datos

    $data = [];
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $data[] = $row;
    }

    foreach ($data as $row) {
        $fechaRegistro = $row['AlumnoFechaRegistro'];
        if ($fechaRegistro instanceof DateTime) {
            $fechaRegistro = $fechaRegistro->format('Y-m-d'); // Formato reducido
        }

        // Usar directamente el nombre completo del alumno
        $nombreCompleto = $row['AlumnoNombre'];

        // Formatear cada fila con columnas fijas
        $pdf_content .= "BT\n";
        $pdf_content .= "/F1 8 Tf\n"; // Tamaño pequeño para los datos
        $pdf_content .= "50 {$y_position} Td\n";
        $pdf_content .= sprintf(
            "(%-15s | %-10s | %-25s | %-15s | %-15s | %-15s | %-10s) Tj\n",
            $fechaRegistro,
            $row['Matricula'],
            $nombreCompleto,
            $row['AsignaturaNombre'],
            $row['Tema'],
            $row['ProgramaNombre'],
            $row['AsesorNombre']
        );
        $pdf_content .= "ET\n";

        $y_position -= 12; // Reducir espacio entre filas
        if ($y_position < 50) {
            break; // Si llega al límite de la página
        }
    }

    $pdf_content .= "endstream\n";
    $pdf_content .= "endobj\n";
    $pdf_content .= "5 0 obj\n";
    $pdf_content .= strlen($pdf_content) . "\n";
    $pdf_content .= "endobj\n";
    $pdf_content .= "xref\n";
    $pdf_content .= "0 6\n";
    $pdf_content .= "0000000000 65535 f \n";
    $pdf_content .= "0000000010 00000 n \n";
    $pdf_content .= "0000000070 00000 n \n";
    $pdf_content .= "0000000120 00000 n \n";
    $pdf_content .= "0000000220 00000 n \n";
    $pdf_content .= "0000000270 00000 n \n";
    $pdf_content .= "trailer\n";
    $pdf_content .= "<< /Size 6 /Root 1 0 R >>\n";
    $pdf_content .= "startxref\n";
    $pdf_content .= "300\n";
    $pdf_content .= "%%EOF";

    header('Content-Type: application/pdf');
    header('Content-Disposition: inline; filename="bitacora_asesoria.pdf"');
    header('Content-Length: ' . strlen($pdf_content));

    echo $pdf_content;
    $conn->close();
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
