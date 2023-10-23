<?php
/*     require_once "../../assets/classes/formulario.class.php";
    $vet = $_POST;
    $f = new Formulario(0, $vet["nomeform"], "usuario 1", $vet["nomeform"], $vet[""])
*/
    /* $vet = array();
    $vet["nomeform"] = $_POST["nomeform"]
    for ($i=0; $i <= count($_POST); $i++) { 
        if (isset($_POST["pgt$i"])) {
            $vet["pgt$i"] = $_POST["pgt$i"];
        }
        
    } */

    $vet = json_encode($_POST);

    var_dump($vet);
    $fp = fopen("salvar.json", "w");
    fwrite($fp, $vet);
    fclose($fp);
    header("location:apresentacao.php");
?>