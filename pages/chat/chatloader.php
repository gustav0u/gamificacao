<script type="text/javascript">
    function ajax(){
        var req = new XMLHttpRequest(); req.onreadystatechange = function(){
        if (req.readyState == 4 && req.status == 200) {
            document.getElementById('chats').innerHTML = req.responseText; }
        }
        var urlAtual = window.location.href;
        var urlClass = new URL(urlAtual);
        var chat = urlClass.searchParams.get("chat");
        console.log(chat);
        req.open('GET', 'chats.php?chat='+chat, true); 
        req.send();
    }
    ajax();
    setInterval(function(){ajax();}, 1000);
</script>