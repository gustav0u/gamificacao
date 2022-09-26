<?php
try{
#Definição do objeto de conexão PDO
$conexao = new PDO('mysql:host=localhost;dbname=vendaSimples','root','');
#Configurar para mostrar os erros do PDO
$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
#Executa uma consulta
$consulta = $conexao->query("SELECT * FROM marca;");
#percorrer os dados
while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
echo "Código:{$linha['codigo']} - Descrição:{$linha['descricao']}<br>";
}
}catch(PDOException $e){
echo "Error:".$e->getMessage();
die();
}
?>