<?php
abstract class Tipo{

    private $id = 0;    // int
    private $descricao;      // string

    public function __construct($id, $descricao){
       $this->setId($id);
       $this->setLado($descricao);
    }

    /**
     * GET ID lê a informação do atributo ID
     */
    public function getId(){
       return $this->id;
    }
    /**
     * SET ID define ou altera o valor do atributo ID
     */
    public function setId($id){
       $this->id = $id;
    }

    public function getDescricao(){
       return $this->descricao;
    }

    public function setDescricao($descricao){
        $this->descricao = $descricao;
    }

    public abstract function listar();
    public abstract function inserir();
    public abstract function excluir();
    public abstract function editar();
}
?>