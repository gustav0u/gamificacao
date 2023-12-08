<?php
require_once "../../conf/Conexao.php";
    
$acao = "";
switch($_SERVER['REQUEST_METHOD']) {
    case 'GET':  $acao = isset($_GET['acao']) ? $_GET['acao'] : ""; break;
    case 'POST': $acao = isset($_POST['acao']) ? $_POST['acao'] : ""; break;
}

switch($acao){
    case 'excluir': excluir(); break;
    case 'salvar': {
        $codigo = isset($_POST['codigo']) ? $_POST['codigo'] : "";
        if ($codigo == 0)
            salvar(); 
        else
            editar();
        break;
    }
}

function excluir(){    
    $codigo = isset($_GET['codigo']) ? $_GET['codigo']:0;
    $conexao = Conexao::getInstance();
    $stmt = $conexao->prepare("DELETE FROM pessoa WHERE codigo = :codigo");
    $stmt->bindParam('codigo', $codigo, PDO::PARAM_INT);  
    $stmt->execute();
    header("location:cons.php");
}

function editar(){
    $codigo = isset($_POST['codigo']) ? $_POST['codigo']: 0;
    $nome = isset($_POST['nome']) ? $_POST['nome']: 0;
    $email = isset($_POST['email']) ? $_POST['email']: 0;
    $senha = isset($_POST['senha']) ? $_POST['senha']: 0;
    $conexao = Conexao::getInstance();
    $conexao = $conexao->query("UPDATE pessoa SET nome = '$nome',
                                email = '$email', senha = '$senha' 
                                WHERE codigo = $codigo;");
    header("location:cons.php");
}

function salvar(){
    
    $nome = isset($_POST['nome']) ? $_POST['nome']: 0;
    $email = isset($_POST['email']) ? $_POST['email']: 0;
    $senha = isset($_POST['senha']) ? $_POST['senha']: 0;
    $conexao = Conexao::getInstance();
    $conexao = $conexao->query("INSERT INTO pessoa (nome, email, senha) VALUES ('$nome', '$peso', '$altura');");
    header("location:index.php");
}

function findById($codigo){
    $conexao = Conexao::getInstance();
    $conexao = $conexao->query("SELECT * FROM pessoa WHERE codigo = $codigo;");
    $result = $conexao->fetch(PDO::FETCH_ASSOC);
    return $result; 
}

function login($usuario, $senha){
    $conexao = Conexao::getInstance();
    $conexao = $conexao->query("SELECT senha FROM pessoa WHERE email = '$usuario';");
    echo $senha;
    $result = $conexao->fetch(PDO::FETCH_ASSOC);
    echo $result['senha'];
    if ($senha ==   $result['senha']) {
        header("location:cons.php");
    }else {
        header("location:index.php");
    }
}

?>