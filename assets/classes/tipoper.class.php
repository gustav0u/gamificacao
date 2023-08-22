<?php
require_once ('../classes/database.class.php');
require_once ('../classes/tipo.class.php');
    
class TipoPxer extends Tipo{

    public function __construct($id, $descricao){
        parent::__construct($id, $descricao);
    }

    public function inserir(){
        $sql = 'INSERT INTO tipoper (descricao)
                     VALUES (:descricao)';
        $params = array(':descricao'=>$this->getDescricao());
       
       return Database::executar($sql, $params);
    }

    public function excluir(){
        $sql = 'DELETE FROM tipoper 
                 WHERE idtipoper = :id';         
        $params = array(':id'=>$this->getId());         
        return Database::executar($sql, $params);
    }

    public function editar(){
        $sql = 'UPDATE tipoper
                   SET descricao = :descricao
                 WHERE   idtipoper = :id';
        $params = array(':id'=>$this->getId(),
                        ':descricao'=> $this->getDescricao());
       return Database::executar($sql, $params);
       
    }
 
    public function listar($tipo = 0, $info = ''){
       $sql = 'SELECT * FROM tipoper';
       switch($tipo){
           case 1: $sql .= ' WHERE idtipoper = :info'; break;
       }           
       $params = array();
       if ($tipo > 0)
           $params = array(':info'=>$info);         
       return Database::listar($sql, $params);
    }
}

?>