<?php
    $title = "Gerador de Formulário";
    include "../header.php";
    session_start();
    include "../menu.php";
?>
<script src="../../assets/js/funcao.js"></script>
<div class="space"></div>
<div class="container">
    <div class="row">
    <form method="post" action="acao.php" class="col col-12">
        <div class="row"> 
            <div class="col-2"></div>
            <div class="col-8"><input type="text" placeholder="Nome do Formulário" class="form-control" id="nomeform" name="nomeform"></div>
            <div class="col-2"></div>
        </div>
        <div class="row"> 
            <div class="col-2"></div>
            <div class="col-8"><input type="text" placeholder="Descrição" class="form-control" id="descricao" name="descricao"></div>
            <div class="col-2"></div>
        </div>

        <div class="row"> 
            <div class="col-2"></div>
            <div class="col-8"><div id="form"></div></div>
            <div class="col-2"></div>
        </div>
        <div class="row justify-content-between">
            
            <div class="col-2"></div>
            <div class="col-8"><hr><button type="button" class="btn btn-purple" onclick="maisUm()">+</button><button type="submit" id="acao" name="acao" class="btn btn-purple" value="salvar">Gravar Questionário</button></div>
            <div class="col-2"></div>
        </div>
        
    </form>
    <div class="col col-2"></div>
    </div>
</div>
<?php 
    $script = "../../assets/js/funcao.js";
    include "../footer.php"; 
?>