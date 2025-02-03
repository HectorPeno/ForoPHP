<?php
session_start();
include 'config.php';

// Si el formulario ha sido enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    // Validación de campos vacíos
    if (empty($username) || empty($password) || empty($email)) {
        echo "Por favor, completa todos los campos.";
    } else {
        // Validación de la contraseña
        if (!preg_match('/[A-Z]/', $password)) {
            echo "La contraseña debe contener al menos una letra mayúscula.<br>";
        } elseif (!preg_match('/[\W_]/', $password)) {
            echo "La contraseña debe contener al menos un carácter especial (como !, @, #, $, etc.).<br>";
        } else {
            // Verificar si el nombre de usuario o correo electrónico ya existen
            $sql = "SELECT * FROM usuarios WHERE username = ? OR email = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $username, $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                echo "El nombre de usuario o el correo electrónico ya están en uso.";
            } else {
                // Hashear la contraseña
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                // Insertar nuevo usuario en la base de datos
                $sql = "INSERT INTO usuarios (username, password, email) VALUES (?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sss", $username, $hashed_password, $email);
                if ($stmt->execute()) {
                    // Redirigir al login después de la creación exitosa
                    header("Location: login.php");
                    exit(); // Asegúrate de que el script termine aquí para evitar que el código siga ejecutándose
                } else {
                    echo "Error al crear el usuario: " . $stmt->error;
                }
            }
        }
    }
}
?>

<link rel="stylesheet" href="registro.css">
<h1>Crear cuenta</h1>
<form method="POST" action="crearusuario.php">
    <label for="username">Nombre de usuario:</label>
    <input type="text" name="username" id="username" required>
    
    <label for="password">Contraseña:</label>
    <input type="password" name="password" id="password" required>
    
    <label for="email">Correo electrónico:</label>
    <input type="email" name="email" id="email" required>
    
    <button type="submit">Registrar</button>
</form>
