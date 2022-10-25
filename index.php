<!DOCTYPE HTML>
<html lang="en">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body id="body">
<div class="container">
    <div class="row">
    <form method="post"  class="col col-12">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8"><input type="text" placeholder="Nome do Formulário" class="form-control" id="nomeform"><hr></div>
            <div class="col-2"></div>
        </div>
        
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8"><div id="form"></div></div>
            <div class="col-2"></div>
        </div>
        <div class="row justify-content-between">
            <div class="col-2"></div>
            <div class="col-4 text-start"><button type="button" class="btn btn-purple" onclick="maisUm()">+</button></div>
            <div class="col-4 text-end"><input type="submit" class="btn btn-purple" value="Gravar Questionário"></div>
            <div class="col-2"></div>
        </div>
        
    </form>
    <div class="col col-2"></div>
    </div>
</div>
    <fieldset>
    <?php
    /* $vet = array();
    $count = 0;
    for ($i=0; $i <= count($_POST); $i++) { 
        if (isset($_POST["pgt".$i])) {
            array_push($vet, $_POST["pgt".$i]);
        }
    }
    montaForm($vet);
    function montaForm($perguntas){
        foreach ($perguntas as $value) {
            foreach ($value as $key1 => $value1) {
                // var_dump($value);
                //echo $value["pergunta"];
            if ($key1 == 'tipoP') {
                if ($value1 == 'rCurta') {
                
                    echo "<fieldset>";
                    echo $value['pergunta']."<br>";
                    echo "<input type='text' name='$value[pergunta]' id='$value[pergunta]'>";
                    echo "</fieldset>";
                }elseif ($value1 == 'rLonga') {
                    echo "<fieldset>";
                    echo $value['pergunta']."<br>";
                    echo "<textarea name='' id='' cols='30' rows='10'></textarea>";
                    echo "</fieldset>";
                }elseif ($value1 == "multEsc") {
                    echo "<fieldset>";
                    echo $value['pergunta']."<br>";
                    foreach ($value['options'] as $key => $value2) {
                        echo "<input type='checkbox' name='$value[pergunta]ckb[]' id='$value[pergunta]ckb[]' value='$value2'>$value2<br>";
                    }
                    echo "</fieldset>";
                }elseif ($value1 == "uniEsc") {
                    echo "<fieldset>";
                    echo $value['pergunta']."<br>";
                    foreach ($value['options'] as $key => $value2) {
                        echo "<input type='radio' name='".$value['pergunta']."rd[]' id='".$value['pergunta']."rd[]' value='$value2'>$value2<br>";
                    }
                    echo "</fieldset>";
                }elseif ($value1 == "slc") {
                    echo "<fieldset>";
                    echo $value['pergunta']."<br>";
                    echo "<select name='$value[pergunta]slc[]' id='$value[pergunta]slc[]'>";
                    foreach ($value['options'] as $key => $value2) {
                        echo "<option value='$value2'>$value2</option><br>";
                    }
                    echo "</select></fieldset>";
                }elseif($value1 == "date"){
                    echo "<fieldset>";
                    echo $value['pergunta']."<br>";
                    echo "<input type='date' name='$value[pergunta]' id='$value[pergunta]'>";
                    echo "</fieldset>";
                }elseif($value1 == "time"){
                    echo "<fieldset>";
                    echo $value['pergunta']."<br>";
                    echo "<input type='time' name='$value[pergunta]' id='$value[pergunta]'>";
                    echo "</fieldset>";
                }elseif ($value1 == "file") {
                    echo "<fieldset>";
                    echo "<form method='post' enctype='multipart/form-data'>";
                    echo $value['pergunta']."<br>";
                    echo "<input type='file' name='oi' id='oi'>";
                    echo "<input type='submit'>";
                    echo "</form>";
                    echo "</fieldset>";
                }elseif ($value1 == "scale") {
                    echo "<fieldset>";
                    echo $value['pergunta']."<br>";
                    for ($l=$value['options']['min']; $l <= $value['options']['max']; $l++) { 
                        echo "<input type='radio' name='$value[pergunta]scl[]' id='$value[pergunta]scl[]' value='$l'>$l<br>";
                    }
                    echo "</fieldset>";
                }
            }
        }
        }
            
    } */
    ?>
    </fieldset>
<script src="js/funcoes.js"></script>
</body>
</html>