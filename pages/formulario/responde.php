<?php
    include "../../conf/Conexao.php";
    $t = $_GET["t"];
?>
<form id="form" action="acao.php?t=<?=$t?>" method="post">

</form>
<script>
    function ajax(){
        var req = new XMLHttpRequest(); req.onreadystatechange = function(){
        if (req.readyState == 4 && req.status == 200) {
            document.getElementById('form').innerHTML = req.responseText; 
        }
        }
        var urlAtual = window.location.href;
        var urlClass = new URL(urlAtual);
        var form = urlClass.searchParams.get("f");
        console.log(form);
        req.open('GET', 'apresentacao.php?formulario='+form, true); 
        req.send();
    }
    ajax();
</script>