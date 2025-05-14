<?php
include('../db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];

    // Usando una consulta preparada para evitar inyecciones SQL
    $query = "INSERT INTO productos (nombre, descripcion, precio) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ssd", $nombre, $descripcion, $precio); // "ssd" -> string, string, decimal

    if (mysqli_stmt_execute($stmt)) {
        header("Location: ../panel.php");
        exit();
    } else {
        echo "Error al guardar el producto: " . mysqli_error($conn);
    }
}
?>
