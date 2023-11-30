<?php
    $u = $_SESSION["userId"];
    $conexao = Conexao::getInstance();
    $sql = $conexao->query("select * from usuario, sala_has_usuario, sala where usuario.idusuario = sala_has_usuario.usuario_idusuario and sala_has_usuario.sala_idsala = sala.idsala and idusuario = '$u'");
    $counter = 3;
    while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
        if ($counter == 3) {
            echo '
                </div>
                <br>
                <div class="row">
            ';
            $counter = 0;

        }
        $hexa = $linha["cor"];
        $r = hexdec(substr($hexa,1,2)); // Se for sem o #, mude para 0, 2
        $g = hexdec(substr($hexa,3,2)); // Se for sem o #, mude para 3, 2
        $b = hexdec(substr($hexa,5,2)); // Se for sem o #, mude para 5, 2
        $luminosidade = ( $r * 299 + $g * 587 + $b * 114) / 1000;
        if( $luminosidade > 128 ) {
            $fonte = "black";
        }else {
            $fonte = "white";
        }
        echo '
            <div class="col-md-4" >
                <div class="card" style="background-color:'.$linha["cor"].';">
                    <div class="card-body">
                        <h5 class="card-title" style="color:'.$fonte.';">'.$linha["nome"].'</h5>
                        <p class="card-text" style="color:'.$fonte.';">'.$linha["descricao"].'</p>
                        <a href="turma/index.php?t='.$linha["idsala"].'" class="btn btn-purple">Abrir turma</a>
                    </div>
                </div>
            </div>
        ';
        $counter++;
    }
?>