<?php
//  conforme o teu XAMPP
$host   = "localhost";
$user   = "root";
$pass   = "";       
$dbname = "pizza_chefe";

// Conectar ao banco de dados ( xampp
$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

$nome  = trim($_POST['nome']  ?? '');
$email = trim($_POST['email'] ?? '');
$senha = trim($_POST['senha'] ?? '');

// Validação básica no servidor
if (empty($nome) || empty($email) || empty($senha)) {
    die("Preencha todos os campos.");
}

if (strlen($senha) < 6) {
    die("A senha deve ter pelo menos 6 caracteres.");
}

// criptografia
$senha_hash = password_hash($senha, PASSWORD_DEFAULT);

//  para evitar SQL injection
$stmt = $conn->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $nome, $email, $senha_hash);

if ($stmt->execute()) {
    echo "usuário registado com sucesso! <a href='login1.html'>Entrar</a>";
} else {
    echo "Erro ao registrar: " . $conn->error;
}

$stmt->close();
$conn->close();
?>