<?php
    require_once '../../conf/conexao.php';
    $acao = isset($_POST["acao"]) ? $_POST["acao"] : $_GET["acao"];
    switch ($acao) {
        case "login":
            login();
            break;
        case "logoff":
            logoff();
            break;
        case "mensagem":
            mensagem();
            break;
        default:
            # code...
            break;
    }
    function login(){
        $u = isset($_POST["u"]) ? $_POST["u"] : "";
        session_start();
        $_SESSION["u"] = $u;
        $conexao = Conexao::getInstance();
        $sql = $conexao->query("select idusuario, nome from usuario where nome = '$u'");
        while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
            if($u == $linha["nome"]){
                $_SESSION["userId"] = $linha["idusuario"];
                //header("location:chats.php");
                echo $_SESSION["userId"];
            }
        }
        if (!isset($_SESSION["userId"])) {
            header("location:index.php");
        }
        
    }
    function logoff(){
        session_start();
        session_destroy();
        header("location:index.php");
    }
    function mensagem(){
        session_start();
        $u = $_SESSION["userId"];
        $m = isset($_GET["msg"]) ? $_GET["msg"] : "oi";
        $c = isset($_GET["chat"]) ? $_GET["chat"] : "";
        echo $c;
        $conexao = Conexao::getInstance();
        $sql = $conexao->query("insert into mensagem(mensagem, usuario_idusuario, chat_idchat, dia, hora) values('$m', '$u', '$c', curdate(), curtime())");
        header("location:msg.php?chat=$c");

    }
    
?>