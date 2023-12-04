<div class="space"></div>
<div class="container">
    <div class="col-12">
<?php
    session_start();
    $title = "Apresentação Formulário";
    include "../header.php";
    include "../../conf/Conexao.php";
    include "../../assets/classes/formulario.class.php";
    $f = $_GET["formulario"];
    $form = Formulario::listar(2, $f);
    $conexao = Conexao::getInstance();
    $perguntas = $conexao->query("select * from formulario, pergunta where pergunta.formulario_idformulario = formulario.idformulario and formulario_idformulario = $f");
    $conn = Conexao::getInstance();
    $form = $conexao->query("select * from formulario, pergunta where pergunta.formulario_idformulario = formulario.idformulario and formulario_idformulario = $f");
    $form = $form->fetch(PDO::FETCH_ASSOC);
    echo '<div class="card border-dark mb-3">';
                        echo '<div class="card-header">Bem vindo <b>'.$_SESSION["username"].'</b>! Responda com calma e confiança, não tenha pressa o formulário fica disponível por tempo indeterminado!</div>';
                        echo '<div class="card-body">';
                            echo '<h5 class="card-title">Formulário: <b>#'.$form["idformulario"]."</b> ".$form["titulo"].'</h5>';
                            echo '<p class="card-text">'.$form["descricao"].'</p>';
                        echo "</div>";
                    echo "</div>";
    montaForm($perguntas, $f);
    function montaForm($perguntas, $f){
        echo '<input type="hidden" name="formulario" value="'.$f.'">';

        while ($linha = $perguntas->fetch(PDO::FETCH_ASSOC)) {
            $id = $linha["idpergunta"];
            $conn = Conexao::getInstance();
            $alternativa = $conn->query("select * from alternativa where pergunta_idpergunta = $id");

                if ($linha["tipoper_idtipoper"] == '1') {
                    echo '<div class="card border-dark mb-3">';
                        echo '<div class="card-header">Responda com poucas palavras:</div>';
                        echo '<div class="card-body">';
                            echo '<h5 class="card-title">'.$linha["questao"].'</h5>';
                            echo '<p class="card-text"><input class="form-control" type="text" name="'.$linha["idpergunta"].'" id="'.$linha["idpergunta"].'"></p>';
                        echo "</div>";
                    echo "</div>";
                }elseif ($linha["tipoper_idtipoper"] == '2') {
                    echo '<div class="card border-dark mb-3">';
                        echo '<div class="card-header">Responda com um parágrafo ou mais:</div>';
                        echo '<div class="card-body">';
                            echo '<h5 class="card-title">'.$linha["questao"].'</h5>';
                            echo '<p class="card-text"><textarea class="form-control" type="text" name="'.$linha["idpergunta"].'" id="'.$linha["idpergunta"].'"></textarea></p>';
                        echo "</div>";
                    echo "</div>";
                }elseif ($linha["tipoper_idtipoper"] == "3") {
                    echo '<div class="card border-dark mb-3">';
                        echo '<div class="card-header">Assinale uma ou mais alternativas:</div>';
                        echo '<div class="card-body">';
                            echo '<h5 class="card-title">'.$linha["questao"].'</h5>';
                            echo '<p class="card-text">';
                            while ($alt = $alternativa->fetch(PDO::FETCH_ASSOC)) {
                                echo '<div class="form-check"><input class="form-check-input" type="checkbox" name="'.$alt["pergunta_idpergunta"].'[]" id="'.$alt["pergunta_idpergunta"].'[]" value="'.$alt["idalternativa"].'">';
                                echo '<label class="form-check-label" for="'.$alt["pergunta_idpergunta"].'[]">
                                '.$alt["texto"].'
                                     </label></div>'; 
                            }
                            echo '</p>';
                        echo "</div>";
                    echo "</div>";
                }elseif ($linha["tipoper_idtipoper"] == "4") {
                    echo '<div class="card border-dark mb-3">';
                        echo '<div class="card-header">Assinale uma alternativa apenas:</div>';
                        echo '<div class="card-body">';
                            echo '<h5 class="card-title">'.$linha["questao"].'</h5>';
                            echo '<p class="card-text">';
                            while ($alt = $alternativa->fetch(PDO::FETCH_ASSOC)) {
                                echo '<div class="form-check"><input class="form-check-input" type="radio" name="'.$alt["pergunta_idpergunta"].'[]" id="'.$alt["pergunta_idpergunta"].'[]" value="'.$alt["idalternativa"].'">';
                                echo '<label class="form-check-label" for="'.$alt["pergunta_idpergunta"].'[]">
                                '.$alt["texto"].'
                                     </label></div>'; 
                            }
                            echo '</p>';
                        echo "</div>";
                    echo "</div>";
                }elseif ($linha["tipoper_idtipoper"] == "5") {
                    echo '<div class="card border-dark mb-3">';
                        echo '<div class="card-header">Escolha uma alternativa:</div>';
                        echo '<div class="card-body">';
                            echo '<h5 class="card-title">'.$linha["questao"].'</h5>';
                            echo '<p class="card-text"><select class="form-select" name="'.$linha["idpergunta"].'[]" id="'.$linha["idpergunta"].'[]">';
                            while ($alt = $alternativa->fetch(PDO::FETCH_ASSOC)) {
                                echo '<option value="'.$alt["idalternativa"].'">'.$alt["texto"].'</option>';
                            }
                            echo '</select></p>';
                        echo "</div>";
                    echo "</div>";
                    echo "<fieldset>";
                }elseif($linha["tipoper_idtipoper"] == "6"){
                    echo '<div class="card border-dark mb-3">';
                        echo '<div class="card-header">Responda com a data que se refere a:</div>';
                        echo '<div class="card-body">';
                            echo '<h5 class="card-title">'.$linha["questao"].'</h5>';
                            echo '<p class="card-text"><input class="form-control" type="date" name="'.$linha["idpergunta"].'" id="'.$linha["idpergunta"].'"></p>';
                        echo "</div>";
                    echo "</div>";
                }elseif($linha["tipoper_idtipoper"] == "7"){
                    echo '<div class="card border-dark mb-3">';
                        echo '<div class="card-header">Responda com um horário:</div>';
                        echo '<div class="card-body">';
                            echo '<h5 class="card-title">'.$linha["questao"].'</h5>';
                            echo '<p class="card-text"><input class="form-control" type="time" name="'.$linha["idpergunta"].'" id="'.$linha["idpergunta"].'"></p>';
                        echo "</div>";
                    echo "</div>";
                }elseif ($linha["tipoper_idtipoper"] == "8") {
                    echo '<div class="card border-dark mb-3">';
                        echo '<div class="card-header">Envie Sua Resposta em Forma de Arquivo:</div>';
                        echo '<div class="card-body">';
                            echo '<h5 class="card-title">'.$linha["questao"].'</h5>';
                            echo '<p class="card-text"><input class="form-control" type="file" name="'.$linha["idpergunta"].'" id="'.$linha["idpergunta"].'"></p>';
                        echo "</div>";
                    echo "</div>";
                }
        }
        echo '<div class="row justify-content-end"><button  class="btn btn-outline-success col-2" type="submit" id="acao" name="acao" value="responder"><i class="bi bi-pen"></i> Enviar Resposta</button></div>';
            
    }
    $script = "../../assets/js/funcao.js";
    include "../footer.php"; 
?>
    </div>
</div>