<?php
session_start();
include '../includes/db.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correo = $_POST['correo'] ?? ''; // Aquí cambiamos 'usuario' por 'correo'
    $password = $_POST['password'] ?? '';

    if (empty($correo) || empty($password)) {
        echo "<script>alert('Por favor ingrese correo y contraseña.'); window.location.href='index.php';</script>";
        exit();
    }

    // Aquí corregimos el uso de la variable
    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE correo = ?");
    $stmt->bind_param("s", $correo); // Aquí también corregimos 'usuario' por 'correo'
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows === 1) {
        $fila = $resultado->fetch_assoc();

        if (password_verify($password, $fila['password'])) {
            $_SESSION['nombre'] = $fila['nombre'];
            $_SESSION['correo'] = $fila['correo'];

            header("Location: ../panel.php");
            exit();
        } else {
            echo "<script>alert('Contraseña incorrecta'); window.location.href='index.php';</script>";
        }
    } else {
        echo "<script>alert('Usuario no encontrado'); window.location.href='index.php';</script>";
    }

    $stmt->close();
    $conn->close(); // Asegúrate de usar la variable de conexión correcta, es $conn, no $conexion
    exit();
}
?>
