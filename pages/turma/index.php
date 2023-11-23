<?php
    include "../menu.php";
    include "../../conf/Conexao.php";
    include "../../assets/classes/sala.class.php";
    $turma = isset($_GET["t"]) ? $_GET["t"] : 0;
    $sala = Sala::listar(1, $turma);
    var_dump($sala);
?>
    <div class="container">
        <div class="row">

        </div>
    </div>
<?php
    include "../footer.php";
?>