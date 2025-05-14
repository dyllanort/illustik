<?php
include __DIR__ . '/../db.php'; 

// Verificación de conexión
if (!$conn) { // Usando $conn para la conexión
    die("Error de conexión: " . mysqli_connect_error());
}

$sql = "SELECT * FROM productos";
$resultado = mysqli_query($conn, $sql); 


if (mysqli_num_rows($resultado) > 0) {
    echo "<table>";
    echo "<thead><tr><th>ID</th><th>Descripción</th><th>Precio</th><th>Cantidad</th><th>Fecha de Creación</th><th>Acciones</th></tr></thead>";
    echo "<tbody>";

    while ($fila = mysqli_fetch_assoc($resultado)) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($fila['id']) . "</td>";
        echo "<td>" . htmlspecialchars($fila['descripcion']) . "</td>"; 
        echo "<td>" . htmlspecialchars($fila['precio']) . "</td>";
        echo "<td>" . htmlspecialchars($fila['cantidad']) . "</td>";
        echo "<td>" . htmlspecialchars($fila['fecha_creacion']) . "</td>";
        echo "<td>
                <a href='editar.php?id=" . htmlspecialchars($fila['id']) . "'>Editar</a> |
                <a href='eliminar.php?id=" . htmlspecialchars($fila['id']) . "' onclick='return confirm(\"¿Estás seguro de eliminar este registro?\")'>Eliminar</a>
              </td>";
        echo "</tr>";
    }

    echo "</tbody></table>";
} else {
    echo "<p>No hay productos registrados.</p>";
}
?>
