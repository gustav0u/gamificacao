<?php 
    include '../header.php'; 
    include 'acaouser.php'; 
    $acao=isset($_GET['acao']) ? $_GET['acao'] : "";
    $codigo=isset($_GET['codigo']) ? $_GET['codigo'] : "";
    $dados= array();
    if ($acao == 'editar') {
        $dados=findById($codigo);
    }
?>
<div class="tudo">
<div class="container-fluid">
<br><br><br>
<head>
</head>
<form action="acaouser.php" method="post">
    <fieldset>
        <legend>Cadastro de usuario</legend>
     <div class="row">
            <div class="col-2">
                <input class="form-control" type="text" name="codigo" id="codigo" value="<?php if($acao == 'editar') echo $dados['codigo']; else echo "0"; ?>" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <label class="form-label" for="nome">Nome</label>
                <input class="form-control" type="text" name="nome" id="nome" placeholder="Informe seu nome" value="<?php if($acao == 'editar') echo $dados['nome']; ?>" required>
        </div>
</div>     
        <div class="row">
            <div class="col-md-2">
                <label class="form-label" for="email">Email</label>
                <input class="form-control" type="text" name="email" id="email" placeholder="xxx@xxx.com" value="<?php if($acao == 'editar') echo $dados['email']; ?>"required>
            </div>  
            <div class="row">
            <div class="col-md-2">
                <label class="form-label" for="usuar">Nome de usuário</label>
                <input class="form-control" type="text" name="usuar" id="usuar" placeholder="User:" value="<?php if($acao == 'editar') echo $dados['usuar']; ?>" required>
            </div>    
            <div class="col-md-2">
                <label class="form-label" for="pass">Senha</label>
                <input class="form-control" type="password" name="pass" id="pass" placeholder="***" value="<?php if($acao == 'editar') echo $dados['pass']; ?>" required>
            </div>
            </div>
           
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <button class="form-control btn btn-primary" type="submit" value="salvar" name="acao" id="acao"> <?php if ($acao == 'editar') echo 'Editar'; else echo 'Inserir'; ?></button>
            </div>
        </div>
    </fieldset>
</form>   
</div>
</div>
<?php include '../footer.php'; ?>