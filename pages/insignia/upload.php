<?php
// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Verifica se há um arquivo enviado
    if (isset($_FILES["imagem"]) && $_FILES["imagem"]["error"] == UPLOAD_ERR_OK) {

        // Configurações do diretório de destino
        $diretorioDestino = "../../assets/imginsignias/";
        
        // Gera um nome único para o arquivo
        $nomeArquivo = uniqid('imagem_') . '_' . basename($_FILES["imagem"]["name"]);

        // Caminho completo para o arquivo no servidor
        $caminhoCompleto = $diretorioDestino . $nomeArquivo;

        // Move o arquivo para o diretório de destino
        if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $caminhoCompleto)) {
            // Arquivo movido com sucesso

            // Agora, insira o caminho da imagem no banco de dados
            $caminhoImagemBanco = $caminhoCompleto; // Você pode ajustar conforme necessário

            // Conexão com o banco de dados
            $conexao = new PDO("mysql:host=localhost;dbname=gamificacao", "root", "");

            // Prepara a declaração SQL para inserção
            $stmt = $conexao->prepare("INSERT INTO tipoisi (caminhoimg) VALUES (:caminhoImagem)");

            // Executa a declaração SQL
            $stmt->execute(array(':caminhoImagem' => $caminhoImagemBanco));

            header('Location: ../perfil.php');
        } else {
            // Erro ao mover o arquivo
            echo "Erro ao realizar o upload da imagem.";
        }
    } else {
        // Nenhum arquivo enviado ou erro no upload
        echo "Erro: Nenhum arquivo enviado ou ocorreu um erro no upload.";
    }
} else {
    // Requisição não é do tipo POST
    echo "Erro: Método de requisição inválido.";
}
?>
