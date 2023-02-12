<?php
function buildSelect($bd, $chave, $valor, $selecao){
    require_once "../../conf/conexao.php";
    $conexao = Conexao::getInstance();
    $sql = "SELECT * FROM ".$bd;
    $consulta=$conexao->query($sql);
    while($linha=$consulta->fetch(PDO::FETCH_ASSOC)){
        if ($linha[$chave] == $selecao) {       
        }
        echo "<option value='{$linha['codigo_tipo']}'>{$linha['$chave']}</option>";
   }
}
?>