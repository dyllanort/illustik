<?php
session_start();
if (isset($_SESSION['correo'])) {  // Verificar si ya hay una sesión activa
    header("Location: ../panel.php");  // Redirigir al panel si ya está logueado
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login / Registro</title>
    <link rel="stylesheet" href="../assets/css/estilos.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
   <header>
      <h1>Illustik</h1>
      <nav>
        <a href="../homepage.php">Inicio</a>
        <a href="../navegacion/info.php">Nosotros</a>
        <a href="#contacto">Ayuda?</a>
      </nav>
    </header>
<body>
    <main>
        <div class="contenedor__todo">
            <div class="caja__trasera">
                <div class="caja__trasera-login">
                    <h3>¿Ya tienes una cuenta?</h3>
                    <p>Inicia sesión para entrar al sistema</p>
                    <button id="btn__iniciar-sesion">Iniciar Sesión</button>
                </div>
                <div class="caja__trasera-register">
                    <h3>¿Aún no tienes una cuenta?</h3>
                    <p>Regístrate para que puedas iniciar sesión</p>
                    <button id="btn__registrarse">Registrarse</button>
                </div>
            </div>

            <div class="contenedor__login-register">
                <!-- Login -->
                <form class="formulario__login" action="login.php" method="POST">
                    <h2>Iniciar sesión</h2>
                    <input type="email" id="loginCorreo" name="correo" placeholder="Correo electrónico" required>  <!-- Cambié 'usuario' por 'correo' -->
                    <input type="password" id="loginPassword" name="password" placeholder="Contraseña" required>
                    <a href="recuperar_contraseña.php" id="recuperarContrasena">¿Olvidaste tu contraseña?</a>
                    <button type="submit">Entrar</button>
                </form>

                <!-- Registro -->
                <form class="formulario__register" action="registro.php" method="POST">
                    <h2>Registrarse</h2>
                    <input type="text" name="nombre" placeholder="Nombre completo" required>
                    <input type="email" name="correo" placeholder="Correo electrónico" required>
                    <input type="text" name="telefono" placeholder="Teléfono" required maxlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                    <input type="password" name="password" placeholder="Contraseña" required>                    
                    <button type="submit">Registrarse</button>
                </form>
            </div>
        </div>
    </main>

    <script src="../assets/js/script.js"></script>
</body>
<footer>
      <p>&copy; 2025 ILLUSTIK - Todos los derechos reservados</p>
    </footer>
</html>
