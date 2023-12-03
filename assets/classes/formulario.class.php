<?php
require_once ('database.class.php');
require_once('pergunta.class.php');
    
class Formulario{
    
    //Atributos da classe
    private $id;
    private $titulo;
    private $usuario;
    private $descricao;
    private $perguntas = [];
    
    //construtor do objeto
    public function __construct($id, $titulo, $usu, $desc, $perguntas){
        $this->setId($id);
        $this->setTitulo($titulo);
        $this->setUsuario($usu);
        $this->setDescricao($desc);
        $this->setPerguntas($perguntas);
    }
    
    //Início dos Setters
    public function setId($id){
        $this->id = $id;
    }

    public function setTitulo($titulo){
        $this->titulo = $titulo;
    }

    public function setUsuario($usu){
        $this->usuario = $usu;
    }

    public function setDescricao($desc){
        $this->descricao = $desc;
    }

    public function setPerguntas($perguntas){
        $this->perguntas = Pergunta::listar(2, $this->id);
    }
    //Fim dos Setters

    //Início dos Getters
    public function getId(){
        return $this->id;
    }

    public function getTitulo(){
        return $this->titulo;
    }

    public function getUsuario(){
        return $this->usuario;
    }

    public function getDescricao(){
        return $this->descricao;
    }

    public function getPerguntas(){
        return $this->perguntas;
    }

    //Fim dos Getters

    //Métodos do banco de dados:
    public function inserir(){
        $sql = 'INSERT INTO formulario(titulo, usuario_idusuario, descricao)
                      VALUES (:titulo, :usuario, :descricao)';
        $params = array(':titulo' => $this->getTitulo(),
                        ':usuario '=> $this->getUsuario(),
                        ':descricao' => $this->getDescricao()
                    );
        return Database::executar($sql, $params);
            /* foreach ($this->perguntas as $pergunta) {
                $p = new Pergunta(0, "", "", "", "", "");
                    $p->setTipo($pergunta["tipoP"]);
                    $p->setQuestao($pergunta["pergunta"]);
                    $p->setFormulario(PDO::lastInsertId());
                    if (isset($pergunta["options"])) {
                        $p->setAlternativas($pergunta["options"]);
                    }
                    $p->inserir();
                    foreach ($p->getAlternativas() as $alternativa) {
                        $a = new Alternativa(0, "", "");
                        $a->setTexto($alternativa);
                        $a->setIdpergunta(PDO::lastInsertId());
                        $a->inserir();
                    }
                    
            } */
    }

    public function excluir(){
        $sql = 'DELETE FROM formulario 
                WHERE idformulario = :id';         
        $params = array(':id'=>$this->getId());         
        return Database::executar($sql, $params);
    }

    public function editar(){
        $sql = 'UPDATE formulario
                SET titulo = :titulo,
                    usuario  = :usuario,
                    descricao = :descricao
                WHERE   idformulario = :id';
        
        $params = array(':titulo' => $this->getTitulo(),
                        ':usuario '=> $this->getUsuario(),
                        ':descricao' => $this->getDescricao()
                    );
        return Database::executar($sql, $params);
    }
     

    public static function listar($tipo = 0, $info = ''){
        $sql = 'SELECT * FROM formulario';
        switch($tipo){
            case 1: $sql .= ' WHERE usuario_idusuario = :info'; break;
            case 2: $sql .= ' WHERE idformulario like :info';  break;
        }           
        $params = array();
        if ($tipo > 0)
            $params = array(':info'=>$info);         
        return Database::listar($sql, $params);
    }
    public function montaForm($perguntas){
        foreach ($perguntas as $value) {
            foreach ($value as $key1 => $value1) {
                // var_dump($value);
                //echo $value["pergunta"];
            if ($key1 == 'tipoP') {
                if ($value1 == 'rCurta') {
                
                    echo "<fieldset>";
                    echo $value->pergunta."<br>";
                    echo "<input type='text' name='$value->pergunta' id='$value->pergunta   '>";
                    echo "</fieldset>";
                }elseif ($value1 == 'rLonga') {
                    echo "<fieldset>";
                    echo $value->pergunta."<br>";
                    echo "<textarea name='$value->pergunta' id='$value->pergunta' cols='30' rows='10'></textarea>";
                    echo "</fieldset>";
                }elseif ($value1 == "multEsc") {
                    echo "<fieldset>";
                    echo $value->pergunta."<br>";
                    foreach ($value->options as $key => $value2) {
                        echo "<input type='checkbox' name='$value->pergunta.ckb[]' id='$value->pergunta.ckb[]' value='$value2'>$value2<br>";
                    }
                    echo "</fieldset>";
                }elseif ($value1 == "uniEsc") {
                    echo "<fieldset>";
                    echo $value->pergunta."<br>";
                    foreach ($value->options as $key => $value2) {
                        echo "<input type='radio' name='".$value->pergunta."' id='".$value->pergunta."' value='$value2'>$value2<br>";
                    }
                    echo "</fieldset>";
                }elseif ($value1 == "slc") {
                    echo "<fieldset>";
                    echo $value->pergunta."<br>";
                    echo "<select name='$value->pergunta.slc[]' id='$value->pergunta.slc[]'>";
                    foreach ($value->options as $key => $value2) {
                        echo "<option value='$value2'>$value2</option><br>";
                    }
                    echo "</select></fieldset>";
                }elseif($value1 == "date"){
                    echo "<fieldset>";
                    echo $value->pergunta."<br>";
                    echo "<input type='date' name='$value->pergunta' id='$value->pergunta'>";
                    echo "</fieldset>";
                }elseif($value1 == "time"){
                    echo "<fieldset>";
                    echo $value->pergunta."<br>";
                    echo "<input type='time' name='$value->pergunta' id='$value->pergunta'>";
                    echo "</fieldset>";
                }elseif ($value1 == "file") {
                    echo "<fieldset>";
                    echo "<form method='post' enctype='multipart/form-data'>";
                    echo $value->pergunta."<br>";
                    echo "<input type='file' name='oi' id='oi'>";
                    echo "</form>";
                    echo "</fieldset>";
                }elseif ($value1 == "scale") {
                    echo "<fieldset>";
                    echo $value->pergunta."<br>";
                    for ($l=$value->options->min; $l <= $value->options->max; $l++) { 
                        echo "<input type='radio' name='$value->pergunta.scl' id='$value->pergunta.scl' value='$l'>$l<br>";
                    }
                    echo "</fieldset>";
                }
            }
        }
        }
        echo "<input type='submit'>";
            
    }
}

?>