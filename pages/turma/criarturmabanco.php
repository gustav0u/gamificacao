<?php
// criarturmabanco.php
include "../../conf/Conexao.php";
include "../../assets/classes/codsala.class.php";
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
    $letras = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 6); // Gera 6 letras aleatórias
    $numeros = str_pad(rand(0, 9999), 4, "0", STR_PAD_LEFT); // Gera 4 números aleatórios
    $codigo = $letras . $numeros;
    for ($i=0; $i < 1; $i++) { 
        $codesala = Codsala::listar(2, $codigo);
        if ($codesala != false) {
            $letras = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 6); // Gera 6 letras aleatórias
            $numeros = str_pad(rand(0, 9999), 4, "0", STR_PAD_LEFT); // Gera 4 números aleatórios
            $codigo = $letras . $numeros;
            $i--;
        }
    }
    // SQL query to insert data into the database
    $sql = "INSERT INTO sala (nome, cor, descricao) VALUES ('$nome', '$cor', '$descricao')";
    $conn->query($sql);
        $id = $conn->lastInsertId();
        $conexao = Conexao::getInstance();
        $conexao->query("insert into sala_has_usuario (sala_idsala, usuario_idusuario, tipousu_idtipousu) values ('$id', '$u', 1)");
        $codesala = new Codsala($codigo, $id);
        var_dump($codesala->inserir());
        header('Location: ../index.php');
}
?>
