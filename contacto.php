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
         <a href="../homepage.php">Inicio</a>
        <a href="#info">Nosotros & Servicios</a>
        <a href="../login/index.php">
        <button class="login-btn">Iniciar sesión</button>
        </a>
      </nav>
    </header>

    <div class="banner">
      <h2>Ayuda
      </h2>
    </div>

    <h1>Ayuda y Preguntas Frecuentes</h1>

  <div class="accordion">¿Qué es esta página?</div>
  <div class="panel">
    Esta plataforma te permite reservar citas en salones de belleza y barberías de forma rápida, segura y en línea.
  </div>

  <div class="accordion">¿Cómo crear una cuenta?</div>
  <div class="panel">
    1. Haz clic en “Registrarse”.<br>
    2. Completa tus datos y crea una contraseña.<br>
    3. Confirma tu cuenta desde tu correo.
  </div>

  <div class="accordion">¿Cómo iniciar sesión?</div>
  <div class="panel">
    Inicia sesión con tu correo y contraseña. Si olvidaste tu contraseña, usa el enlace para recuperarla.
  </div>

  <div class="accordion">¿Cómo hacer una reserva?</div>
  <div class="panel">
    Selecciona el servicio, el profesional, el horario y confirma tu reserva. Puedes pagar en línea o en el local.
  </div>

  <div class="accordion">¿Cómo cancelar o modificar una reserva?</div>
  <div class="panel">
    Desde “Mis reservas” puedes editar o cancelar tu cita. Algunas opciones solo están disponibles con anticipación mínima.
  </div>

  <div class="accordion">¿Qué métodos de pago están disponibles?</div>
  <div class="panel">
    Tarjeta débito/crédito, transferencia bancaria o efectivo (según disponibilidad del local).
  </div>

  <div class="accordion">¿Qué pasa si llego tarde o no puedo asistir?</div>
  <div class="panel">
    Si llegas tarde, tu cita puede ser cancelada o reagendada. Revisa las políticas del local y notifícalo con tiempo.
  </div>

  <div class="accordion">¿Cómo contactar al soporte?</div>
  <div class="panel">
    Escríbenos a soporte@tusalon.com o por WhatsApp al +57 300 123 4567. Horario: Lunes a sábado de 8:00 a.m. a 6:00 p.m.
  </div>

  <div class="accordion">¿Puedo reservar para otra persona?</div>
  <div class="panel">
    Sí, puedes indicar el nombre de la persona en la nota de la reserva durante el proceso de agendamiento.
  </div>

  <div class="accordion">¿Qué pasa con mis datos?</div>
  <div class="panel">
    Tus datos están protegidos y solo se usan para gestionar tus reservas. No los compartimos con terceros sin autorización.
  </div>

    <script>
    const accordions = document.querySelectorAll('.accordion');

    accordions.forEach(acc => {
      acc.addEventListener('click', () => {
        acc.classList.toggle('active');
        const panel = acc.nextElementSibling;
        panel.style.display = (panel.style.display === 'block') ? 'none' : 'block';
      });
    });
  </script>



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
