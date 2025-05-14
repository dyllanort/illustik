<?php
session_start();
session_destroy();
echo "Sesion destruida";  // Esto te ayudará a saber si la sesión se destruyó correctamente
header("Location: ../homepage.php");
exit();
?>
