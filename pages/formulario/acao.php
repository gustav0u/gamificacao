<?php
    $vet = json_encode($_POST);

    var_dump($vet);
    $fp = fopen("salvar.json", "w");
    fwrite($fp, $vet);
    fclose($fp);
    header("location:apresentacao.php");
?>