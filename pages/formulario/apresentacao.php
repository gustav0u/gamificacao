<?php
    $title = "Apresentação Formulário";
    include "../header.php";
    $arquivo = file_get_contents('salvar.json');
    $vet = json_decode($arquivo);
    montaForm($vet);
    function montaForm($perguntas){
        echo "<h1>".$perguntas->nomeform."</h1>";
        foreach ($perguntas as $value) {
            /* var_dump($value); */
            foreach ($value as $key1 => $value1) {
                /* var_dump($value);
                echo "<hr>"; */
            if ($key1 == 'tipoP') {
                if ($value1 == 'rCurta') {
                
                    echo "<fieldset>";
                    echo $value->pergunta."<br>";
                    echo "<input type='text' name='$value->pergunta' id='$value->pergunta   '>";
                    echo "</fieldset><hr>";
                }elseif ($value1 == 'rLonga') {
                    echo "<fieldset>";
                    echo $value->pergunta."<br>";
                    echo "<textarea name='$value->pergunta' id='$value->pergunta' cols='30' rows='10'></textarea>";
                    echo "</fieldset><hr>";
                }elseif ($value1 == "multEsc") {
                    echo "<fieldset>";
                    echo $value->pergunta."<br>";
                    foreach ($value->options as $key => $value2) {
                        echo "<input type='checkbox' name='$value->pergunta.ckb[]' id='$value->pergunta.ckb[]' value='$value2'>$value2<br>";
                    }
                    echo "</fieldset><hr>";
                }elseif ($value1 == "uniEsc") {
                    echo "<fieldset>";
                    echo $value->pergunta."<br>";
                    foreach ($value->options as $key => $value2) {
                        echo "<input type='radio' name='".$value->pergunta."' id='".$value->pergunta."' value='$value2'>$value2<br>";
                    }
                    echo "</fieldset><hr>";
                }elseif ($value1 == "slc") {
                    echo "<fieldset>";
                    echo $value->pergunta."<br>";
                    echo "<select name='$value->pergunta.slc[]' id='$value->pergunta.slc[]'>";
                    foreach ($value->options as $key => $value2) {
                        echo "<option value='$value2'>$value2</option><br>";
                    }
                    echo "</select></fieldset>";
                }elseif($value1 == "date"){
                    echo "<fieldset>";
                    echo $value->pergunta."<br>";
                    echo "<input type='date' name='$value->pergunta' id='$value->pergunta'>";
                    echo "</fieldset>";
                }elseif($value1 == "time"){
                    echo "<fieldset>";
                    echo $value->pergunta."<br>";
                    echo "<input type='time' name='$value->pergunta' id='$value->pergunta'>";
                    echo "</fieldset>";
                }elseif ($value1 == "file") {
                    echo "<fieldset>";
                    echo "<form method='post' enctype='multipart/form-data'>";
                    echo $value->pergunta."<br>";
                    echo "<input type='file' name='oi' id='oi'>";
                    echo "</form>";
                    echo "</fieldset>";
                }elseif ($value1 == "scale") {
                    echo "<fieldset>";
                    echo $value->pergunta."<br>";
                    for ($l=$value->options->min; $l <= $value->options->max; $l++) { 
                        echo "<input type='radio' name='$value->pergunta.scl' id='$value->pergunta.scl' value='$l'>$l<br>";
                    }
                    echo "</fieldset>";
                }
            }
        }
        }
        echo "<input type='submit'>";
            
    }
    $script = "../../assets/js/funcao.js";
    include "../footer.php"; 
    ?>