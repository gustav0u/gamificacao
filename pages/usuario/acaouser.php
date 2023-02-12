<?php
require_once "../../conf/Conexao.php";
$acao = "";
$codigo = isset($_GET['codigo']) ? $_GET['codigo']: 0;
if(empty($codigo)){
    $codigo = isset($_POST['codigo']) ? $_POST['codigo']: 0;
}
switch($_SERVER['REQUEST_METHOD']) {
    case 'GET':  $acao = isset($_GET['acao']) ? $_GET['acao'] : ""; break;
    case 'POST': $acao = isset($_POST['acao']) ? $_POST['acao'] : "";break;
}
switch($acao){
    case 'excluir': excluir(); break;
    case 'salvar': {
        if ($codigo == 0) 
            salvar();
        else 
            editar();
    } ; break;
    case 'login': logar($acao); break;
    case 'logoff': logar($acao); break;
}

function excluir(){   
    $codigo = isset($_GET['codigo']) ? $_GET['codigo']: 0;
    $conexao = Conexao::getInstance();
    $stmt = $conexao->prepare("DELETE FROM usuario where codigo = :codigo");
    $stmt->bindParam('codigo', $codigo, PDO::PARAM_INT);
    $stmt->execute();
    header("location:index.php");
}

function findById(){
    $codigo = isset($_GET['codigo']) ? $_GET['codigo']: 0;
    $conexao = Conexao::getInstance();
    $conexao = $conexao->query("SELECT * FROM usuario WHERE codigo = $codigo;");
    $result= $conexao->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function editar(){
    //echo "editar";
    $codigo = isset($_POST['codigo']) ? $_POST['codigo']: 0;
$nome = isset($_POST['nome']) ? $_POST['nome']: 0;
$email = isset($_POST['email']) ? $_POST['email']: 0;
$usuar = isset($_POST['usuar']) ? $_POST['usuar']: 0;
$pass = isset($_POST['pass']) ? $_POST['pass']: 0;
$sha1pass= sha1($pass);
    $conexao = Conexao::getInstance();
    $conexao = $conexao->query("UPDATE usuario SET nome = '$nome',email = '$email', usuar = '$usuar', pass = '$sha1pass', pass = '$sha1pass' WHERE codigo = '$codigo'");
    header("location:../index.php");
}

function salvar(){
    $codigo = isset($_POST['codigo']) ? $_POST['codigo']: 0;
    $nome = isset($_POST['nome']) ? $_POST['nome']: 0;
    $email = isset($_POST['email']) ? $_POST['email']: 0;
    $usuar = isset($_POST['usuar']) ? $_POST['usuar']: 0;
    $pass = isset($_POST['pass']) ? $_POST['pass']: 0;  
    $sha1pass= sha1($pass);
    $conexao = Conexao::getInstance();
    $conexao = $conexao->query("INSERT INTO usuario (nome, email, usuar, pass) VALUES ('$nome', '$email', '$usuar', '$sha1pass');");
    
    header("location:login.php");
}
function logar($acao){
    $email = isset($_POST['email']) ? $_POST['email']: 0;
    $pass = isset($_POST['pass']) ? $_POST['pass']: 0;
    $sha1pass= sha1($pass);
    $conexao = Conexao::getInstance();
    $conexao = $conexao->query("SELECT * FROM usuario WHERE email = '$email' and pass = '$sha1pass';");
    $result= $conexao->fetch(PDO::FETCH_ASSOC);
    if ($acao == 'logoff') {
        session_start();
        session_destroy();
        header('Location:login.php');
    }
    elseif ($result == true) {
        if (count($result) > 0) {
            session_start();
            $_SESSION['email'] = $email;
            header('Location:../index.php');
    }  
}else header('Location:login.php');
    
    }

?>
