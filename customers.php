<?php
// Si deseas, aquí podrías iniciar la sesión si más adelante quieres mostrar info dinámica
  //  session_start();
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
      <h1>Illustik</h1>
      <nav>
        <a href="#info">Nosotros & Servicios</a>
        <a href="navegaciones/contacto.php">Ayuda?</a>
        <a href="login/index.php">
        
        </a>
      </nav>
    </header>
    <!-- Barra de búsqueda reemplazando el banner -->
    <div class="search-container">
      <form action="#" method="get">
        <input type="text" class="search-bar" placeholder="Buscar servicios o salones..." name="search">
      </form>
    </div>
 <section id="info" class="info-imagenes">
  <div class="tarjeta">
    <img src="../assets/img/salones.jpg" alt="Salones" />
    <p>Estilistas</p>
  </div>
  <div class="tarjeta">
    <img src="../assets/img/mm.jpg" alt="Reservas" />
    <p>Reserva en línea</p>
  </div>
  <div class="tarjeta">
    <img src="../assets/img/estilistas.jpg" alt="Estilistas" />
    <p>salones </p>
  </div>
   <div class="tarjeta">
    <img src="../assets/img/recomendaciones.jpg" alt="recomendaciones"
    <p>Recomendaciones</p>
  </div>
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
