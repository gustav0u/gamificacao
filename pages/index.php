    <?php
    session_start();

    // Verificar se o usuário fez login
    if (!isset($_SESSION['username'])) {
        // Redirecionar para a página de login
        header('Location: login/login.html');
        exit();
    }
        $title = "Gerador de Formulário";
        include "header.php";
        include "menu.php";
        include "../conf/Conexao.php";
    ?>
    <html lang="en">
    <body>
    <br>

    <div class="container-fluid">
        <div class="row">
        <?php
            include "../assets/classes/sala.class.php";
            include "turma/turmas.php";
            echo $_SESSION["userId"];
        ?>
        </div>
        <div class="container">
        <div class="space"></div>
    <!-- Botão flutuante -->
    <div class="row justify-content-end fixed-bottom m-1">
        <div class="col-1 mr-4"> <!-- Adicionei a classe 'mr-4' para adicionar uma margem à direita -->
            <a href="#" class="margin_bottom btn btn-purple btn-circle btn-lg" id="openModal">
                <i class="fas fa-plus">+</i>
            </a>
        </div>
    </div>
</div>

<!-- Janela Modal -->
<div class="modal" tabindex="-1" role="dialog" id="myModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Criar turma?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="turma/criarturmabanco.php" method="post">
                    <div class="row">
                        <!-- Nome da Turma -->
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
                        <!-- Descricao -->
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
</div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function(){
        $("#openModal").click(function(){
            $("#myModal").modal();
        });
    });
</script>

</body>
</html>


        <!-- Adicione a referência ao jQuery e ao Bootstrap JS se ainda não estiverem presentes -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
    </html>
