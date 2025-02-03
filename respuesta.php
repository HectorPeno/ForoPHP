<?php
session_start();
include 'config.php';

// Verificar si el usuario está logueado
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Verificar si el formulario de respuesta ha sido enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $contenido = $_POST['contenido'];
    $tema_id = $_POST['tema_id'];
    $autor_id = $_SESSION['user_id'];

    // Validar que el contenido no esté vacío
    if (empty($contenido)) {
        echo "Por favor, escribe una respuesta.";
    } else {
        // Insertar la respuesta en la base de datos
        $sql = "INSERT INTO respuestas (contenido, tema_id, autor_id) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sii", $contenido, $tema_id, $autor_id);
        if ($stmt->execute()) {
            echo "Respuesta enviada exitosamente.";
            header("Location: tema.php?id=" . $tema_id); // Redirigir al tema después de responder
            exit();
        } else {
            echo "Error al enviar la respuesta: " . $stmt->error;
        }
    }
}
?>
