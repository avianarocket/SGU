<?php
$host = 'Endereço do servidos do banco de dados';
$user = 'Usuário do Banco de dados';
$password = 'Senha do banco de dados';
$dbname = 'Nome do banco de dados';

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
?>