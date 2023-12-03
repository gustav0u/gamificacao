<?php
    include "../../assets/classes/formulario.class.php";
    include "../../conf/Conexao.php";
    $acao = $_POST["acao"] ? $_POST["acao"] : "";
    $usuario = 1;
    $descricao = "";
    $nomeForm = isset($_POST["nomeform"]) ? $_POST["nomeform"] : "";
    $perguntas = [];
    switch ($acao) {
        case 'salvar':
            salvar($usuario, $descricao, $nomeForm, $perguntas);
            break;
        case 'responder':
            responder($usuario, $perguntas);
            break;
        default:
            # code...
            break;
    }
    function salvar($usuario, $descricao, $nomeForm, $perguntas){
        for ($i=0; $i < count($_POST); $i++) { 
            if(isset($_POST["pgt$i"]))
                $perguntas[$i] = $_POST["pgt$i"];
            if (isset($_POST["correta$i"]))
                $perguntas[$i]["correta"] =  $_POST["correta$i"];
            
        }
        echo "<br>";
        var_dump($perguntas);
        $conexao = Conexao::getInstance();
        $sql = $conexao->query("insert into formulario(titulo, usuario_idusuario, descricao)
        VALUES ('$nomeForm', '$usuario', '$descricao');");
        $lastInsertForm = $conexao->lastInsertId();
        foreach ($perguntas as $pergunta) {
            switch ($pergunta["tipoP"]) {
                case 'rCurta':
                   $pergunta["tipoP"] = 1;
                    break;
                    
                case 'rLonga':
                    $pergunta["tipoP"] = 2;
                     break;
                     
                case 'multEsc':
                    $pergunta["tipoP"] = 3;
                     break;
                     
                case 'uniEsc':
                    $pergunta["tipoP"] = 4;
                     break;
                     
                case 'slc':
                    $pergunta["tipoP"] = 5;
                     break;
                     
                case 'date':
                    $pergunta["tipoP"] = 6;
                     break;
                     
                case 'time':
                    $pergunta["tipoP"] = 7;
                     break;
                     
                case 'file':
                    $pergunta["tipoP"] = 8;
                     break;
                     
                case 'scale':
                    $pergunta["tipoP"] = 9;
                     break;
                
                default:
                    $pergunta["tipoP"] = 1;
                    break;
            }
            var_dump($pergunta["tipoP"]);
            $p = new Pergunta(0, "", "", "", "", "");
                $p->setTipo($pergunta["tipoP"]);
                $p->setQuestao($pergunta["pergunta"]);
                $p->setFormulario($lastInsertForm);
                if (isset($pergunta["options"])) {
                    $p->setAlternativas($pergunta["options"]);
                }
                $p->inserir();
                $lastInsertPergunta = $conexao->lastInsertId();
                if (isset($pergunta["options"])) {
                    $count = 0;
                    foreach ($p->getAlternativas() as $alternativa) {
                    $correta = false;
                    if(isset($pergunta["correta"][$count]))
                        $correta = true;
                    $a = new Alternativa(0, "", "", "");
                    $a->setTexto($alternativa);
                    $a->setIdpergunta($lastInsertPergunta);
                    $a->setCorreta($correta);
                    $a->inserir();
                    $count++;
                    }
                }
        }
    }
    function responder(){
        $qtd = 1000/(count($_POST)-1);
        $pontuacao = 0;
        foreach ($_POST as $key => $value) {
            if ($key != "acao") {
                if (is_array($value)) {
                    foreach ($value as $key1 => $value1) {
                        $conn = Conexao::getInstance();
                        $alternativa = $conn->query("select * from alternativa where pergunta_idpergunta = '$key'");
                        $con = Conexao::getInstance();
                        $correta = $conn->query("select count(*) as contagem from alternativa where pergunta_idpergunta = '$key' and correta = 1");
                        $corretas = $correta->fetch(PDO::FETCH_ASSOC);
                        
                        while ($alt = $alternativa->fetch(PDO::FETCH_ASSOC)) {
                                if ($alt["correta"] == false && $value1 == $alt["idalternativa"]) {
                                    $pontuacao -= $qtd/$corretas["contagem"];
                                }elseif ($alt["correta"] == true && $value1 == $alt["idalternativa"]) {
                                    $pontuacao += $qtd/$corretas["contagem"];
                                }
                        }
                    }
                }else{
                    $conn = Conexao::getInstance();
                    $alternativa = $conn->query("select * from alternativa where idalternativa = '$value'");
                    while ($alt = $alternativa->fetch(PDO::FETCH_ASSOC)) {
                        if ($alt["correta"] == true) {
                            $pontuacao += $qtd;
                        }
                    }
                }
                
                
            }
            
            
        }
        echo "<Br>".$pontuacao;
        
        

    }
    //$Formulario = new Formulario(0, $nomeForm, $usuario, $descricao, $perguntas);
    //$Formulario = new Formulario(0, "sim", "1", "desc", $perguntas);
    //$Formulario->inserir();
    //var_dump($formulario->perguntas);
?>