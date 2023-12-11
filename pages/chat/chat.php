<?php
    require_once '../../conf/conexao.php';
    $conexao = Conexao::getInstance();
    session_start();
    $u = $_SESSION["username"];
    $chat = $_GET["chat"];
    $n = "";
    $d = "";
    $h = -1;
    $consulta=$conexao->query("select usuario.nome, mensagem, dayname(dia) as semana, date_format(dia, get_format(date, 'EUR')) as 'data', date_format(hora, '%H:%i') as hora from usuario, chat_has_usuario, chat, mensagem where usuario.idusuario = chat_has_usuario.usuario_idusuario and chat_has_usuario.chat_idchat = chat.idchat and chat.idchat = mensagem.chat_idchat and mensagem.usuario_idusuario = usuario.idusuario and chat.idchat = $chat order by idmensagem;");  
    //var_dump($colors);
    while($linha=$consulta->fetch(PDO::FETCH_ASSOC)){
        if ($u == $linha["nome"]) {
            $nome = "VOCÊ";
            
                if ($linha["data"] == $d) {
                    echo '
                        <div class="row justify-content-end text-end " >
                            <div class="col-6"></div>
                            <div class="col-6 balaodir"><b>'.$nome.'</b> &nbsp '.$linha["hora"].'<br>'.$linha["mensagem"].'</div>
                        </div>
                        <div class="balaospace"></div>
                    ';
                
                
                }else {
                    echo '
                        <div class="row justify-content-center text-center text-light" >
                            '.$linha["semana"].' day '.$linha["data"].'
                        </div>

                    ';
                    echo "
                    <br><span style='font-size:8px;'>{$linha["semana"]} day {$linha["data"]}</span><br>";
                    echo '
                        <div class="row justify-content-end text-end" >
                            <div class="col-6"></div>
                            <div class="col-6 balaodir"><b>'.$nome.'</b> &nbsp '.$linha["hora"].'<br>'.$linha["mensagem"].'</div>
                        </div>
                        <div class="balaospace"></div>
                    ';
                }                
            }else{
            $nome = strtoupper($linha["nome"]);
                if ($linha["data"] == $d) {
                        echo '
                            <div class="row" >
                            <div class="col-6 balaoesq"><span style="color:'.$linha["nome"].'"><b>'.$nome.'</b></span> &nbsp '.$linha["hora"].'<br>'.$linha["mensagem"].'</div>
                                <div class="col-6"></div>
                            </div>
                            <div class="balaospace"></div>
                        ';                
                }else {
                    echo "<br><span style='font-size:8px;'>{$linha["semana"]} day {$linha["data"]}</span><br>";
                    echo '
                        <div class="row" >
                            <div class="col-6 balaoesq"><span style="color:'.$linha["nome"].'"><b>'.$nome.'</b></span> &nbsp '.$linha["hora"].'<br>'.$linha["mensagem"].'</div>
                            <div class="col-6"></div>
                        </div>
                        <div class="balaospace"></div>
                    ';
                }
        }    
        $n = $linha["nome"];
        $d = $linha["data"];
        $h = explode(":", $linha["hora"]);
    } 
    
?>
