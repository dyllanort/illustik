<?php
$conn = mysqli_connect("localhost", "root", "", "illustik");//arreglar base de datos "conectar"

if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}
?>
