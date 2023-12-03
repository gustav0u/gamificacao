<?php
require_once ('database.class.php');
require_once ('alternativa.class.php');
    
class Pergunta{
    
    //Atributos da classe
    private $id;
    private $tipo;
    private $questao;
    private $formulario;
    public $alternativas = [];
    
    //construtor do objeto
    public function __construct($id, $tipo, $questao, $alternativas, $formulario){
        $this->setId($id);
        $this->setTipo($tipo);
        $this->setQuestao($questao);
        $this->setFormulario($formulario);
        $this->setAlternativas($alternativas);
    }
    
    //Início dos Setters
    public function setId($id){
        $this->id = $id;
    }

    public function setTipo($tipo){
        $this->tipo = $tipo;
    }

    public function setQuestao($questao){
        $this->questao = $questao;
    }

    public function setFormulario($formulario){
        $this->formulario = $formulario;
    }

    public function setAlternativas($alternativas){
        $this->alternativas = $alternativas;
    }


    //Fim dos Setters

    //Início dos Getters
    public function getId(){
        return $this->id;
    }

    public function getTipo(){
        return $this->tipo;
    }

    public function getQuestao(){
        return $this->questao;
    }

    public function getFormulario(){
        return $this->formulario;
    }

    public function getAlternativas(){
        return $this->alternativas;
    }


    //Fim dos Getters

    //Métodos do banco de dados:
    public function inserir(){
        $sql = 'INSERT INTO pergunta (tipoper_idtipoper, questao, formulario_idformulario)
                      VALUES (:tipo, :questao, :formulario)';
        $params = array(':tipo' => $this->getTipo(),
                        ':questao' => $this->getQuestao(),
                        ':formulario' => $this->getFormulario()
                    );
        return Database::executar($sql, $params);
    }

    public function excluir(){
        $sql = 'DELETE FROM pergunta 
                WHERE idpergunta = :id';         
        $params = array(':id'=>$this->getId());         
        return Database::executar($sql, $params);
    }

    public function editar(){
        $sql = 'UPDATE pergunta
                SET tipo = :tipo,
                questao = :questao,
                formulario_idformulario = :formulario,
                WHERE   idpergunta = :id';
        
        $params = array(':tipo' => $this->getTipo(),
                        ':questao' => $this->getQuestao()
                    );
        return Database::executar($sql, $params);
    }
     

    public static function listar($tipo = 0, $info = ''){
        $sql = 'SELECT * FROM pergunta';
        switch($tipo){
            case 1: $sql .= ' WHERE idpergunta = :info'; break;
            case 2: $sql .= ' WHERE formulario_idformulario = :info'; break;
        }          
        $params = array();
        if ($tipo > 0)
            $params = array(':info'=>$info);         
        return Database::listar($sql, $params);
    }

    public function addAlternativa($alternativa){
        $this->alternatias[] = $alternativa;
    }

}

?>
