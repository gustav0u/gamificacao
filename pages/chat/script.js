setTimeout(function(){
    window.scroll(0, document.body.scrollHeight, 'smooth');
}, 4000); 
function verificarScroll() {
    const scrollY = (document.getElementById("chatmessages").scrollHeight/100)*70+document.getElementById("chatmessages").scrollTop;
    const scroll2 = document.getElementById("chatmessages").scrollHeight;
    if (scrollY <= scroll2 && scroll2 > 900) {
        console.log(scrollY+"espacio"+scroll2);
        document.getElementById("botaoDescer").innerHTML = '<button id="descer" class="btn btn-purple"><i class="bi bi-chevron-double-down"></i> Descer</button>';
        document.getElementById("descer").setAttribute("onclick", "descer()");
    }else{
        document.getElementById("botaoDescer").innerHTML = '';
        console.log(scrollY+"espacio"+scroll2);
    }
};
function descer(){
    document.getElementById("chatmessages").scroll({
        top: document.getElementById("chatmessages").scrollHeight,
        left: 0,
        behavior: "smooth",
      });
}

function mensagem(){
    var mensagem = document.getElementById('msg').value;
    var req = new XMLHttpRequest(); req.onreadystatechange = function(){
    if (req.readyState == 4 && req.status == 200) {
        document.getElementById('msg').value = 'Enviando...'; 
        document.getElementById('msg').setAttribute("readonly", true);
        setTimeout(function(){
            document.getElementById('msg').value = ''; 
            document.getElementById('msg').removeAttribute("readonly");
            
        }, 1500); 
    }
    } 
    var urlAtual = window.location.href;
    var urlClass = new URL(urlAtual);
    var chat = urlClass.searchParams.get("chat");
    if (mensagem) {
        req.open('GET', 'acao.php?acao=mensagem&msg='+mensagem+'&chat='+chat, true); 
        req.send(); 
    }
    
} 