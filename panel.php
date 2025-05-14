<?php
session_start();
include __DIR__ . '/includes/db.php';

// Verificar que el usuario esté logueado
if (!isset($_SESSION['correo'])) {
    header("Location: login/index.php");
    exit();
}

// Consulta para obtener los servicios disponibles
$sql = "SELECT id, nombre, descripcion, precio, duracion FROM servicios";
$resultado = mysqli_query($conn, $sql);
if (!$resultado) {
    die("Error en la consulta: " . mysqli_error($conn));
}

// Obtener el nombre del usuario de la sesión
$nombreUsuario = $_SESSION['nombre'];

$mesActual = date('F Y');
?>



<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Negocio</title>
  <link rel="stylesheet" href="assets/css/estilos.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;600&display=swap" rel="stylesheet">
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- DataTables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js" defer></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

  <!-- Header -->
<header class="header">
  <div class="logo">
    <h1>ILLUSTIK</h1>
  </div>
  <nav class="navbar">
    <a href="#">Inicio</a>
    <a href="#">Reportes</a>
    <a href="#">Estadísticas</a>
    <a href="#">Ajustes</a>
  </nav>
</header>

<!-- Sidebar -->
<aside class="sidebar">
  <div class="user-box">
    <img src="assets/img/img1.jpeg" class="user-avatar">
    <span>Hola, <?= htmlspecialchars($nombreUsuario) ?></span>
  </div>
</aside>

<!-- Main content -->
<main class="main">
<div class="dashboard-header">
  <div class="mes-actual">
    📅 <?= $mesActual ?>
  </div>
</div>

  <!-- Servicios (tabla) -->
  <div class="contenedor-panel">
    <h2>Lista de Servicios</h2>
    <table id="tablaServicios" class="display">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Descripción</th>
          <th>Precio</th>
          <th>Duración</th>
          <th>Fecha</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($fila = mysqli_fetch_assoc($resultado)): ?>
          <tr>
            <td><?= htmlspecialchars($fila['id']) ?></td>
            <td><?= htmlspecialchars($fila['nombre']) ?></td>
            <td><?= htmlspecialchars($fila['descripcion']) ?></td>
            <td><?= '$' . number_format($fila['precio'], 0, ',', '.') ?></td>
            <td><?= htmlspecialchars($fila['duracion']) ?> min.</td>
            <td>
              <a href="crud/editar.php?id=<?= urlencode($fila['id']) ?>">Editar</a> |
              <a href="crud/eliminar.php?id=<?= urlencode($fila['id']) ?>" onclick="return confirm('¿Estás seguro de eliminar este servicio?')">Eliminar</a>
            </td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
    <a href="crud/registrar.php" class="boton">Agregar Servicio</a>
  </div>

  <!-- Cerrar sesión -->
  <a href="login/logout.php" class="cerrar-sesion">
  <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
</a>
</main>

<!-- Footer -->
<footer class="footer">
  <p>&copy; 2025 ILLUSTIK. Todos los derechos reservados.</p>
  <nav class="footer-nav">
    <a href="#">Política de Privacidad</a>
    <a href="#">Términos y Condiciones</a>
  </nav>
</footer>

<script>
  $(document).ready(function() {
    $('#tablaServicios').DataTable({
      language: {
        url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json'
      }
    });
  });
</script>

</body>
</html>

