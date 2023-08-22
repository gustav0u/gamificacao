<?php
require_once ('../classes/database.class.php');
require_once('../classes/pergunta.class.php');
    
class Formulario{
    
    //Atributos da classe
    private $id;
    private $titulo;
    private $usuario;
    private $descricao;
    private $perguntas;
    
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
        return $this->desc;
    }

    public function getPerguntas(){
        return $this->perguntas;
    }

    //Fim dos Getters

    //Métodos do banco de dados:
    public function inserir(){
        $sql = 'INSERT INTO formulario (titulo, usuario, descricao)
                      VALUES (:titulo, :usuario, :descricao)';
        $params = array(':titulo' => $this->getTitulo(),
                        ':usuario '=> $this->getUsuario(),
                        ':descricao' => $this->getDescricao()
                    );
        return Database::executar($sql, $params);
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
     

    public function listar($tipo = 0, $info = ''){
        $sql = 'SELECT * FROM formulario';
        switch($tipo){
            case 1: $sql .= ' WHERE idusuario = :info'; break;
            case 2: $sql .= ' WHERE descricao like :info';  break;
        }           
        $params = array();
        if ($tipo > 0)
            $params = array(':info'=>$info);         
        return Database::listar($sql, $params);
    }
}

?>