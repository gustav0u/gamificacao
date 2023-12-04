<?php 
    include "../conf/Conexao.php";
    include "header.php" ;
    session_start();
    $u = isset($_GET["u"]) ? $_GET["u"] : $_SESSION["userId"];
    $conexao = Conexao::getInstance();
    $consulta = $conexao->query("SELECT *, DATE_FORMAT(`dtNasc`, '%d/%m/%Y') AS `dtNasc` FROM usuario WHERE idusuario = '$u'");
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
            <div class="card" style="width: 100%; position: relative;">
                <img src="<?=URL_BASE?>assets/imgusuarios/<?php echo isset($usuario["imguser"]) ?$usuario["imguser"] : '../assets/img/perfpadrao.jpg'; ?>"  class="card-img-top" alt="Perfil Padrão" id="profileImage" data-bs-toggle="modal" data-bs-target="#uploadModal" width="100%">       
                    <div class="card-body">
                        <h5 class="card-title"><b><?= $usuario["nome"]?></b></h5>
                        <h6 class="purple">@<?= $usuario["usuario"] ?></h6>
                        <p class="card-text">
                            <?php
                                echo "{$usuario["nome"]} nasceu em {$usuario["dtNasc"]} na Cidade de Londrina, seu pai se chama Pedro e sua mãe Regina ";
                            ?>
                        </p>
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
            <div class="col-6">
                <div class="row">
                    <div class="col-12">
                        <h4 class="purple">Insígnias: <i role="button" class="bi bi-plus-circle " onclick="toggleCanvas()"></i></h4>
            
                        <br>
                        <h1>
                            <i width="1px"><img src="https://cdn-icons-png.flaticon.com/512/25/25231.png" alt="" width="8%"></i>
                            <i class="bi bi-trophy text-success"></i>
                            <i width="1px"><img src="https://beecrowd.io/wp-content/uploads/2021/08/beecrowd__roxoHorClean-small-PNG-1.png" alt="" width="10%"></i>
                            <i class="bi bi-filetype-html text-danger"></i>
                            <i class="bi bi-filetype-java text-info"></i>
                            <i>      <!-- Botão de insígnia -->
  
    <img src="../assets/img/addinsignia.png" width="20" alt=""  class="toggle-button" onclick="toggleCanvas()">
  
    <div class="off-canvas" id="myCanvas">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <br><br><br> 
        <h3 class="">Inserir Insígnia: </h3>
        <form action="insignia/upload.php" method="post" enctype="multipart/form-data">
          <div class="mb-3">
            <input type="file" class="form-control" id="imagem" name="imagem" accept="image/*">
          </div>
          <button type="submit" class="btn btn-success">Enviar</button>
          <!-- Botão para fechar o off-canvas -->
          <button type="button" class="btn btn-purple" onclick="toggleCanvas()">Fechar</button>
        </form>
      </div>
    </div>
  </div>
</div>


</i>
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
                <ul class="list-group list-group-numbered" width="100%">
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
                        <span class="badge btn btn-purple rounded-pill">1229pts</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                        <div class="fw-bold">HTML cursos</div>
                        Id: 744186
                        </div>
                        <span class="badge btn bg-danger rounded-pill">587pts</span>
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


<!-- Modal do Bootstrap -->
<div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="uploadModalLabel">Escolher uma foto de perfil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <div class="modal-body">
                    <form action="upload.php" method="post" enctype="multipart/form-data">
                        <div id="liveAlertPlaceholder" class="col-12"></div>
                        <label for="fileInput" class="form-label">Escolher uma foto de perfil:</label>
                        <input type="file" class="form-control" id="fileInput" name="fileInput" accept="image/*" required>
                        <div class="modal-footer">
                    <button type="input" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button id="saveUserImg"type="input" class="btn btn-primary" disabled onclick="uploadImage()">Salvar</button>
                </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
    <script>
    function openModal() {
    var modal = document.getElementById('myModal');
    modal.style.display = 'block';
}

function closeModal() {
    var modal = document.getElementById('myModal');
    modal.style.display = 'none';
}
  function toggleCanvas() {
    var canvas = document.getElementById("myCanvas");
    if (canvas.style.left === "0px") {
      canvas.style.left = "-250px";
    } else {
      canvas.style.left = "0px";
    }
  }
const input = document.getElementById('fileInput');
const salvar = document.getElementById('saveUserImg')

input.addEventListener('change', function() {
  const file = this.files[0];
  const img = new Image();

  img.onload = function() {
    const width = this.width;
    const height = this.height;

    if (width === height) {
        salvar.removeAttribute("disabled");
        var container = document.getElementById('liveAlertPlaceholder');

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
            var image = document.createElement('img');
            image.src = e.target.result;
            container.innerHTML = "";
            image.setAttribute("width", "100%")
            container.appendChild(image);
            }

            reader.readAsDataURL(input.files[0]);
        }

    } else {
        salvar.setAttribute("disabled", "true");
        const alertPlaceholder = document.getElementById('liveAlertPlaceholder');
        alertPlaceholder.innerHTML = "";
        const appendAlert = (message, type) => {
        const wrapper = document.createElement('div');
        wrapper.innerHTML = [
            `<div class="alert alert-${type} alert-dismissible" role="alert">`,
            `   <div>${message}</div>`,
            '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
            '</div>'
        ].join('');

        alertPlaceholder.append(wrapper);
    }
     appendAlert('<i class="bi bi-exclamation-triangle-fill"></i> Por Favor, selecione uma imagem quadrada', 'warning')
    }
  };

  img.src = URL.createObjectURL(file);
});


</script>
<?php 
    include "footer.php"
?>