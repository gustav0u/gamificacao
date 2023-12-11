<?php
    include "../../conf/conexao.php";
    $c = $_GET["cad"];
    $conexao = Conexao::getInstance();
    $sql = $conexao->query("select * from chat_has_usuario, usuario where chat_has_usuario.usuario_idusuario = usuario.idusuario and chat_has_usuario.chat_idchat = '$c'");
    while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
        echo '
            <tr>
                <td>'.$linha["idusuario"].'</td>
                <td>'.$linha["nome"].'</td>
                <td>'.$linha["usuario"].'</td>
            </tr>
        ';
    }
?>