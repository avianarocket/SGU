<?php

require 'db.php';

if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];

    $stmt = $conn->prepare("DELETE FROM usuarios WHERE id = ?");
    $stmt->bind_param('i', $id);

    if ($stmt->execute()) {
        header("Location: index.php");
    } else {
        echo "Erro ao excluir o usuário.";
    }

    $stmt->close();
}

$conn->close();
?>
