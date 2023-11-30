<?php
    include "../header.php";
    include "../menu.php";
    include "../../conf/Conexao.php";
    include "../../assets/classes/sala.class.php";
    $turma = isset($_GET["t"]) ? $_GET["t"] : 0;
    $sala = Sala::lista(1, $turma);
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
    }else {
        $fonte = "white";
        $font = $sala["cor"];
    }
?>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-12" >
                <div class="card" style="background-color:<?=$sala["cor"]?>;">
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
                    <a class="nav-link active" style="background-color:<?=$font?>; color: <?=$fonte?>;" href="#">Participantes</a>
                </li>
            </ul>
            </div>
        </div>
    </div>
<?php
    include "../footer.php";
?>