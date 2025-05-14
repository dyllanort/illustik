<?php
include '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'] ?? '';
    $correo = $_POST['correo'] ?? '';
    $telefono = $_POST['telefono'] ?? '';
    $password = $_POST['password'] ?? '';

    if (empty($nombre) || empty($correo) || empty($telefono) || empty($password)) {
        echo "Todos los campos son obligatorios.";
        exit();
    }

    // Verificar si el correo ya está registrado
    $stmt = $conn->prepare("SELECT id FROM usuarios WHERE correo = ?");
    $stmt->bind_param("s", $correo); // <-- corregido
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "El correo ya se encuentra registrado.";
        exit();
    }

    $stmt->close();

    // Encriptar contraseña
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // Insertar nuevo usuario
    $stmt = $conn->prepare("INSERT INTO usuarios (nombre, correo, telefono, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nombre, $correo, $telefono, $password_hash);

    if ($stmt->execute()) {
        echo "Usuario registrado con éxito.";
        header("Location: index.php");
        exit();
    } else {
        echo "Error al registrar: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

