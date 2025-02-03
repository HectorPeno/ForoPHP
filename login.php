<?php
session_start();
include 'config.php';

// Verificar si el formulario ha sido enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];
    
        // Consulta para verificar si el usuario existe
        $sql = "SELECT * FROM usuarios WHERE username = '$username'";
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            // Verificar la contraseña
            if (password_verify($password, $row['password'])) {
                // Contraseña correcta, iniciar sesión
                echo "Bienvenido, $username!";
            } else {
                echo "Contraseña incorrecta.";
            }
        } else {
            echo "Usuario no encontrado.";
        }
    }
    // Verificar si el nombre de usuario existe
    $sql = "SELECT * FROM usuarios WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // Verificar la contraseña
        if (password_verify($password, $user['password'])) {
            // Iniciar sesión
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header("Location: index.php");
            exit();
        } else {
            echo "Contraseña incorrecta.";
        }
    } else {
        echo "El nombre de usuario no existe.";
    }
}
?>
<link rel="stylesheet" href="registro.css">
<h2>Iniciar sesión</h2>
<form method="POST" action="login.php">
    <label for="username">Nombre de usuario:</label>
    <input type="text" name="username" id="username" required>
    
    <label for="password">Contraseña:</label>
    <input type="password" name="password" id="password" required>
    
    <button type="submit">Iniciar sesión</button>
</form>
<br>
<p>¿No tienes una cuenta? <a href="crearusuario.php">Crear cuenta</a></p>
