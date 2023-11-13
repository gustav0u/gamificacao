<?php
// Este é um exemplo simples, e você pode precisar adaptá-lo ao seu ambiente e banco de dados específicos.

// Conecte-se ao banco de dados (substitua com suas próprias credenciais)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gamificacao";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifique a conexão
if ($conn->connect_error) {
    die("Conexão com o banco de dados falhou: " . $conn->connect_error);
}

// Processar a consulta de pesquisa
// Processar a consulta de pesquisa
if (isset($_GET['q'])) {
    $search_query = $_GET['q'];

    // Garanta que $search_query seja seguro para usar em uma consulta SQL
    $search_query = mysqli_real_escape_string($conn, $search_query);

    // Execute a consulta no banco de dados (substitua com sua própria consulta)
    $sql = "SELECT * FROM usuario WHERE nome LIKE '$search_query%'";
    $result = $conn->query($sql);

    // Manipule os resultados da consulta (exiba ou processe conforme necessário)
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "Nome: " . $row['nome'] . "<br>";
            // Adicione mais campos conforme necessário
        }
    } else {
        echo "Nenhum resultado encontrado.";
    }
}


// Feche a conexão com o banco de dados
$conn->close();
?>
