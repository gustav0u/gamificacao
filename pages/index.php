<?php
session_start();
// Verificar se o usuário fez login
if (!isset($_SESSION['username'])) {
    // Redirecionar para a página de login
    header('Location: login/login1.php');
    exit();
}
    $title = "Gerador de Formulário";
    include "header.php";
    include "menu.php";
    include "../conf/Conexao.php";
    
    if (!isset($_SESSION['username'])) {
        // Redirecionar para a página de login
        header('Location: login/login.php');
        exit();
    }
?>
    <br>
    <div class="container-fluid">
        <div class="row">
        <?php
            include "../assets/classes/sala.class.php";
            include "turma/turmas.php";
            //echo $_SESSION["userId"];
        ?>
        </div>
        <div class="container">
            <div class="space"></div>
        <!-- Botão flutuante -->
        <div class="row justify-content-end fixed-bottom m-1">
            <div class="col-1 mr-4"> <!-- Adicionei a classe 'mr-4' para adicionar uma margem à direita -->
                <button class="margin_bottom btn btn-purple rounded-circle btn-lg" type="button" data-bs-toggle="dropdown" aria-expanded="false"><h2>&nbsp+&nbsp</h2></button>
                <ul class="dropdown-menu dropdown-menu-dark mr-4" style="position: absolute; inset: auto 0px 0px auto; margin: 0px; transform: translate3d(1.6px, -82.4px, 0px);">
                    <li><a class="dropdown-item active mr-4" data-bs-toggle="modal" data-bs-target="#exampleModal" aria-controls="exampleModal"><i class="bi bi-plus-lg"></i> Criar Turma</a></li>
                    <li><a class="dropdown-item mr-4" data-bs-toggle="modal" data-bs-target="#entrarModal" aria-controls="entrarModal" href="#"><i class="bi bi-box-arrow-in-right"></i> Entrar em uma turma</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Criar Turma</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="turma/criarturmabanco.php" method="post">
                    <h5 class="modal-title">Criar turma?</h5>
                        <div class="row">
                            
                        
                            <div class="form-group col-md-12">
                                <div class="row">
                                    <div class="col-10">
                                        <label for="nome">Nome da Turma:</label>
                                    </div>
                                    <div class="col-2">
                                        <label for="cor">Cor da Turma:</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-10">
                                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome da turma">
                                    </div>
                                    <div class="col-2">
                                        <input type="color" class="form-control" id="cor" name="cor" value="#ff0000">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="descricao">Descricao:</label>
                            <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Descreva a função da turma">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-purple">Criar</button>
                        </div>
                    </form>
            </div>
            </div>
        </div>
    </div>

    <!-- Modal entrar turma -->
    <div class="modal fade" id="entrarModal" tabindex="-1" aria-labelledby="entrarModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="entrarModal">Entrar em uma Turma</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="turma/acao.php" method="post">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <div class="row">
                                    <div class="col-12">
                                        <label for="codigo">Código da Turma:</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <input type="text" class="form-control" id="codigo" name="codigo" placeholder="Digite o código da turma">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-purple" name="acao" value="entrar">Entrar</button>
                        </div>
                    </form>
            </div>
            </div>
        </div>
    </div>

    <!-- Janela Modal -->
    <!-- <div class="modal"  id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <br><br><br><br><br><br><br><br><br><br>
                    
                    <button type="button" class="btn-close close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <form action="turma/criarturmabanco.php" method="post">
                    <h5 class="modal-title">Criar turma?</h5>
                        <div class="row">
                            
                        
                            <div class="form-group col-md-12">
                                <div class="row">
                                    <div class="col-10">
                                        <label for="nome">Nome da Turma:</label>
                                    </div>
                                    <div class="col-2">
                                        <label for="cor">Cor da Turma:</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-10">
                                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome da turma">
                                    </div>
                                    <div class="col-2">
                                        <input type="color" class="form-control" id="cor" name="cor" value="#ff0000">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="descricao">Descricao:</label>
                            <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Descreva a função da turma">
                        </div>
                        <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-purple">Continuar</button>
                </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div> -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
<?php include "footer.php";
