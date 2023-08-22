<?php
require_once ('../classes/database.class.php');
    
class Atividade{
    
    //Atributos da classe
    private $id;
    private $tipo;
    private $valor;
    
    //construtor do objeto
    public function __construct($id, $tipo, $valor){
        $this->setId($id);
        $this->setTipo($tipo);
        $this->setValor($valor);
    }
    
    //Início dos Setters
    public function setId($id){
        $this->id = $id;
    }

    public function setTipo($tipo){
        $this->tipo = $tipo;
    }

    public function setValor($tipo){
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

    public function getValor(){
        return $this->valor;
    }


    //Fim dos Getters

    //Métodos do banco de dados:
    public function inserir(){
        $sql = 'INSERT INTO atividade (tipo, valor)
                      VALUES (:tipo, :valor)';
        $params = array(':tipo' => $this->getTipo(),
                        ':valor' => $this->getValor()
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
                valor = :valor
                WHERE   idatividade = :id';
        
        $params = array(':tipo' => $this->getTipo(),
                        ':valor' => $this->getValor()
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
