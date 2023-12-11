
<?php
    require_once "../../conf/conexao.php";
    session_start();
    //var_dump($_SESSION);
    $user = $_SESSION["userId"];
    $chat = isset($_GET["chat"]) ? $_GET["chat"] : "";
        $conexao = Conexao::getInstance();
        $sql = $conexao->query("select * from usuario, chat_has_usuario, chat where usuario.idusuario = chat_has_usuario.usuario_idusuario and chat_has_usuario.chat_idchat = chat.idchat and usuario.idusuario = '$user' ;");
        while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
            $c = $linha["idchat"];
            $conexao1 = Conexao::getInstance();
            $sql1 = $conexao->query("select mensagem, nome, date_format(hora, '%H:%i') as hora from usuario, mensagem, chat where usuario.idusuario = mensagem.usuario_idusuario and mensagem.chat_idchat = chat.idchat and chat.idchat = $c order by mensagem.idmensagem desc;");
            $mostruario = $sql1->fetch(PDO::FETCH_ASSOC);
            $mostruario["mensagem"] = substr($mostruario["mensagem"], 0, 15)."...";
            if ($linha["idchat"] == $chat) {
                echo '
                    <a class="card rounded-4 text-dark" href="index.php?chat='.$linha["idchat"].'" style="text-decoration: none; background-color: #D781FF;">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                    <h5 class="card-title">'.$linha["titulo"].'</h5>
                                    <p class="card-text">'.$mostruario["nome"].': '.$mostruario["mensagem"].' &nbsp&nbsp&nbsp '.$mostruario["hora"].'</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                ';
            }else{
                echo '
                    <a class="card rounded-4 text-dark" href="index.php?chat='.$linha["idchat"].'" style="text-decoration: none; background-color: #D3C3DA">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                    <h5 class="card-title">'.$linha["titulo"].'</h5>
                                    <p class="card-text">'.$mostruario["nome"].': '.$mostruario["mensagem"].' &nbsp&nbsp&nbsp '.$mostruario["hora"].'</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                ';
            }
        }
    ?>