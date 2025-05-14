<?php
include __DIR__ . '/../includes/db.php';

// Verificación de la conexión
if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Obtener el ID del producto que se quiere editar
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Ajustar la consulta SQL según la nueva estructura de la tabla
    $sql = "SELECT * FROM servicios WHERE id = ?"; // Asegúrate de que 'nueva_tabla_productos' sea el nombre correcto de la tabla
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($resultado) > 0) {
        $producto = mysqli_fetch_assoc($resultado);
    } else {
        echo "Producto no encontrado.";
        exit;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $duracion = $_POST['duracion'];

    // Actualización de la tabla, ajustando para la nueva estructura de la tabla
    $sql_update = "UPDATE servicios SET nombre = ?, descripcion = ?, precio = ?, duracion = ? WHERE id = ?";
    $stmt_update = mysqli_prepare($conn, $sql_update);
    mysqli_stmt_bind_param($stmt_update, "ssdii", $nombre, $descripcion, $precio, $duracion, $id);

    if (mysqli_stmt_execute($stmt_update)) {
        header("Location: ../panel.php?mensaje=Producto actualizado correctamente");
        exit();
    } else {
        echo "Error al actualizar el producto: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Producto</title>
    <link rel="stylesheet" href="../assets/css/estilos.css"> 
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;600&display=swap" rel="stylesheet">
</head>
<body>
<h2 class="titulo-formulario">✏️ Editar Producto</h2>

    <!-- Mostrar mensaje de éxito si lo hay -->
    <?php if (isset($_GET['mensaje'])): ?>
        <div class="mensaje-exito"><?php echo $_GET['mensaje']; ?></div>
    <?php endif; ?>

    <!-- Formulario de edición de producto -->
    <form action="editar.php?id=<?php echo $id; ?>" method="POST">
        <table id="tablaProductos" border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>Campo</th>
                    <th>Valor</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><label for="nombre">servicio:</label></td>
                    <td><input type="text" name="nombre" value="<?php echo htmlspecialchars($producto['nombre']); ?>" required></td>
                </tr>
                <tr>
                    <td><label for="descripcion">Descripción:</label></td>
                    <td><textarea name="descripcion" required><?php echo htmlspecialchars($producto['descripcion']); ?></textarea></td>
                </tr>
                <tr>
                    <td><label for="precio">Precio:</label></td>
                    <td><input type="number" name="precio" value="<?php echo htmlspecialchars($producto['precio']); ?>" required step="0.01"></td>
                </tr>
                <tr>
                    <td><label for="duracion">Duracion:</label></td>
                    <td>  <select id="duracion" name="duracion" required>
                        <option value="30">30 minutos</option>
                        <option value="60">1 hora</option>
                        <option value="90">1 hora y 30 minutos</option>
                        <option value="120">2 horas</option>
                        <option value="180">3 horas</option>
                    </select></td>
                </tr>
                <tr>
                <td colspan="2" style="text-align: center;">
    <button type="submit" class="boton-actualizar">Actualizar Producto</button>
</td>
                </tr>
            </tbody>
        </table>
    </form>
</body>
</html>
