<?php
require_once ('database.class.php');
require_once ('tipo.class.php');
    
class TipoAtv extends Tipo{

    public function __construct($id, $descricao){
        parent::__construct($id, $descricao);
    }

    public function inserir(){
        $sql = 'INSERT INTO tipoatv (descricao)
                     VALUES (:descricao)';
        $params = array(':descricao'=>$this->getDescricao());
       
       return Database::executar($sql, $params);
    }

    public function excluir(){
        $sql = 'DELETE FROM tipoatv 
                 WHERE idtipoatv = :id';         
        $params = array(':id'=>$this->getId());         
        return Database::executar($sql, $params);
    }

    public function editar(){
        $sql = 'UPDATE tipoatv
                   SET descricao = :descricao
                 WHERE   idtipoatv = :id';
        $params = array(':id'=>$this->getId(),
                        ':descricao'=> $this->getDescricao());
       return Database::executar($sql, $params);
       
    }
 
    public function listar($tipo = 0, $info = ''){
       $sql = 'SELECT * FROM tipoatv';
       switch($tipo){
           case 1: $sql .= ' WHERE idtipoatv = :info'; break;
       }           
       $params = array();
       if ($tipo > 0)
           $params = array(':info'=>$info);         
       return Database::listar($sql, $params);
    }
}

?>