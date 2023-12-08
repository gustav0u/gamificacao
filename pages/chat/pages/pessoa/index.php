<?php 
    require_once "../../conf/Conexao.php";
    include '../header.php'; ?>
  
    <div class="container-fluid">
    <br>
    <a class='btn btn-secondary'href="cad.php">Cadastrar</a>
    <br><br>
    <form action="" method="get">
        <fieldset>
        <legend>Consulta de pessoa</legend>

        <div class="row align-items-end">
            <div class="col-3">
                
                <input class="form-control" type="text" name="filtro" id="filtro">
            </div>
            <div class="col-1">
            <button type="submit" class="btn btn-outline-dark">Consultar</button>

            </div>
        </div>
        </fieldset>
    </form>

    <br>
    <table class="table table-striped">
    <thead>
        <tr class='table-titulo'>
            <th>Código</th>
            <th>Nome</th>
            <th>Email</th> 
            <th>Senha</th>   
            <th>Detalhes</th>
            <th>Editar</th>
            <th>Excluir</th>
        </tr>
    </thead>
    <tbody>
<?php
    $conexao = Conexao::getInstance();

    $filtro = isset($_GET['filtro']) ? $_GET['filtro']: "";
    $consulta=$conexao->query("SELECT * FROM pessoa where nome like '$filtro%';");
    
    while($linha=$consulta->fetch(PDO::FETCH_ASSOC)){
            echo "<tr>
                   <td>{$linha['codigo']}</td>
                   <td>{$linha['placa']}</td>
                   <td>{$linha['modelo']}</td>
                   <td>{$linha['ano']}</td>
                   <td><a class='btn btn-outline-info' href='show.php?codigo={$linha['codigo']}'>Info</a></td>
                   <td><a class='btn btn-warning' href='cad.php?acao=editar&codigo={$linha['codigo']}'>Editar</a></td>
                   <td><a class='btn btn-danger' onClick = 'return excluir();' href='acao.php?acao=excluir&codigo={$linha['codigo']}'.>Excluir</a></td>
                  </tr>\n";
    }
?>
</tbody>
</table>

</div>
<?php include '../footer.php'; ?>