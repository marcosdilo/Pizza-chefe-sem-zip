<?php
// CONECTA A MERDA DO XAMPP AQUI
$conn = new mysqli_connect()
if($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error)
}

// regisrar a bomba

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

//sql
$sql = "INSERT INTO usuarios (nome, email, senha) VALUES ( '$nome', '$email', '$senha')";

//exec
if ($conn->query($sql) === TRUE) {
        echo "Usuário registrado com sucesso!";
} else {
        echo "Erro ao registrar: " . $conn->error;
}

// fechar a conexão
$conn->close();
?>