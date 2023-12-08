<?php 
    include '../header.php'; 
    include 'acao.php';

    $acao = isset($_GET['acao']) ? $_GET['acao'] : '';
    $dados = array();
    if ($acao == 'editar'){
        $codigo = isset($_GET['codigo']) ? $_GET['codigo'] : '';
        $dados = findById($codigo);
        //var_dump($dados);
    }
    
    
?>

<div class="container-fluid">
<br>
<a class='btn btn-secondary'href="cons.php">Consultar</a>

<form action="acao.php" method="post">
    <fieldset>
        <legend>Cadastro de Pessoa</legend>
        <div class="row">
            <div class="col-2">
                <label class="form-label" for="codigo">Código</label>
                <input class="form-control" type="text" name="codigo" id="codigo" readonly
                value="<?php if ($acao == 'editar') echo $dados['codigo']; else echo '0'; ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <label class="form-label" for="nome">Nome</label>
                <input class="form-control" type="text" name="nome" id="nome" placeholder="Informe seu nome" required
                value="<?php if ($acao == 'editar') echo $dados['nome'];?>">
            </div>
        </div>
        <div class="row">
            <div class="col-2">
                <label class="form-label" for="email">E-mail</label>
                <input class="form-control" type="text" name="email" id="email" placeholder="exemplo@gmail.com"required
                value="<?php if ($acao == 'editar') echo $dados['email'];?>">
            </div>
            <div class="col-2">
                <label class="form-label" for="senha">Senha</label>
                <input class="form-control" type="text" name="senha" id="senha" placeholder="********" required
                value="<?php if ($acao == 'editar') echo $dados['senha'];?>">
            </div>    
        </div>
        <br>
        <div class="row">
            <div class="col-2">
                <button class="form-control btn btn-dark" type="submit" 
                    value="salvar" name="acao" id="acao"> 
                    <?php if ($acao == 'editar') echo "Editar"; else echo "Inserir"?>
                </button>
            </div>
        </div>
    </fieldset>
</form>   

</div>

<?php include '../footer.php'; ?>