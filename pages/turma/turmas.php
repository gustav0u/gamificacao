<?php
    $conexao = Conexao::getInstance();
    $sql = $conexao->query("select * from sala;");
    $counter = 3;
    while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
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