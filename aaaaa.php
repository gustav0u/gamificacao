<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <fieldset>
    <form method="post" id="form">
        <span id="a">A</span>
        <fieldset id="0">
            <input type="text" name="0[pergunta]" id="0[pergunta]" placeholder="Pergunta...">
            <select name="0[tipo]" id="0[tipo]"  class="slc">
                <option value="rCurta">Resposta Curta</option>
                <option value="rLonga">Resposta Longa</option>
                <option value="multEsc">Múltipla Escolha</option>
                <option value="uniEsc">Escolha Única</option>
                <option value="sel">Caixas de Seleção</option>
            </select>
        </fieldset>
        <button type="button" onclick="maisUm()">mais</button><input type="submit" value="vai">
    </form>
    </fieldset>
    <script>
        contar = 0;
        function maisUm(){
            form = contar;
            contar+=1;
            getId = contar+"[tipo]";
            var pagina = document.getElementById(form),
            maisUm = "<fieldset id='"+contar+"'><input type='text' name='"+contar+"[pergunta]' id='"+contar+"[pergunta]' placeholder='Pergunta...'><select name='"+contar+"[tipo]' id='"+contar+"[tipo]' class='slc'><option value='rCurta'>Resposta Curta</option><option value='rLonga'>Resposta Longa</option><option value='multEsc'>Múltipla Escolha</option><option value='uniEsc'>Escolha Única</option><option value='sel'>Caixas de Seleção</option></select></fieldset>";
            pagina.insertAdjacentHTML('afterend', maisUm);
            alert(document.getElementById("form").innerHTML);
        }
        /* $(document).ready(function(){
            $(".slc").change(function(){
                $(this).toggle();
                if (mudar.value == "multEsc") {
                    alert(mudar.value);
                }else if (mudar.value == "uniEsc") {
                    alert(mudar.value);
                } else if (mudar.value == "sel") {
                    alert(mudar);
                }
            });
        }); */
        function change(change){
            var mudar = document.getElementById(change);
            //alert(mudar.value);
            if (mudar.value == "multEsc") {
                alert(mudar.value);
            }else if (mudar.value == "uniEsc") {
                alert(mudar.value);
            } else if (mudar.value == "sel") {
                alert(mudar);
            }
        }
    </script>
    

    <fieldset>
    <?php
    //$aa = array(['tipo' => 'rCurta', 'pergunta' => 'oi'], ['tipo' => 'rLonga', 'pergunta' => 'oi'], ['tipo' => 'multEsc', 'pergunta' => 'oia', 'options' => ['1', '2', '3', '4', '5', '6']], ['tipo' => 'uniEsc', 'pergunta' => 'oia', 'options' => ['1', '2', '3', '4', '5', '6']], ['tipo' => 'sel', 'pergunta' => 'oia', 'options' => ['1', '2', '3', '4', '5', '6']],['tipo' => 'rCurta', 'pergunta' => 'oi']        );
    var_dump($_POST);
    $aa = $_POST;  
    montaForm($aa);
    function montaForm($perguntas){
        foreach ($perguntas as $value) {
            foreach ($value as $key1 => $value1) {
            if ($key1 == 'tipo') {
                if ($value1 == 'rCurta') {
                    echo "<fieldset>";
                    echo "$value[pergunta]<br>";
                    echo "<input type='text' name='$value[pergunta]' id='$value[pergunta]'>";
                    echo "</fieldset>";
                }
                if ($value1 == 'rLonga') {
                    echo "<fieldset>";
                    echo "$value[pergunta]<br>";
                    echo "<textarea name='' id='' cols='30' rows='10'></textarea>";
                    echo "</fieldset>";
                }
                if ($value1 == "multEsc") {
                    echo "<fieldset>";
                    echo "$value[pergunta]<br>";
                    foreach ($value['options'] as $key => $value2) {
                        echo "<input type='checkbox' name='$value[pergunta]ckb[]' id='$value[pergunta]ckb[]' value='$value2'>$value2<br>";
                    }
                    echo "</fieldset>";
                }
                if ($value1 == "uniEsc") {
                    echo "<fieldset>";
                    echo "$value[pergunta]<br>";
                    foreach ($value['options'] as $key => $value2) {
                        echo "<input type='radio' name='$value[pergunta]rd[]' id='$value[pergunta]rd[]' value='$value2'>$value2<br>";
                    }
                    echo "</fieldset>";
                }
                if ($value1 == "sel") {
                    echo "<fieldset>";
                    echo "$value[pergunta]<br>";
                    echo "<select name='$value[pergunta]slc[]' id='$value[pergunta]slc[]'>";
                    foreach ($value['options'] as $key => $value2) {
                        echo "<option value='$value2'>$value2</option><br>";
                    }
                    echo "</select></fieldset>";
                }
            }
        }
        }
            
    }
    ?>

    </fieldset>
    
</body>
</html>