<?php
    /* $vet = json_encode($_POST);

    var_dump($vet);
    $fp = fopen("salvar.json", "w");
    fwrite($fp, $vet);
    fclose($fp);
    header("location:apresentacao.php"); */
    
    include "../../assets/classes/formulario.class.php";
    //include "../../assets/classes/pergunta.class.php";
    //include "../../assets/classes/alternativa.class.php";
    include "../../conf/Conexao.php";
    var_dump($_POST);
    $usuario = 1;
    $descricao = "";
    $nomeForm = isset($_POST["nomeform"]) ? $_POST["nomeform"] : "";
    $perguntas = [];
    for ($i=0; $i < count($_POST); $i++) { 
        if(isset($_POST{"pgt$i"}))
        $perguntas[] = $_POST["pgt$i"];
    }
    //var_dump($perguntas);
    $conexao = Conexao::getInstance();
    $sql = $conexao->query("insert into formulario(titulo, usuario_idusuario, descricao)
    VALUES ('$nomeForm', '$usuario', '$descricao');");
    $lastInsertForm = $conexao->lastInsertId();
    foreach ($perguntas as $pergunta) {
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
                foreach ($p->getAlternativas() as $alternativa) {
                $a = new Alternativa(0, "", "");
                $a->setTexto($alternativa);
                $a->setIdpergunta($lastInsertPergunta);
                $a->inserir();
                }
            }
    }
    //$Formulario = new Formulario(0, $nomeForm, $usuario, $descricao, $perguntas);
    //$Formulario = new Formulario(0, "sim", "1", "desc", $perguntas);
    //$Formulario->inserir();
    //var_dump($formulario->perguntas);
?>