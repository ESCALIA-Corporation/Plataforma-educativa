<?php
// Incluir el archivo de conexión a la base de datos
include __DIR__ . '/../connectiondb.php';

try {
    // Consultar la vista
    $sql = "SELECT * FROM vw_Bitacora_asesoria";
    $stmt = sqlsrv_query($conn, $sql);

    if ($stmt === false) {
        throw new Exception(print_r(sqlsrv_errors(), true));
    }

    // Crear el contenido del PDF
    $pdf_content = "%PDF-1.4\n";
    $pdf_content .= "1 0 obj\n";
    $pdf_content .= "<< /Type /Catalog /Pages 2 0 R >>\n";
    $pdf_content .= "endobj\n";
    $pdf_content .= "2 0 obj\n";
    $pdf_content .= "<< /Type /Pages /Kids [3 0 R] /Count 1 >>\n";
    $pdf_content .= "endobj\n";
    $pdf_content .= "3 0 obj\n";
    $pdf_content .= "<< /Type /Page /Parent 2 0 R /MediaBox [0 0 595 842] /Contents 4 0 R /Resources << /Font << /F1 0 0 R >> >> >>\n";
    $pdf_content .= "endobj\n";
    $pdf_content .= "4 0 obj\n";
    $pdf_content .= "<< /Length 5 0 R >>\n";
    $pdf_content .= "stream\n";

    // Agregar contenido al PDF
    $pdf_content .= "BT\n";
    $pdf_content .= "/F1 24 Tf\n"; // Tamaño de fuente
    $pdf_content .= "100 700 Td\n"; // Posición
    $pdf_content .= "(Bitácora de Asesoría) Tj\n"; // Texto
    $pdf_content .= "ET\n";

    // Tabla de datos
    $pdf_content .= "BT\n";
    $pdf_content .= "/F1 12 Tf\n"; // Tamaño de fuente
    $pdf_content .= "100 650 Td\n"; // Posición
    $pdf_content .= "(Id Asesoria | Fecha Registro | Matricula | Nombre | Apellido Paterno | Apellido Materno | Asignatura | Tema | Programa | Asesor) Tj\n"; // Encabezado
    $pdf_content .= "ET\n";

    // Iterar sobre los resultados
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $pdf_content .= "BT\n";
        $pdf_content .= "/F1 12 Tf\n"; // Tamaño de fuente
        $pdf_content .= "100 630 Td\n"; // Posición
        $pdf_content .= "({$row['IdAsesoria']} | {$row['AlumnoFechaRegistro']} | {$row['Matricula']} | {$row['AlumnoNombre']} | {$row['AlumnoApellidoPaterno']} | {$row['AlumnoApellidoMaterno']} | {$row['AsignaturaNombre']} | {$row['Tema']} | {$row['ProgramaNombre']} | {$row['AsesorNombre']}) Tj\n"; // Datos
        $pdf_content .= "ET\n";
    }

    // Si no hay datos
    if (sqlsrv_num_rows($stmt) === 0) {
        $pdf_content .= "BT\n";
        $pdf_content .= "/F1 12 Tf\n"; // Tamaño de fuente
        $pdf_content .= "100 630 Td\n"; // Posición
        $pdf_content .= "(No hay datos disponibles) Tj\n"; // Mensaje
        $pdf_content .= "ET\n";
    }

    $pdf_content .= "endstream\n";
    $pdf_content .= "endobj\n";
    $pdf_content .= "5 0 obj\n";
    $pdf_content .= "44\n"; // Longitud del contenido
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
    $pdf_content .= "300\n"; // Posición del inicio del xref
    $pdf_content .= "%%EOF";

    // Enviar el encabezado para el PDF
    header('Content-Type: application/pdf');
    header('Content-Disposition: inline; filename="bitacora_asesoria.pdf"');
    header('Content-Length: ' . strlen($pdf_content));

    // Imprimir el contenido del PDF
    echo $pdf_content;
    

        // Cerrar la conexión
        $conn->close();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ?>
