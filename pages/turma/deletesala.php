<?php
// Verifica se o parâmetro 'idsala' foi enviado via GET
if (isset($_GET['idsala'])) {
    // Recupera o valor do parâmetro
    $idsala = $_GET['idsala'];

    // Conecta ao banco de dados (substitua com suas configurações)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "gamificacao";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica a conexão
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    // Prepara e executa a consulta de exclusão
    $sql = "DELETE FROM sua_tabela WHERE idsala = $idsala";

    if ($conn->query($sql) === TRUE) {
        echo "Sala excluída com sucesso!";
    } else {
        echo "Erro ao excluir sala: " . $conn->error;
    }

    // Fecha a conexão
    $conn->close();
} else {
    echo "Parâmetro 'idsala' não fornecido.";
}
?>
