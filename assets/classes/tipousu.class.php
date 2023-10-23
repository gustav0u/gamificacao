<?php
require_once ('database.class.php');
require_once ('tipo.class.php');
    
class TipoUsu extends Tipo{

    public function __construct($id, $descricao){
        parent::__construct($id, $descricao);
    }

    public function inserir(){
        $sql = 'INSERT INTO tipousu (descricao)
                     VALUES (:descricao)';
        $params = array(':descricao'=>$this->getDescricao());
       
       return Database::executar($sql, $params);
    }

    public function excluir(){
        $sql = 'DELETE FROM tipousu 
                 WHERE idtipousu = :id';         
        $params = array(':id'=>$this->getId());         
        return Database::executar($sql, $params);
    }

    public function editar(){
        $sql = 'UPDATE tipousu
                   SET descricao = :descricao
                 WHERE   idtipousu = :id';
        $params = array(':id'=>$this->getId(),
                        ':descricao'=> $this->getDescricao());
       return Database::executar($sql, $params);
       
    }
 
    public function listar($tipo = 0, $info = ''){
       $sql = 'SELECT * FROM tipousu';
       switch($tipo){
           case 1: $sql .= ' WHERE idtipousu = :info'; break;
       }           
       $params = array();
       if ($tipo > 0)
           $params = array(':info'=>$info);         
       return Database::listar($sql, $params);
    }
}

?>