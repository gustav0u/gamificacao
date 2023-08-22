<?php
require_once ('../classes/database.class.php');
    
class Sala{
    
    //Atributos da classe
    private $id;
    private $nome;
    
    //construtor do objeto
    public function __construct($id, $nome){
        $this->setId($id);
        $this->setNome($nome);
    }
    
    //Início dos Setters
    public function setId($id){
        $this->id = $id;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    //Fim dos Setters

    //Início dos Getters
    public function getId(){
        return $this->id;
    }

    public function getNome(){
        return $this->nome;
    }


    //Fim dos Getters

    //Métodos do banco de dados:
    public function inserir(){
        $sql = 'INSERT INTO sala (nome)
                      VALUES (:nome)';
        $params = array(':nome' => $this->getNome()
                    );
        return Database::executar($sql, $params);
    }

    public function excluir(){
        $sql = 'DELETE FROM sala 
                WHERE idsala = :id';         
        $params = array(':id'=>$this->getId());         
        return Database::executar($sql, $params);
    }

    public function editar(){
        $sql = 'UPDATE sala
                SET nome = :nome
                WHERE   idsala = :id';
        
        $params = array(':nome' => $this->getNome()
                    );
        return Database::executar($sql, $params);
    }
     

    public function listar($tipo = 0, $info = ''){
        $sql = 'SELECT * FROM sala';
        switch($tipo){
            case 1: $sql .= ' WHERE idsala = :info'; break;
            case 3: $sql .= ' WHERE nome like :info';  break;
        }          
        $params = array();
        if ($tipo > 0)
            $params = array(':info'=>$info);         
        return Database::listar($sql, $params);
    }
}

?>
