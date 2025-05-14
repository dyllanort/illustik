<?php
include __DIR__ . '/../includes/db.php';

// Verificación de conexión
if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Usando una consulta preparada para evitar inyecciones SQL
    $sql = "DELETE FROM servicios WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: ../panel.php?mensaje=Producto eliminado correctamente");
        exit();
    } else {
        echo "Error al eliminar el producto: " . mysqli_error($conn);
    }
}
?>
