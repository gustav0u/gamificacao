<?php
    $vet = json_encode($_POST);
    $vet = json_encode($vet);
    ltrim($vet, '"');
    rtrim($vet, '"');
    var_dump($vet);
    $fp = fopen("salvar.json", "w");
    fwrite($fp, $vet);
    fclose($fp);
    //header("location:apresentacao.php");
?>