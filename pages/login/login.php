<?php
// Inicia a sessão
session_start();

// Conexão com o banco de dados
$dsn = 'mysql:host=localhost;dbname=gamificacao;charset=utf8';
$username = 'root';
$password = '';

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Erro na conexão com o banco de dados: ' . $e->getMessage());
}

// Dados do formulário de login
$username = $_POST['username'];
$password = $_POST['password'];

// Consulta para verificar as credenciais
$sql = "SELECT * FROM usuario WHERE usuario = :username";

try {
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['senha'])) {
        // Salva o nome de usuário na sessão
        $_SESSION['username'] = $username;

        // Redireciona para a página principal
        header('Location: ../index.php');
        exit();
    } else {
        echo 'Credenciais inválidas. Tente novamente.';
    }
} catch (PDOException $e) {
    die('Erro ao verificar as credenciais: ' . $e->getMessage());
}

// Fecha a conexão
$pdo = null;
?>
