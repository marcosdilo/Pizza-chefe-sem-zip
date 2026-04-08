<?php
session_start();

// ajusta conforme a bomba do teu XAMPP
$host   = "localhost";
$user   = "root";
$pass   = "";
$dbname = "pizza_chefe";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

$email = trim($_POST['email'] ?? '');
$senha = trim($_POST['senha'] ?? '');

if (empty($email) || empty($senha)) {
    die("Preencha todos os campos.");
}

$stmt = $conn->prepare("SELECT id, nome, senha FROM usuarios WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows === 1) {
    $utilizador = $resultado->fetch_assoc();

    // vai tomando do meno do cyber hackibg
    if (password_verify($senha, $utilizador['senha'])) {
        $_SESSION['usuario_id']   = $utilizador['id'];
        $_SESSION['usuario_nome'] = $utilizador['nome'];
        header("Location: dashboard.php");
        exit;
    } else {
        echo "email/senha imcorretos. <a href='login1.html'>Tentar novamente</a>";
    }
} else {
    echo "email/senha imcorretos. <a href='index.html'>Criar conta</a>";
}

$stmt->close();
$conn->close();
?>
