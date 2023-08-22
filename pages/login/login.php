<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Verifique as credenciais (substitua este trecho com sua lógica de verificação real)
    if ($username === "usuario" && $password === "senha") {
        echo "Login bem-sucedido! Bem-vindo, $username.";
    } else {
        echo "Credenciais inválidas. Tente novamente.";
    }
}
?>
