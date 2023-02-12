 
<?php
session_start();
if (isset($_SESSION['email']))
    header('Location:../index.php');
?>
<?php
   require_once "../../conf/Conexao.php";
    include '../header.php'; ?>
    <div class="container-fluid">
    <br>
    <a class='btn btn-dark'href="./caduser.php">Cadastrar Usuário</a>
    <br>
    <form action="" method="get">
    <fieldset>
        <legend>Consulta de Usuário</legend>

        <div class="row align-items-end">
            <div class="col-3">
                <input class="form-control" type="text" name="filtro" id="filtro">
            </div>
            <div class="col-1">
            <button type="submit" class="btn btn-success">Consultar</button>

            </div>
        </div>
        </fieldset>
    </form>
    <br>
    <table class="table table-white table-striped">
    <thead>
        <tr class='table-titulo'>
            <th>Código</th>
            <th>Nome</th>
            <th>Nome de usuário</th> 
            <th>Email</th>
            <th>Editar</th>
            <th>Excluir</th>
        </tr>
    </thead>
    <tbody>
<?php
    $conexao = Conexao::getInstance();

    $filtro = isset($_GET['filtro']) ? $_GET['filtro']: "";
    $consulta=$conexao->query("SELECT * FROM usuario where nome like '$filtro%';");
    
    while($linha=$consulta->fetch(PDO::FETCH_ASSOC)){
            echo "<tr> 
                   <td>{$linha['codigo']}</td>
                   <td>{$linha['nome']}</td>
                   <td>{$linha['usuar']}</td>
                   <td>{$linha['email']}</td>
                   <td><a class='' href='../usuario/caduser.php?acao=editar&codigo={$linha['codigo']}'><img src='../../assets/img/editar.png' width='25' ></a></td>
                   <td><a class='btn btn-danger' onClick = 'return excluir();' href='../usuario/acaouser.php?acao=excluir&codigo={$linha['codigo']}'.>Excluir</a></td>
                  </tr>\n";
    }
?>
</tbody>
</table>

</div>
<?php include '../footer.php'; ?>