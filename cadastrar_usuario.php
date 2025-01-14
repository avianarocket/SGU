<?php

require 'db.php';

// Processa o formulário ao enviar
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtém os valores enviados pelo formulário
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $senha = trim($_POST['senha']);

    // Validação: Verifica se os campos estão preenchidos
    if (empty($nome) || empty($email) || empty($senha)) {
        $error = "Todos os campos são obrigatórios!";
    } elseif (strlen($senha) < 6) { // Validação: Senha com no mínimo 6 caracteres
        $error = "A senha deve ter pelo menos 6 caracteres.";
    } else {
        // Validação: Verifica se o e-mail já está cadastrado
        $stmt = $conn->prepare("SELECT id FROM usuarios WHERE email = ?");
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $error = "E-mail já cadastrado.";
        } else {
            // Insere os dados no banco
            $stmt = $conn->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)");
            // A senha é armazenada com hash para maior segurança
            $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
            $stmt->bind_param('sss', $nome, $email, $senha_hash);

            if ($stmt->execute()) {
                $success = "Usuário cadastrado com sucesso!";
            } else {
                $error = "Erro ao cadastrar o usuário.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    
    <title>Cadastro de Usuários</title>
    <style>
        /* Estilos básicos para o formulário */
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f3f3;
            padding: 20px;
        }
        .container {
            max-width: 400px;
            align-items: center;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input {
            width: 95%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            width: 100%;
            padding: 10px 10px 10px 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
        }
        button:hover {
            background-color: #0056b3;
        }
        .alert {
            padding: 10px;
            text-align: center;
            color: white;
            background-color: #dc3545;
            border-radius: 4px;
            margin-bottom: 15px;
        }
        .alert-success {
            background-color: #28a745;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 style="text-align:center;">Cadastro de Usuário</h1>
        <?php if (isset($error)): ?>
            <!-- Mensagem de erro -->
            <div class="alert"><?= htmlspecialchars($error); ?></div>
        <?php elseif (isset($success)): ?>
            <!-- Mensagem de sucesso -->
            <div class="alert alert-success"><?= htmlspecialchars($success); ?></div>
        <?php endif; ?>

        <!-- Formulário de cadastro -->
        <form method="POST" action="">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" id="nome" name="nome" required>
            </div>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="senha">Senha</label>
                <input type="password" id="senha" name="senha" required>
            </div>
            <button type="submit">Cadastrar Usuário</button>
        </form>
            </br>
            <a href='index.php'><button Style="background-color: #008CBA;">Listar Usuários</button></a>
    </div>
</body>
</html>
