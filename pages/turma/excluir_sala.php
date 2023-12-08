<?php
// excluir_sala.php
echo "wedewd";
die;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idSala = isset($_POST['idsala']) ? $_POST['idsala'] : null;

    if ($idSala) {
        require_once('index.php'); // Substitua pelo caminho real do seu arquivo Sala.php

        // Crie uma instância da Sala e chame o método excluir
        $sala = new Sala($idSala, '', '', '');
        $resultadoExclusao = $sala->excluir($idSala);

        // Retorne uma resposta adequada (pode ser um JSON com sucesso/erro, por exemplo)
        echo $resultadoExclusao ? "Sala excluída com sucesso!" : "Erro ao excluir sala.";
    } else {
        echo "ID da sala não fornecido.";
    }
} else {
    echo "Método de requisição inválido.";
}
?>
