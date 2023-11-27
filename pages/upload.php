<?php
session_start();

// Conexão com o banco de dados (substitua as credenciais conforme necessário)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gamificacao";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se o arquivo foi enviado sem erros
    if (isset($_FILES["fileInput"]) && $_FILES["fileInput"]["error"] == 0) {
        $target_dir = "../assets/imgusuarios/";
        $target_file = $target_dir . basename($_FILES["fileInput"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Verifica se o arquivo é uma imagem
        $allowedTypes = array("jpg", "jpeg", "png", "gif");
        if (in_array($imageFileType, $allowedTypes)) {
            // Move o arquivo para o diretório de destino
            if (move_uploaded_file($_FILES["fileInput"]["tmp_name"], $target_file)) {
                // Atualiza a coluna imguser na tabela usuario
                $sql = "UPDATE usuario SET imguser = '" . basename($_FILES["fileInput"]["name"]) . "' WHERE idusuario = idusuario";

                if ($conn->query($sql) === TRUE) {
                    // Armazena o caminho da imagem na variável de sessão
                    $_SESSION['user_image'] = $target_file;
                    header('Location: perfil.php');
                } else {
                    echo "Erro ao atualizar imagem: " . $conn->error;
                }
            } else {
                echo "Erro ao mover o arquivo para o diretório de destino.";
            }
        } else {
            echo "Somente arquivos JPG, JPEG, PNG e GIF são permitidos.";
        }
    } else {
        echo "Erro no envio do arquivo.";
    }
}

// Fecha a conexão com o banco de dados
$conn->close();
?>
