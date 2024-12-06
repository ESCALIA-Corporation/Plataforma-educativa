<?php
// Inicia la sesión para poder cerrarla
session_start();

// Elimina todas las variables de sesión
session_unset();

// Destruye la sesión completamente
session_destroy();

// Limpia cualquier salida previa
if (ob_get_length()) {
    ob_end_clean();
}

// Redirige al archivo index.php
header("Location: /index.php");
exit; // As