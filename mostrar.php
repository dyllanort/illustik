<?php
include __DIR__ . '/../db.php'; 

// Verificar si la conexión fue exitosa
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

$sql = "SELECT * FROM productos";
$resultado = mysqli_query($conexion, $sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Productos</title>
    <link rel="stylesheet" href="../assets/css/estilos.css"> <!-- Si tienes archivo de estilos -->
</head>
<body>
    <h2>Lista de Productos</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Fecha de Creación</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php if (mysqli_num_rows($resultado) > 0): ?>
            <?php while ($fila = mysqli_fetch_assoc($resultado)): ?>
                <tr>
                    <td><?php echo htmlspecialchars($fila['id']); ?></td>
                    <td><?php echo htmlspecialchars($fila['nombre']); ?></td>
                    <td><?php echo htmlspecialchars($fila['descripcion']); ?></td>
                    <td><?php echo htmlspecialchars($fila['precio']); ?></td>
                    <td><?php echo htmlspecialchars($fila['cantidad']); ?></td>
                    <td><?php echo htmlspecialchars($fila['fecha_creacion']); ?></td>
                    <td class="acciones">
                        <a href="editar.php?id=<?php echo $fila['id']; ?>">Editar</a> | 
                        <a href="eliminar.php?id=<?php echo $fila['id']; ?>" onclick="return confirm('¿Estás seguro de eliminar este producto?')">Eliminar</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="7">No hay productos registrados.</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</body>
</html>

