<?php
require_once ('../classes/database.class.php');
    
class Pergunta{
    
    //Atributos da classe
    private $id;
    private $tipo;
    private $questao;
    
    //construtor do objeto
    public function __construct($id, $tipo, $questao){
        $this->setId($id);
        $this->setTipo($tipo);
        $this->setQuestao($questao);
    }
    
    //Início dos Setters
    public function setId($id){
        $this->id = $id;
    }

    public function setTipo($tipo){
        $this->tipo = $tipo;
    }

    public function setQuestao($tipo){
        $this->tipo = $tipo;
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


    //Fim dos Getters

    //Métodos do banco de dados:
    public function inserir(){
        $sql = 'INSERT INTO atividade (tipo, questao)
                      VALUES (:tipo, :questao)';
        $params = array(':tipo' => $this->getTipo(),
                        ':questao' => $this->getQuestao()
                    );
        return Database::executar($sql, $params);
    }

    public function excluir(){
        $sql = 'DELETE FROM atividade 
                WHERE idatividade = :id';         
        $params = array(':id'=>$this->getId());         
        return Database::executar($sql, $params);
    }

    public function editar(){
        $sql = 'UPDATE atividade
                SET tipo = :tipo,
                questao = :questao
                WHERE   idatividade = :id';
        
        $params = array(':tipo' => $this->getTipo(),
                        ':questao' => $this->getQuestao()
                    );
        return Database::executar($sql, $params);
    }
     

    public function listar($tipo = 0, $info = ''){
        $sql = 'SELECT * FROM atividade';
        switch($tipo){
            case 1: $sql .= ' WHERE idatividade = :info'; break;
            case 3: $sql .= ' WHERE tipo like :info';  break;
        }          
        $params = array();
        if ($tipo > 0)
            $params = array(':info'=>$info);         
        return Database::listar($sql, $params);
    }
}

?>
