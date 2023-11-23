<?php

    $salas = Sala::listar();
    $sala = isset($_GET["t"]) ? $_GET["t"] : "";
    $counter = 3;
    while ($linha = $salas) {
        if ($counter == 3) {
            echo '
                </div>
                <br>
                <div class="row">
            ';
            $counter = 0;

        }
        echo '
            <div class="col-md-4" >
                <div class="card" style="background-color:'.$linha["cor"].';">
                    <div class="card-body">
                        <h5 class="card-title">'.$linha["nome"].'</h5>
                        <p class="card-text">'.$linha["descricao"].'</p>
                        <a href="turma/index.php?t='.$linha["idsala"].'" class="btn btn-purple">Abrir turma</a>
                    </div>
                </div>
            </div>
        ';
        $counter++;
    }
?>