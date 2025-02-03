<?php
session_start();
include("config.php");

// Verificar si el usuario está autenticado
if (!isset($_SESSION['usuario_id'])) {
    die("Error: Debes iniciar sesión para responder.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tema_id = $_POST['tema_id'];
    $contenido = trim($_POST['contenido']);
    $autor_id = $_SESSION['usuario_id']; // ID del usuario autenticado

    if (empty($contenido)) {
        die("Error: La respuesta no puede estar vacía.");
    }

    // Insertar la respuesta en la base de datos
    $stmt = $conn->prepare("INSERT INTO respuestas (tema_id, autor_id, contenido) VALUES (?, ?, ?)");
    $stmt->bind_param("iis", $tema_id, $autor_id, $contenido);

    if ($stmt->execute()) {
        header("Location: respuesta.php?id=" . $tema_id); // Redirigir al tema
        exit();
    } else {
        echo "❌ Error al publicar la respuesta: " . $stmt->error;
    }

    $stmt->close();
}
$conn->close();
?>
