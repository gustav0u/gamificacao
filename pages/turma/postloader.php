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
    if ($tipo == 1) {
        $sql = $conexao->query("select *,  MONTHNAME(data) as mes, date_format(data, get_format(date, 'EUR')) as 'dia', date_format(data, '%Hh%i') as hora from usuario, postagem, sala_has_postagem where postagem.usuario_idusuario = usuario.idusuario and postagem.idpostagem = sala_has_postagem.postagem_idpostagem and sala_has_postagem.sala_idsala = $t order by idpostagem desc");
    
        while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
            $dia = explode(".", $linha["dia"]);
            switch ($linha["mes"]) {
                
                case 'January':
                    $linha["mes"] = "Janeiro";
                    break;
                    
                case 'February':
                    $linha["mes"] = "Fevereiro";
                    break;
                    
                case 'March':
                    $linha["mes"] = "Março";
                    break;
                    
                case 'April':
                    $linha["mes"] = "Abril";
                    break;
                    
                case 'May':
                    $linha["mes"] = "Maio";
                    break;
                    
                case 'June':
                    $linha["mes"] = "Junho";
                    break;
                    
                case 'July':
                    $linha["mes"] = "Julho";
                    break;
                    
                case 'August':
                    $linha["mes"] = "Agosto";
                    break;
                    
                case 'September':
                    $linha["mes"] = "Setembro";
                    break;
                    
                case 'October':
                    $linha["mes"] = "Outubro";
                    break;
                    
                case 'November':
                    $linha["mes"] = "Novembro";
                    break;
                    
                case 'December':
                    $linha["mes"] = "Dezembro";
                    break;
                default:
                    $linha["mes"] = "???";
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
                        <div role="button" class="card" style="border: 2px solid '.$font.'; background-color: '.$bg.';">
                            <div class="card-body">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-1">
                                            <img class="img rounded-circle" src="'.URL_BASE.'assets/imgusuarios/'.$linha["imguser"].'" alt="" width="100%">
                                        </div>
                                        <div class="col-11">
                                            <h5 class="card-title" style="color:'.$fonte.'"><b>'.$linha["nome"].'</b>  &nbsp <a href="../perfil.php?u='.$linha["idusuario"].'" style="color: '.$fonte.'; font-size:80%">@'.$linha["usuario"].'</a> <span style="color: '.$fonte.'; font-size:60%">'.$dataFormatada.' - '.$linha["hora"].'</span></h5>   
                                            <p class="card-text" style="color:'.$fonte.'">'.$linha["texto"].'</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-2">
                                            <button type="button" id="btn'.$count.'" class="btn btn-sm btn-secondary" onclick="loadComment('.$count.', '.$linha["idpostagem"].', \''.$fonte.'\')">
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
                                                    <img class="img rounded-circle" src="'.URL_BASE.'assets/imgusuarios/'.$_SESSION["user_image"].'" alt="" width="70%">
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
    }elseif($tipo == 2){
        $sql = $conexao->query("select *,  MONTHNAME(data) as mes, date_format(data, get_format(date, 'EUR')) as 'dia', date_format(data, '%Hh%i') as hora from usuario, postagem, sala_has_postagem where postagem.usuario_idusuario = usuario.idusuario and postagem.idpostagem = sala_has_postagem.postagem_idpostagem and sala_has_postagem.sala_idsala = $t order by idpostagem desc;");
        while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
            $dia = explode(".", $linha["dia"]);
            switch ($linha["mes"]) {
                
                case 'January':
                    $linha["mes"] = "Janeiro";
                    break;
                    
                case 'February':
                    $linha["mes"] = "Fevereiro";
                    break;
                    
                case 'March':
                    $linha["mes"] = "Março";
                    break;
                    
                case 'April':
                    $linha["mes"] = "Abril";
                    break;
                    
                case 'May':
                    $linha["mes"] = "Maio";
                    break;
                    
                case 'June':
                    $linha["mes"] = "Junho";
                    break;
                    
                case 'July':
                    $linha["mes"] = "Julho";
                    break;
                    
                case 'August':
                    $linha["mes"] = "Agosto";
                    break;
                    
                case 'September':
                    $linha["mes"] = "Setembro";
                    break;
                    
                case 'October':
                    $linha["mes"] = "Outubro";
                    break;
                    
                case 'November':
                    $linha["mes"] = "Novembro";
                    break;
                    
                case 'December':
                    $linha["mes"] = "Dezembro";
                    break;
                default:
                    $linha["mes"] = "???";
                    break;
            }
            $dataFormatada = $dia[0]. " de ".$linha["mes"]." de ".$dia[2];
            echo '
                <div class="row justify-content-center text-start" data-bs-dismiss="offcanvas" onclick="reutilizar('.$count.')">
                    <div class="col-10" >
                        <div role="button" class="card" style="border: 2px solid '.$font.'; background-color: '.$bg.';">
                            <div class="card-body">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-1">
                                            <img class="img rounded-circle" src="'.URL_BASE.'assets/imgusuarios/'.$linha["imguser"].'" alt="" width="100%">
                                        </div>
                                        <div class="col-11">
                                            <p id="reuse'.$count.'" class="card-text" style="color:'.$fonte.'">'.$linha["texto"].'</p>
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
    }else{
        $sql = $conexao->query("select *, date_format(curdate(), get_format(date, 'EUR')) as hoje, date_format(dataentrega, get_format(date, 'EUR')) as 'diaentrega', MONTHNAME(data) as mes, date_format(data, get_format(date, 'EUR')) as 'dia', date_format(data, '%Hh%i') as hora from usuario, postagem, atividade, sala_has_postagem where atividade.postagem_idpostagem = postagem.idpostagem and postagem.usuario_idusuario = usuario.idusuario and postagem.usuario_idusuario = usuario.idusuario and postagem.idpostagem = sala_has_postagem.postagem_idpostagem and sala_has_postagem.sala_idsala = $t order by idpostagem desc;");
        while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
            $form = $linha["formulario_idformulario"];
            $conn = Conexao::getInstance();
            $usuario = $conn->query("select *,date_format(dataenvio, get_format(date, 'EUR')) as 'diaentrega' from usuario, usuario_responde_formulario where usuario.idusuario = usuario_responde_formulario.usuario_idusuario and usuario_responde_formulario.formulario_idformulario = '$form';");
            $usuario = $usuario->fetch(PDO::FETCH_ASSOC);
            if ($usuario == false) {
                $allow = true;
                if ($linha["diaentrega"] < $linha["hoje"]) {
                    $entrega = '<span class="badge rounded-pill text-bg-danger"><i class="bi bi-exclamation-circle"></i> Entrega: '.$linha["diaentrega"].'</span>';
                }
                else{
                    $entrega = '<span class="badge rounded-pill text-bg-warning"><i class="bi bi-exclamation-circle"></i> Entrega: '.$linha["diaentrega"].'</span>';
                }
            }else{
                $allow = false;
                if ($usuario["diaentrega"] > $linha["diaentrega"]) {
                    $entrega = '<span class="badge rounded-pill text-bg-warning">Entregue dia: '.$usuario["diaentrega"].'</span>'; 
                }else{
                $entrega = '<span class="badge rounded-pill text-bg-success">Entregue dia: '.$usuario["diaentrega"].'</span>'; 
                }
            }
            $dia = explode(".", $linha["dia"]);
            switch ($linha["mes"]) {
                
                case 'January':
                    $linha["mes"] = "Janeiro";
                    break;
                    
                case 'February':
                    $linha["mes"] = "Fevereiro";
                    break;
                    
                case 'March':
                    $linha["mes"] = "Março";
                    break;
                    
                case 'April':
                    $linha["mes"] = "Abril";
                    break;
                    
                case 'May':
                    $linha["mes"] = "Maio";
                    break;
                    
                case 'June':
                    $linha["mes"] = "Junho";
                    break;
                    
                case 'July':
                    $linha["mes"] = "Julho";
                    break;
                    
                case 'August':
                    $linha["mes"] = "Agosto";
                    break;
                    
                case 'September':
                    $linha["mes"] = "Setembro";
                    break;
                    
                case 'October':
                    $linha["mes"] = "Outubro";
                    break;
                    
                case 'November':
                    $linha["mes"] = "Novembro";
                    break;
                    
                case 'December':
                    $linha["mes"] = "Dezembro";
                    break;
                default:
                    $linha["mes"] = "???";
                    break;
            }
            $dataFormatada = $dia[0]. " de ".$linha["mes"]." de ".$dia[2];
            echo '
            <div class="row justify-content-center text-start">
                <div class="col-10" >
                    <div class="card" style="border: 2px solid '.$font.'; background-color: '.$bg.';">
                        <div class="card-body">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-1">
                                        <img class="img rounded-circle" src="'.URL_BASE.'assets/imgusuarios/'.$linha["imguser"].'" alt="" width="100%">
                                    </div>
                                    <div class="col-11">
                                        <h5 class="card-title" style="color:'.$fonte.'"><b>'.$linha["nome"].'</b>  &nbsp <a href="../perfil.php?u='.$linha["idusuario"].'" style="color: '.$fonte.'; font-size:80%">@'.$linha["usuario"].'</a> <span style="color: '.$fonte.'; font-size:60%">'.$dataFormatada.' - '.$linha["hora"].'</span>&nbsp'.$entrega.'</h5>   
                                        <p class="card-text" style="color:'.$fonte.'">'.$linha["texto"].'</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-4">';
                                    if ($allow) {
                                        echo '<a href="../formulario/responde.php?f='.$linha["formulario_idformulario"].'&t='.$t.'" class="btn btn-sm btn-secondary" >
                                                <i class="bi bi-list-columns"></i> Responder Questionário
                                              </a>';
                                    }else{
                                        echo '<button type="button" class="btn btn-sm btn-success" disabled>
                                                <i class="bi bi-checked"></i> Você Já respondeu esse questionário
                                              </button>';
                                    }
                                        
                                    echo '</div>
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
    }
    
?>