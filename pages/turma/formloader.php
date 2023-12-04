<?php
    session_start();
    include "../../assets/classes/sala.class.php";
    include "../../conf/Conexao.php";
    $u = $_SESSION["userId"];
    $t = $_GET["t"];
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
    $sql = $conexao->query("select * from usuario, formulario where formulario.usuario_idusuario = usuario.idusuario and formulario.usuario_idusuario = '$u';");
    while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
        echo '
            <div class="row justify-content-center text-start" >
                <div class="col-10" >
                    <div role="button" onclick="form('.$linha["idformulario"].', \''.$linha["titulo"].'\')" class="card" data-bs-dismiss="offcanvas"  style="border: 2px solid '.$font.'; background-color: '.$bg.';">
                        <div class="card-body">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-1">
                                        <img class="img rounded-circle" src="'.URL_BASE.'assets/imgusuarios/'.$linha["imguser"].'" alt="" width="100%">
                                    </div>
                                    <div class="col-11">
                                        <p id="reuse'.$count.'" class="card-text" style="color:'.$fonte.'">Formulário: '.$linha["titulo"].'</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        ';
        $count++;
    }
?>