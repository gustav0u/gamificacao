<?php
    include "../../conf/Conexao.php";
    include "../../assets/classes/sala.class.php";
    $turma = isset($_GET["t"]) ? $_GET["t"] : 0;
    $sala = Sala::lista(1, $turma);
    session_start();
    $u = $_SESSION["userId"];
    $hexa = $sala["cor"];
    $r = hexdec(substr($hexa,1,2)); // Se for sem o #, mude para 0, 2
    $g = hexdec(substr($hexa,3,2)); // Se for sem o #, mude para 3, 2
    $b = hexdec(substr($hexa,5,2)); // Se for sem o #, mude para 5, 2
    $title = "#".$sala["idsala"]." Sala: ".$sala["nome"]." - Participantes";
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
                <div class="card" style="background-color:<?=$sala["cor"]?>; color:<?=$fonte?>;">
                    <div class="card-body">
                        <h4 class="card-title"><?=$sala["nome"]?></h4>
                        <p class="card-text"><?=$sala["descricao"]?></p>
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
                        <a class="nav-link" style="color: <?=$font?>;" aria-current="page"  href="index.php?t=<?=$turma?>">Postagens</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" style="background-color:<?=$bg?>; border: 1px solid <?=$font?>; color: <?=$fonte?>;" href="#">Participantes</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="space"></div>
        <div class="row justify-content-center text-start">
            <div class="col-12" >
                <div class="card" style="border: 2px solid <?=$font?>; background-color: <?=$bg?>;">
                    <div class="card-body" >
                        <div class="card-header">
                        <h5 class="card-title" style="color:<?=$fonte?>;">Adicionar Participantes:</h5>
                            <div class="row  justify-content-between text-center">
                            <div class="col-6">
                                <div class="card-subtitle" style="color:<?=$fonte?>;"><br>Convidar para a turma:</div>
                                    <p><h3>
                                        <select class="form-select rounded-4" name="" id="">
                                            <option value="">Abuble</option>
                                            <option value="">Bananna</option>
                                            <option value="">Carrot</option>
                                        </select>
                                    
                                </div>
                                <div class="col-4">
                                <div class="card-subtitle" style="color:<?=$fonte?>;"><br>Código de Entrada da Turma:</div>
                                    <p class="card-text bg-white"><h3 class="bg-white rounded-4">BDOCJF0923 <i role="button" class="bi bi-eye-fill"></i></h3></p>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="space"></div>
        <div class="row" style="color:<?=$font?>">
            <div class="col-12">
                <h5>
                    Professores
                </h5>
            </div>
            <hr class="opacity-100">
        </div>
        <div class="row">
            <div class="col-12">
            <table class="table" style="color:<?=$font?>">
                <tbody id="professores">
                    
                </tbody>
            </table>
            </div>
        </div>
        <div class="row" style="color:<?=$font?>">
            <div class="col-12">
                <h5>
                    Alunos
                </h5>
            </div>
            <hr class="opacity-100">
        </div>
        <div class="row">
            <div class="col-12">
            <table class="table" style="color:<?=$font?>">
                <tbody id="alunos">
                    
                </tbody>
            </table>
            </div>
        </div>
    </div>
    <script>
        function professor(){
                var req = new XMLHttpRequest(); req.onreadystatechange = function(){
                if (req.readyState == 4 && req.status == 200) {
                    document.getElementById('professores').innerHTML = req.responseText; }
                }
                var urlAtual = window.location.href;
                var urlClass = new URL(urlAtual);
                var sala = urlClass.searchParams.get("t");
                console.log(sala);
                req.open('GET', 'usuario_turmaloader.php?t='+sala+"&tipo=1", true); 
                req.send();
            }
            professor();

            function aluno(){
                var req = new XMLHttpRequest(); req.onreadystatechange = function(){
                if (req.readyState == 4 && req.status == 200) {
                    document.getElementById('alunos').innerHTML = req.responseText; }
                }
                var urlAtual = window.location.href;
                var urlClass = new URL(urlAtual);
                var sala = urlClass.searchParams.get("t");
                console.log(sala);
                req.open('GET', 'usuario_turmaloader.php?t='+sala+"&tipo=2", true); 
                req.send();
            }
            aluno();
    </script>
<?php
    include "../footer.php";
?>