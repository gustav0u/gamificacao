<?php 
    
    include "header.php" ;
    $usuario = "thiaguete";
    $conexao = Conexao::getInstance();
    $consulta = $conexao->query("SELECT *, DATE_FORMAT(`dtNasc`, '%d/%m/%Y') AS `dtNasc` FROM usuario WHERE usuario = 'thiaguete'");
    while($linha=$consulta->fetch(PDO::FETCH_ASSOC)){
        $title = "@{$linha["usuario"]} em Study N' Play";
        $usuario = $linha;
    }
    include "menu.php";
?>

    <div class="container">
        <div class="space"></div>
        <div class="row">
            <div class="col-3">
                <div class="card" style="width: 100%;">
                    <img src="../assets/img/perfpadrao.jpg" class="card-img-top" alt="Perfil Padrão">
                    <div class="card-body">
                        <h5 class="card-title"><b><?= $usuario["nome"]?></b></h5>
                        <h6 class="purple">@<?= $usuario["usuario"] ?></h6>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><i class="bi bi-cake"></i>  <?= $usuario["dtNasc"] ?></li>
                        <li class="list-group-item"><i class="bi bi-file-arrow-down"></i>  Entrou em xx/xx/xxxx</li>
                        <li class="list-group-item"><i class="bi bi-envelope-at"></i> <?= $usuario["email"] ?></li>
                    </ul>
                <div class="card-body">
                    <a href="#" class="card-link purple">+ Seguir</a>
                    <a href="#" class="card-link text-success">Mensagem  <i class="bi bi-chat-left-dots"></i></a>
                </div>
            </div></div>
            <div class="col-5">
                <div class="row">
                    <div class="col-12">
                        <h4 class="purple">Isígnias:</h4>
                        <br>
                        <h1>
                            <i width="1px"><img src="https://cdn-icons-png.flaticon.com/512/25/25231.png" alt="" width="8%"></i>
                            <i class="bi bi-trophy text-success"></i>
                            <i width="1px"><img src="https://beecrowd.io/wp-content/uploads/2021/08/beecrowd__roxoHorClean-small-PNG-1.png" alt="" width="10%"></i>
                            <i class="bi bi-filetype-html text-danger"></i>
                            <i class="bi bi-filetype-java text-info"></i>
                        </h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <table class="table table-purple table-striped">
                        <thead>
                            <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Sala</th>
                            <th scope="col">Pessoas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">47615</th>
                                <td>Abelhas Programadoras</td>
                                <td>35</td>
                            </tr>
                            <tr>
                                <th scope="row">10949</th>
                                <td>Matemática em Foco</td>
                                <td>98</td>
                            </tr>
                            <tr>
                                <th scope="row">75041</th>
                                <td>Newtonianos da Física</td>
                                <td>12</td>
                            </tr>
                        </tbody>



                        </table>
                    </div>
                </div>
                
            </div>
            <div class="col-3">
                <h4 class="purple">Pontos:</h4>
                <br>
                <ul class="list-group list-group-numbered">
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                        <div class="fw-bold link" data-bs-toggle="modal" data-bs-target="#exampleModal">BeeCrowd</div>
                        Id: 744186
                        </div>
                        <span class="badge bg-warning rounded-pill">1408pts</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                        <div class="fw-bold">GitHub</div>
                        Id: @thiagow.dc
                        </div>
                        <span class="badge btn-purple rounded-pill">1229pts</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                        <div class="fw-bold">HTML cursos</div>
                        Id: 744186
                        </div>
                        <span class="badge bg-danger rounded-pill">587pts</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                        <div class="fw-bold">Programação para iniciantes</div>
                        Id: 744186
                        </div>
                        <span class="badge bg-primary rounded-pill">308pts</span>
                    </li>
                    
                </ul>
                <br>
                <div class="card text-white bg-danger mb-3" width="100%;">
                    <div class="card-header">VOCÊ VIU?</div>
                    <div class="card-body">
                        <h5 class="card-title">O SEU CLIENTE TAMBÉM VAI VER!</h5>
                        <p class="card-text">ANUNCIE CONOSCO!!!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Modal -->
<div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">BeeCrowd</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php
            $file = file_get_contents("beecrowd.json");
            $dados = json_decode($file);

        ?>
        Id: <?=$dados->id;?>
        <br>
        Nome: <?=$dados->nome;?>
        <br>
        Pontos: <?=$dados->pontos;?>
        <br>
        Resolvidos: <?=$dados->resolvidos;?>
        <br>
        Submissões: <?=$dados->submissoes;?>

      </div>
    </div>
  </div>
</div>
<?php 
    include "footer.php"
?>