<?php
// criarturmabanco.php

// Assuming you have a MySQL database

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gamificacao";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $nome = mysqli_real_escape_string($conn, $_POST['nome']);
    $cor = mysqli_real_escape_string($conn, $_POST['cor']);
    $descricao = mysqli_real_escape_string($conn, $_POST['descricao']);

    // SQL query to insert data into the database
    $sql = "INSERT INTO sala (nome, cor, descricao) VALUES ('$nome', '$cor', '$descricao')";

    if ($conn->query($sql) === TRUE) {
        header('Location: ../index.php');
        } else {
        echo "Erro ao criar turma: " . $conn->error;
    }
}

// Close connection
$conn->close();
?>
