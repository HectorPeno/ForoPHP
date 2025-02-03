<?php
session_start();
include 'config.php';

// Verificar si el usuario está logueado
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Verificar si se ha enviado el formulario para crear un nuevo tema
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['titulo'], $_POST['contenido'])) {
    $titulo = $_POST['titulo'];
    $contenido = $_POST['contenido'];
    $usuario_id = $_SESSION['user_id'];

    // Validaciones básicas
    if (empty($titulo) || empty($contenido)) {
        echo "Por favor, completa todos los campos.";
    } else {
        // Insertar el nuevo tema en la base de datos
        $sql = "INSERT INTO temas (titulo, contenido, autor_id) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssi", $titulo, $contenido, $usuario_id);
        if ($stmt->execute()) {
            echo "Tema creado exitosamente. <a href='index.php'>Volver a la página principal</a>";
        } else {
            echo "Error al crear el tema: " . $stmt->error;
        }
    }
}
?>
<link rel="stylesheet" href="insertar.css">

<form method="POST" action="insertartema.php">
<h2>Añadir nuevo tema</h2>
    <label for="titulo">Título:</label>
    <input type="text" name="titulo" id="titulo" required>
    
    <label for="contenido">Contenido:</label>
    <textarea name="contenido" id="contenido" required></textarea>
    
    <button type="submit">Crear tema</button>
</form>
