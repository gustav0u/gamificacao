<?php
    include "../../conf/conexao.php";
    $u = $_SESSION["userId"];
    $conexao = Conexao::getInstance();
    $sql = $conexao->query("select * from usuario, usuario_segue_usuario where usuario.idusuario = usuario_segue_usuario.usuario_idusuario and usuario_segue_usuario.usuario_idusuario1 = '$u'");
    while($linha = $sql->fetch(PDO::FETCH_ASSOC)){
        echo '<option value="'.$linha["idusuario"].'">'.$linha["nome"].'</option>';
    }
?>