
<?php 
 session_start();
 if (isset($_SESSION['email']))
   header('Location:../index.php');
    include '../header.php'; 
    include 'acaouser.php'; 
    $acao=isset($_GET['acao']) ? $_GET['acao'] : "";
    $codigo=isset($_GET['codigo']) ? $_GET['codigo'] : "";
    $dados= array();
    if ($acao == 'editar') {
        $dados=findById($codigo);
    }
?>
<div class="container-fluid">
<br>
<form action="acaouser.php" method="post">

    <fieldset>
        <div class= "centro"> <legend>Login</legend></div>
       
        <div class="">
            <div class="col-6 mx-auto">
                <label class="form-label" for="email">Email</label>
                <input class="form-control" type="text" name="email" id="email" placeholder="xxx@xxx.com" value="<?php if($acao == 'editar') echo $dados['email']; ?>"required>
            </div>  
</div>
        <div class="col-6 mx-auto">
                <label class="form-label" for="pass">Senha</label>
                <input class="form-control" type="password" name="pass" id="pass" placeholder="***" value="<?php if($acao == 'editar') echo $dados['pass']; ?>" required>
            </div>    
        </div>
        <br>
        <div class="">
            <div class="col-6 mx-auto">
                <button class="form-control btn btn-primary" type="submit" value="login" name="acao" id="acao">Login</button>
            </div>
        </div>
    </fieldset>
</form>  
<div class="">
        <div class="col-6 mx-auto"> Não possui conta? <a href="caduser.php">Cadastre-se</a></div>
    </div> 
</div>
<div class="container">
    
</div>


<?php include '../footer.php'; ?>