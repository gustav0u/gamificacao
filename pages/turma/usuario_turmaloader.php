<?php
    session_start();
    include "../../assets/classes/sala.class.php";
    include "../../conf/Conexao.php";
    $u = $_SESSION["userId"];
    $t = $_GET["t"];
    $tipo = $_GET["tipo"];
    $sala = Sala::lista(1, $t);
    $title = "#".$sala["idsala"]." Sala: ".$sala["nome"];
    $hexa = $sala["cor"];
    $r = hexdec(substr($hexa,1,2)); // Se for sem o #, mude para 0, 2
    $g = hexdec(substr($hexa,3,2)); // Se for sem o #, mude para 3, 2
    $b = hexdec(substr($hexa,5,2)); // Se for sem o #, mude para 5, 2
    $luminosidade = ( $r * 299 + $g * 587 + $b * 114) / 1000;
    if( $luminosidade > 128 ) {
        $fonte = "black";
        $r -= 100;
        $b -= 100;
        $g -= 100;
        $font = "rgb($r, $g, $b)";
        $bg = $sala["cor"];
    }else {
        $fonte = "white";
        $font = $sala["cor"];
        $bg = "rgb($r, $g, $b)";
    }
    $count = 0;
    $conexao = Conexao::getInstance();
    $sql = $conexao->query("select * from usuario, sala_has_usuario where usuario.idusuario = sala_has_usuario.usuario_idusuario and sala_has_usuario.sala_idsala = $t and sala_has_usuario.tipousu_idtipousu = $tipo order by idusuario desc");

    while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
        if($tipo == 1){
            $botao = '<button type="button" class="btn btn-warning"><i class="bi bi-person-fill-down"></i></button>';
        }else{
            $botao = '<button type="button" class="btn btn-success"><i class="bi bi-person-fill-up"></i></button>';
        }
        echo '
        <tr>
            <th scope="row">
                <div class="row">
                    <div class="col-12">
                        <img class="rounded-circle  " src="'.URL_BASE.'assets/imgusuarios/'.$linha["imguser"].'" alt=""  width="50px">
                        &nbsp&nbsp '.$linha["nome"]."  @".$linha["usuario"].'
                        <span class="float-end">
                            '.$botao.'
                            <button type="button" class="btn btn-danger"><i class="bi bi-person-dash-fill"></i></button>
                        </span>
                    </div>  
                </div>
            </th>
        </tr>
        ';
    }