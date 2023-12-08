<?php
    $u = isset($_SESSION["userId"]) ? $_SESSION["userId"] : "";
    require_once 'conexao.php';
?>
<script type="text/javascript">
    function ajax(){
        var req = new XMLHttpRequest(); req.onreadystatechange = function(){
        if (req.readyState == 4 && req.status == 200) {
            document.getElementById('chat').innerHTML = req.responseText; }
        } 
        var urlAtual = window.location.href;
        var urlClass = new URL(urlAtual);
        var chat = urlClass.searchParams.get("chat");
        console.log(chat);
        req.open('GET', 'chat.php?chat='+chat, true); 
        req.send();
    }
    ajax();
    setInterval(function(){ajax();}, 1000);
</script>
<?php
    $colors = array();
    $color = json_decode(file_get_contents("colors.json"));
    foreach ($color as $key => $value) {
        $colors[$key] = $value;
    }
    if (isset($colors["chat"]) and $colors["chat"] != $c) {
        $conexao = Conexao::getInstance();
        $consulta=$conexao->query("select nome from usuario, chat_has_usuario, chat where usuario.idusuario = chat_has_usuario.usuario_idusuario and chat_has_usuario.chat_idchat = chat.idchat; ");  
        
        while($linha=$consulta->fetch(PDO::FETCH_ASSOC)){
            $colors[$linha['nome']] = random_color(); 
        }
        $colors["chat"] = $c;
        $fp = fopen("colors.json", "w");
        $json = json_encode($colors);
        fwrite($fp, $json);
        fclose($fp);
    }
    function random_color($start = 0x000000, $end = 0xFFFFFF) {
        return sprintf('#%06x', mt_rand($start, $end));
    }
?>
<div id="chat">

</div>