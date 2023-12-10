<?php
    include "../../conf/Conexao.php";
    $acao = isset($_POST["acao"]) ? $_POST["acao"] : (isset($_GET["acao"]) ? $_GET["acao"] : "voltar");
    session_start();
    $u = $_SESSION["userId"];
    $t = isset($_POST["turma"]) ? $_POST["turma"] : (isset($_GET["turma"]) ? $_GET["turma"] : "voltar");
    $txt = isset($_POST["texto"]) ? $_POST["texto"] : "- Post Vazio -";
    switch ($acao) {
        case 'post':
            post($u, $t, $txt, 1);
            break;
        case 'comentar':
            comentar($u, $t);
            break;
        case 'atv':
            $v = isset($_POST["valor"]) ? $_POST["valor"] : 1000;
            $dt = isset($_POST["dataentrega"]) ? $_POST["dataentrega"] : "0000-00-00";
            $f = isset($_POST["formulario"]) ? $_POST["formulario"] : null;
            $p = post($u, $t, $txt, 2, $f);
            atv($v, $dt, $p, $t);
            break;
        case 'entrar':
            $codigo = isset($_POST["codigo"]) ? $_POST["codigo"] : "";
            entrar($u, $codigo);
            break;
        default:
            # code...
            break;
    }
    function post($u, $t, $txt, $tipo, $form = null){
        include "../../assets/classes/postagem.class.php";
        include "../../assets/classes/postagem_sala.class.php";
        date_default_timezone_set('America/Sao_Paulo');
        $data = date('Y/m/d H:i');
        echo $data;
        $post = new Postagem(0, $txt, $u, $data, $form);
        $post->inserir();
        $conn = Conexao::getInstance();
        $p = $conn->lastInsertId();
        $post_sala = new PostagemSala($p, $t);
        $post_sala->inserir();
        if ($tipo == 1) {
            header("location:index.php?t=$t");
        }else{
            return($p);
        }
        
    }
    function comentar($u, $t){
        $comentario = isset($_POST["comentario"]) ? $_POST["comentario"] : "";
        $post = isset($_POST["post"]) ? $_POST["post"] : "";
        include "../../assets/classes/comentario.class.php";
        $comment = new Comentario(0, $post, $u, $comentario);
        $comment->inserir();
        header("location:index.php?t=$t");
    }
    function atv($v, $dt, $p, $t){
        $post = isset($_POST["post"]) ? $_POST["post"] : "";
        include "../../assets/classes/atividade.class.php";
        $atividade = new Atividade(0, $p, $dt, $v);
        $atividade->inserir();
        header("location:atividade.php?t=$t");
    }
    function entrar($u, $c){
        include "../../assets/classes/codsala.class.php";
        $cod = Codsala::listar(2, $c);
        if ($cod != false) {
            $sala = $cod["sala_idsala"];
            $conexao = Conexao::getInstance();
            $conexao->query("insert into sala_has_usuario (sala_idsala, usuario_idusuario, tipousu_idtipousu) values ('$sala', '$u', 2)");
        }
        header("location:../index.php");
    }
?>