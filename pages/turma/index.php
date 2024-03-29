<?php
    include "../../conf/Conexao.php";
    include "../../assets/classes/sala.class.php";
    session_start();
    if (!isset($_SESSION['username'])) {
        // Redirecionar para a página de login
        header('Location: ../login/login1.php');
        exit();
    }
    $u = $_SESSION['userId'];
    $turma = isset($_GET["t"]) ? $_GET["t"] : 0;
    if ($turma == 0) {
        header("location:../index.php");
    }
    $sala = Sala::lista(1, $turma);
    $title = "#".$sala["idsala"]." Sala: ".$sala["nome"];
    $hexa = $sala["cor"];
    $r = hexdec(substr($hexa,1,2)); // Se for sem o #, mude para 0, 2
    $g = hexdec(substr($hexa,3,2)); // Se for sem o #, mude para 3, 2
    $b = hexdec(substr($hexa,5,2)); // Se for sem o #, mude para 5, 2
    $luminosidade = ( $r * 299 + $g * 587 + $b * 114) / 1000;
    if( $luminosidade > 128 ) {
        $fonte = "black";
        $r -= 100;
        $b -= 100;
        $g -= 100;
        $font = "rgb($r, $g, $b)";
        $bg = $sala["cor"];
    }else {
        $fonte = "white";
        $font = $sala["cor"];
        $bg = "rgb($r, $g, $b)";
    }
    include "../header.php";
    include "../menu.php";
?>


    <br>
    <div class="container">
        
        <div class="row">
            <div class="col-12" >
                <div class="card" style="background-color:<?=$sala["cor"]?>;">
                    <div class="card-body">
                        <h4 class="card-title" style="color:<?=$fonte?>"><?=$sala["nome"]?></h4>
                        <p class="card-text" style="color:<?=$fonte?>"><?=$sala["descricao"]?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="space"></div>
        <div class="row justify-content-between text-between">
            <div class="col-12">
            <ul class="nav nav-pills nav-justified">
                <li class="nav-item">
                    <a class="nav-link" style="color: <?=$font?>;" href="atividade.php?t=<?=$turma?>">Atividades</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" style="background-color:<?=$bg?>; border: 1px solid <?=$font?>; color: <?=$fonte?>;" href="#">Postagens</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color: <?=$font?>;" href="participantes.php?t=<?=$turma?>">Participantes</a>
                </li>
            </ul>
            </div>
        </div>
        <br>
        <div class="row justify-content-center text-start">
            <div class="col-10" >
                <div class="card" style="border: 2px solid <?=$font?>; background-color: <?=$bg?>;">
                    <div class="card-body">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-1">
                                    <img class="img rounded-circle" src="<?=URL_BASE."assets/imgusuarios/".$_SESSION["user_image"]?>" alt="" width="100%">
                                </div>
                                <div class="col-11">
                                <div class="form-floating">
                                    <form action="acao.php" method="post">
                                        <div class="input-group mb-3">
                                            <input type="hidden" name="turma" value="<?=$turma?>">
                                            <textarea class="form-control" style="max-height: 200px; overflow:scroll" placeholder="Seu comentário aqui" id="texto" name="texto" required></textarea>
                                            <button type="button" class="btn btn-success" data-bs-toggle="offcanvas" data-bs-target="#modalPost" aria-controls="offcanvasTop"><i class="bi bi-recycle"></i></button>
                                            <button type="submit" name="acao" value="post" class="btn btn-secondary">Postar</button>
                                        </div>
                                    </form>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div id="post"></div>
        <script type="text/javascript">
       
            function ajax(){
                var req = new XMLHttpRequest(); req.onreadystatechange = function(){
                if (req.readyState == 4 && req.status == 200) {
                    document.getElementById('post').innerHTML = req.responseText; }
                }
                var urlAtual = window.location.href;
                var urlClass = new URL(urlAtual);
                var sala = urlClass.searchParams.get("t");
                console.log(sala);
                req.open('GET', 'postloader.php?t='+sala+"&tipo=1", true); 
                req.send();
            }
            ajax();

            function posts(){
                var req = new XMLHttpRequest(); req.onreadystatechange = function(){
                if (req.readyState == 4 && req.status == 200) {
                    document.getElementById('posts').innerHTML = req.responseText; }
                }
                var urlAtual = window.location.href;
                var urlClass = new URL(urlAtual);
                var sala = urlClass.searchParams.get("t");
                console.log(sala);
                req.open('GET', 'postloader.php?t='+sala+'&tipo=2', true); 
                req.send();
            }
            posts();

            function loadComment(local, post, fonte){
                req = new XMLHttpRequest(); 
                req.onreadystatechange = function(){
                if (req.readyState == 4 && req.status == 200) {
                    document.getElementById('comentarios'+local).innerHTML = req.responseText; 
                }
                }
                var urlAtual = window.location.href;
                var urlClass = new URL(urlAtual);
                console.log(local);
                req.open('POST', 'commentloader.php?post='+post+'&fonte='+fonte, true); 
                req.send(); 
            }
            function reutilizar(local){
                document.getElementById("texto").innerHTML = document.getElementById("reuse"+local).innerHTML;
            }
        </script>
    </div>
    <div class="offcanvas offcanvas-top" tabindex="-1" id="modalPost" aria-labelledby="offcanvasTopLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasTopLabel">Clique para reutilizar um Post</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div id="posts" class="offcanvas-body">
            
        </div>
    </div>
<?php
    include "../footer.php";
?>