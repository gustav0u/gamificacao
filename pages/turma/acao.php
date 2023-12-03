<?php
    include "../../conf/Conexao.php";
    $acao = isset($_POST["acao"]) ? $_POST["acao"] : (isset($_GET["acao"]) ? $_GET["acao"] : "voltar");
    session_start();
    $u = $_SESSION["userId"];
    $t = isset($_POST["turma"]) ? $_POST["turma"] : $_GET["turma"];
    $txt = isset($_POST["texto"]) ? $_POST["texto"] : "- Post Vazio -";
    switch ($acao) {
        case 'post':
            post($u, $t, $txt);
            break;
        case 'comentar':
            comentar($u, $t);
            break;
        default:
            # code...
            break;
    }
    function post($u, $t, $txt){
        include "../../assets/classes/postagem.class.php";
        include "../../assets/classes/postagem_sala.class.php";
        date_default_timezone_set('America/Sao_Paulo');
        $data = date('Y/m/d H:i');
        echo $data;
        $post = new Postagem(0, $txt, $u, $data);
        $post->inserir();
        $conn = Conexao::getInstance();
        $p = $conn->lastInsertId();
        $post_sala = new PostagemSala($p, $t);
        $post_sala->inserir();
        header("location:index.php?t=$t");
    }
    function comentar($u, $t){
        $comentario = isset($_POST["comentario"]) ? $_POST["comentario"] : "";
        $post = isset($_POST["post"]) ? $_POST["post"] : "";
        include "../../assets/classes/comentario.class.php";
        $comment = new Comentario(0, $post, $u, $comentario);
        $comment->inserir();
        header("location:index.php?t=$t");
    }
?>