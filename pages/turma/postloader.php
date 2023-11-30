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
    $sql = $conexao->query("select *,  MONTHNAME(data) as mes, date_format(data, get_format(date, 'EUR')) as 'dia', date_format(data, '%Hh%i') as hora from usuario, postagem, sala_has_postagem where postagem.usuario_idusuario = $u and postagem.idpostagem = sala_has_postagem.postagem_idpostagem and sala_has_postagem.sala_idsala = $t and usuario.idusuario = $u order by idpostagem desc");
    
    while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
        $dia = explode(".", $linha["dia"]);
        switch ($linha["mes"]) {-
            
            default:
                # code...
                break;
        }
        $dataFormatada = $dia[0]. " de ".$linha["mes"]." de ".$dia[2];
        $p = $linha["idpostagem"];
        $conexao1 = Conexao::getInstance();
        $sql1 = $conexao1->query("select count(*) as comentarios from comentario where comentario.postagem_idpostagem = '$p'");
        $c = $sql1->fetch(PDO::FETCH_ASSOC);
        echo '
            <div class="row justify-content-center text-start">
                <div class="col-10" >
                    <div class="card" style="border: 2px solid '.$font.'; background-color: '.$bg.';">
                        <div class="card-body">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-1">
                                        <img class="img rounded-circle" src="../../assets/img/userr.webp" alt="" width="100%">
                                    </div>
                                    <div class="col-11">
                                        <h5 class="card-title" style="color:'.$fonte.'"><b>'.$linha["nome"].'</b>  &nbsp <span class="text-secondary" style="font-size:60%">'.$dataFormatada.' - '.$linha["hora"].'</span></h5>   
                                        <p class="card-text" style="color:'.$fonte.'">'.$linha["texto"].'</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-2">
                                        <button type="button" id="btn'.$count.'" class="btn btn-sm btn-secondary" onclick="loadComment('.$count.', '.$linha["idpostagem"].', 1)">
                                            <i class="bi bi-people"></i>
                                            Comentários <span class="badge bg-light " style="color: '.$font.';">'.$c["comentarios"].'</span>
                                        </button>
                                    </div>
                                </div>
                                <br>
                                <div id="comentarios'.$count.'"></div>
                                <br>
                                <form action="acao.php" method="post">
                                <div class="row">
                                    <div class="col-1">
                                        <div class="row justify content-end text-end">
                                            <div class="col-12">
                                                <img class="img rounded-circle" src="../../assets/img/userr.webp" alt="" width="70%">
                                            </div> 
                                        </div>
                                    </div>
                                    <div class="col-10">
                                        <input type="hidden" name="turma" value="'.$t.'">
                                        <input type="hidden" name="post" value="'.$linha["idpostagem"].'">
                                        <input type="text" name="comentario" class="form-control rounded-pill" id="exampleFormControlInput1" placeholder="Deixe seu comentário para a turma...">
                                    </div>
                                    <div class="col-1">
                                        <button type="submit" value="comentar" name="acao" class="btn btn-secondary"><i class="bi bi-reply-all-fill"></i></button>
                                    </div>
                                </div>
                                </form>
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