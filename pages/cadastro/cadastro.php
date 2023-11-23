<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os valores enviados pelo formulário
    $senha = $_POST['senha'];
    $confirmarSenha = $_POST['Csenha'];

    // Verifica se as senhas são diferentes
    if ($senha != $confirmarSenha) {
        echo "As senhas não coincidem. Por favor, verifique e tente novamente.";
        die;
    } 
}
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

// Dados do formulário
$nome = $_POST['nome'];
$usuario = $_POST['usuario'];
$dtNasc = $_POST['dtNasc'];
$email = $_POST['email'];
$cor = $_POST['cor'];
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT); // Armazene a senha de forma segura

// Instrução SQL para inserir dados no banco de dados
$sql = "INSERT INTO usuario (nome, usuario, dtNasc, email, cor, senha) 
        VALUES (:nome, :usuario, :dtNasc, :email, :cor, :senha)";

// Preparar e executar a instrução SQL
try {
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':usuario', $usuario);
    $stmt->bindParam(':dtNasc', $dtNasc);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':cor', $cor);
    $stmt->bindParam(':senha', $senha);
    $stmt->execute();

     header('Location: ../login/login1.php');
} catch (PDOException $e) {
    die('Erro ao cadastrar no banco de dados: ' . $e->getMessage());
}

// Fechar a conexão
$pdo = null;
?>
