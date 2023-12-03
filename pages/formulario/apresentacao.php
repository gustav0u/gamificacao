<?php
    $title = "Apresentação Formulário";
    include "../header.php";
    include "../../conf/Conexao.php";
    include "../../assets/classes/formulario.class.php";
    $f = $_GET["formulario"];
    $form = Formulario::listar(2, $f);
    $conexao = Conexao::getInstance();
    $perguntas = $conexao->query("select * from pergunta where formulario_idformulario = $f");
    montaForm($perguntas);
    function montaForm($perguntas){
        while ($linha = $perguntas->fetch(PDO::FETCH_ASSOC)) {
            var_dump($linha);
            $id = $linha["idpergunta"];
            $conn = Conexao::getInstance();
            $alternativa = $conn->query("select * from alternativa where pergunta_idpergunta = $id");

                // var_dump($value);
                //echo $value["pergunta"];
                if ($linha["tipoper_idtipoper"] == '1') {
                    echo "<fieldset>";
                    echo $linha["questao"]."<br>";
                    echo "<input type='text' name='{$linha["idpergunta"]}' id='{$linha["idpergunta"]}'>";
                    echo "</fieldset>";
                }elseif ($linha["tipoper_idtipoper"] == '2') {
                    echo "<fieldset>";
                    echo $linha["questao"]."<br>";
                    echo "<textarea name='{$linha["idpergunta"]}' id='{$linha["idpergunta"]}' cols='30' rows='10'></textarea>";
                    echo "</fieldset>";
                }elseif ($linha["tipoper_idtipoper"] == "3") {
                    echo "<fieldset>";
                    echo $linha["questao"]."<br>";
                    while ($alt = $alternativa->fetch(PDO::FETCH_ASSOC)) {
                        echo "<input type='checkbox' name='{$alt["pergunta_idpergunta"]}[]' id='{$alt["pergunta_idpergunta"]}[]' value='{$alt["idalternativa"]}'>{$alt["texto"]}<br>";
                    }
                    echo "</fieldset>";
                }elseif ($linha["tipoper_idtipoper"] == "4") {
                    echo "<fieldset>";
                    echo $linha["questao"]."<br>";
                    while ($alt = $alternativa->fetch(PDO::FETCH_ASSOC)) {
                        echo "<input type='radio' name='{$alt["pergunta_idpergunta"]}[]' id='{$alt["pergunta_idpergunta"]}[]' value='{$alt["idalternativa"]}'>{$alt["texto"]}<br>";
                    }
                    echo "</fieldset>";
                }elseif ($linha["tipoper_idtipoper"] == "5") {
                    echo "<fieldset>";
                    echo $linha["questao"]."<br>";
                    echo "<select name='{$linha["idpergunta"]}' id='{$linha["idpergunta"]}'>";
                    while ($alt = $alternativa->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value='{$alt["idalternativa"]}'>{$alt["texto"]}</option><br>";
                    }
                    echo "</select></fieldset>";
                }elseif($linha["tipoper_idtipoper"] == "6"){
                    echo "<fieldset>";
                    echo $linha["questao"]."<br>";
                    echo "<input type='date' name='{$linha["idpergunta"]}' id='{$linha["idpergunta"]}'>";
                    echo "</fieldset>";
                }elseif($linha["tipoper_idtipoper"] == "7"){
                    echo "<fieldset>";
                    echo $linha["questao"]."<br>";
                    echo "<input type='time' name='{$linha["idpergunta"]}' id='{$linha["idpergunta"]}'>";
                    echo "</fieldset>";
                }elseif ($linha["tipoper_idtipoper"] == "8") {
                    echo "<fieldset>";
                    echo "<form method='post' enctype='multipart/form-data'>";
                    echo $linha["questao"]."<br>";
                    echo "<input type='file' name='{$linha["idpergunta"]}' id='{$linha["idpergunta"]}'>";
                    echo "</form>";
                    echo "</fieldset>";
                }elseif ($linha["tipoper_idtipoper"] == "9") {
                    echo "<fieldset>";
                    echo $linha["questao"]."<br>";
                    for ($l=$value->options->min; $l <= $value->options->max; $l++) { 
                        echo "<input type='radio' name='{$linha["idpergunta"]}' id='{$linha["idpergunta"]}' value='$l'>$l<br>";
                    }
                    echo "</fieldset>";
                }
        }
        echo "<button type='submit' id='acao' name='acao' value='responder'>Enviar Resposta</button>";
            
    }
    $script = "../../assets/js/funcao.js";
    include "../footer.php"; 
    ?>