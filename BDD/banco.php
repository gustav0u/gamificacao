<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detalhes</title>
    <?php
        $pesquisar = isset($_POST['pesquisar']) ? $_POST['pesquisar']: "";
    ?>
</head>
<body>
   <form method="post">
        Pesquisar<input type="text" name="pesquisar" id="pesquisar">
        <input type="submit" name="" id="">
   </form>
   <br>
    <table border=1>
        <tr></tr><th>Codigo</th><th>nome</th><th>pontos</th><th>detalhes</th><th>excluir</th></tr>
        <?php
            try{
            # bloco protegido
            # definição do objeto de conexão pdo
            $conexao = new PDO('mysql:host=200.135.58.24;dbname=gamificacao','game','G7654321o');

            #configurar para mostrar os erros do PDO
            $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
            #executa uma consulta 
            $consulta = $conexao->query("select * from times where nome like '$pesquisar%' order by pontos desc");
           
          
            $cont = 0;
                
            #percorrer os dados
            while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
              
                $total = $consulta -> rowCount();
                $cont ++;
                
                if($total - $cont < 4){
                    echo "<tr style='color: red'> ";
                }
                else{
                    echo "<tr> ";
                }
                if($cont == 1){
                    echo "<td><img src='img/trof2.png' height='25'></td><td>{$linha['nome']}</td><td>{$linha['pontos']}</td><td><a href='acao.php?codigo={$linha['codigo']}'>detalhes</a></td><td><a onClick='return confirm(\"Deseja excluir?\")' href='excluir.php?codigo={$linha['codigo']}'>excluir</a></td></tr>";
                }
                else {
                    echo "<td>{$linha['codigo']}</td><td>{$linha['nome']}</td><td>{$linha['pontos']}</td><td><a href='acao.php?codigo={$linha['codigo']}'>detalhes</a></td><td><a onClick='return confirm(\"Deseja excluir?\")' href='excluir.php?codigo={$linha['codigo']}'>excluir</a></td></tr>";
                }
            }   
            }catch(PDOException $e){
                # bloco que captura o erro
                echo "error:".$e->getMessage();
                die();
            }
        ?>
    </table>
    </fieldset>
</body>
</html>