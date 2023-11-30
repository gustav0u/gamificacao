<?php
    include "../../conf/Conexao.php";
    include_once "../../assets/classes/comentario.class.php";
    include_once "../../assets/classes/usuario.class.php";
    $fonte = isset($_GET["fonte"]) ? $_GET["fonte"] : "";
    $post = isset($_GET["post"]) ? $_GET["post"] : 0;
    $conexao = Conexao::getInstance();
    $sql = $conexao->query("select * from usuario, comentario where usuario.idusuario = comentario.usuario_idusuario and comentario.postagem_idpostagem = '$post'");
    while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
        echo '
            <div class="row">
                <div class="col-10">
                    <div class="row">
                        <div class="col-1">
                            <img class="img rounded-circle" src="../../assets/img/userr.webp" alt="" width="100%">
                        </div>
                        <div class="col-11">
                            <h5 class="card-title" style="color:'.$fonte.'"><b>'.$linha["nome"].'</b></h5>   
                            <p class="card-text" style="color:'.$fonte.'">'.$linha["comentario"].'</p>
                        </div>
                    </div>
                </div>
            </div>
       ';
    }
?>