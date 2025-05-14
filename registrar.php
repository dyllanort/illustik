<?php
include('../includes/db.php'); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $duracion = $_POST['duracion'];
    $id_negocio = $_POST['id_negocio']; // ✅ nuevo campo
    $fecha_creacion = date('Y-m-d H:i:s');

    echo "<pre>";
    print_r($_POST);
    echo "</pre>";

    if (!empty($nombre) && !empty($descripcion) && !empty($precio) && !empty($duracion) && !empty($id_negocio)) {
        $sql = "INSERT INTO servicios (nombre, descripcion, precio, duracion, id_negocio) VALUES (?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_bind_param($stmt, "ssddi", $nombre, $descripcion, $precio, $duracion, $id_negocio);

        
        if (mysqli_stmt_execute($stmt)) {
            header("Location: ../panel.php?mensaje=Producto guardado exitosamente");
            exit();
        } else {
            echo "Error al guardar el producto: " . mysqli_error($conn);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "<p>Todos los campos son obligatorios.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Servicio</title>
    <link rel="stylesheet" href="../assets/css/estilos.css">
</head>
<body>
<div class="contenedor-panel">
<h2 class="titulo-formulario">Registrar Nuevo Producto</h2>
    <form action="registrar.php" method="POST">
        <table id="tablaProductos" border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>Servicio</th>   
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Duración</th>
                    <th>ID Negocio</th> <!-- ✅ nuevo campo -->
                </tr>
            </thead>
            <tr>
                <td><input type="text" id="nombre" name="nombre" required></td>
                <td><textarea id="descripcion" name="descripcion" required></textarea></td>
                <td><input type="number" id="precio" name="precio" step="0.01" required></td>
                <td>
                    <select id="duracion" name="duracion" required>
                        <option value="30">30 minutos</option>
                        <option value="60">1 hora</option>
                        <option value="90">1 hora y 30 minutos</option>
                        <option value="120">2 horas</option>
                        <option value="180">3 horas</option>
                    </select>
                </td>
                <td><input type="number" id="id_negocio" name="id_negocio" required></td> <!-- ✅ campo nuevo -->
            </tr>
        </table>
        
        <div class="botones">
            <button type="submit">Guardar</button>
            <a href="../panel.php" class="btn-cancelar">Cancelar</a>                     
        </div>
    </form>
</div>
</body>
</html>
