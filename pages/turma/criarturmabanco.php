<?php
// criarturmabanco.php
include "../../conf/Conexao.php";
session_start();
$u = $_SESSION['userId'];
// Assuming you have a MySQL database

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gamificacao";

// Create connection
$conn = Conexao::getInstance();

// Process form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $nome = isset($_POST['nome']) ? $_POST["nome"] : "";
    $cor = isset($_POST['cor']) ? $_POST["cor"] : "";
    $descricao = isset($_POST['descricao']) ? $_POST["descricao"] : "";

    // SQL query to insert data into the database
    $sql = "INSERT INTO sala (nome, cor, descricao) VALUES ('$nome', '$cor', '$descricao')";
    $conn->query($sql);
        $id = $conn->lastInsertId();
        $conexao = Conexao::getInstance();
        $conexao->query("insert into sala_has_usuario (sala_idsala, usuario_idusuario, tipousu_idtipousu) values ('$id', '$u', 1)");
        header('Location: ../index.php');
}
?>
