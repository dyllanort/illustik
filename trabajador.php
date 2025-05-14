<?php
session_start();
include __DIR__ . '/../includes/db.php';

// Verificar que el usuario esté logueado
if (!isset($_SESSION['correo'])) {
    header("Location: login/index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/estilos.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=delete" />
    <title> illustyk </title>
  </head>
  <body>
    <header>
        <button class="menu-button" onclick="toggleMenu()">Menu</button>

    <!-- Menú desplegable -->
    <div class="menu" id="menu">
        <ul>
            <li><a href="#">Opción 1</a></li>
            <li><a href="#">Opción 2</a></li>
            <li><a href="#">Opción 3</a></li>
        </ul>
    </div>
      <h1>Illustik</h1>
      <nav>
        <a href="../homepage.php">Inicio</a>
        <a href="#contacto">Ayuda?</a>
        <a href="../login/index.php">
        <button class="login-btn">Iniciar sesión</button>
        </a>
      </nav>
    </header>

    <div class="banner">
      <h2>¡Nosotros & servicios!</h2>
    </div>

    <section id="info" class="info-combinada">
      <h2>Sobre nosotros</h2>
      <p>Somos una plataforma dedicada a conectar a clientes con salones de belleza y barberías. ¡La belleza a un clic!</p>
      <h2 style="margin-top: 2rem;">Servicios</h2>
      <ul>
        <li>Reservas en línea para peluquerías y barberías</li>
        <li>Agenda rápida y segura</li>
        <li>Recomendaciones de estilistas</li>
      </ul>
    </section>

    

    <section id="contacto">
      <h2>Contacto</h2>
      <p>Email: illustyk.13@gmail.com</p>
      <p>Teléfono: +57 300 123 4567</p>
    </section>

    <footer>
      <p>&copy; 2025 BeautyBook - Todos los derechos reservados</p>
    </footer>
  </body>
</html>