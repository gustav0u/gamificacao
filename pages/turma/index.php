<?php
    include "../header.php";
    include "../menu.php";
    include "../../conf/Conexao.php";
    include "../../assets/classes/sala.class.php";
    $turma = isset($_GET["t"]) ? $_GET["t"] : 0;
    $sala = Sala::lista(1, $turma);
?>
    <div class="container">
        <div class="row justify-content-between text-between">
            <div class="col-12">
            <ul class="nav nav-pills nav-justified">
                <li class="nav-item">
                    <a class="nav-link" href="#">Atividades</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" style="background-color:<?php echo $sala["cor"]?>;" href="#">Postagens</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Participantes</a>
                </li>
            </ul>
            </div>
        </div>
    </div>
<?php
    include "../footer.php";
?>