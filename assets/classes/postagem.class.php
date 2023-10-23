<?php
require_once ('database.class.php');
    
class Postagem{
    
    //Atributos da classe
    private $id;
    private $formulario;
    private $usuario;
    
    //construtor do objeto
    public function __construct($id, $formulario, $usu){
        $this->setId($id);
        $this->setFormulario($formulario);
        $this->setUsuario($usu);
    }
    
    //Início dos Setters
    public function setId($id){
        $this->id = $id;
    }

    public function setFormulario($formulario){
        $this->formulario = $formulario;
    }

    public function setUsuario($usu){
        $this->usuario = $usu;
    }
    //Fim dos Setters

    //Início dos Getters
    public function getId(){
        return $this->id;
    }

    public function getFormulario(){
        return $this->formulario;
    }

    public function getUsuario(){
        return $this->usuario;
    }

    //Fim dos Getters

    //Métodos do banco de dados:
    public function inserir(){
        $sql = 'INSERT INTO postagem (formulario, usuario)
                      VALUES (:formulario, :usuario)';
        $params = array(':formulario' => $this->getFormulario(),
                        ':usuario '=> $this->getUsuario(),
                    );
        return Database::executar($sql, $params);
    }

    public function excluir(){
        $sql = 'DELETE FROM postagem 
                WHERE idpostagem = :id';         
        $params = array(':id'=>$this->getId());         
        return Database::executar($sql, $params);
    }

    public function editar(){
        $sql = 'UPDATE formulario
                SET formulario = :formulario,
                    usuario  = :usuario
                WHERE   idpostagem = :id';
        
        $params = array(':formulario' => $this->getFormulario(),
                        ':usuario '=> $this->getUsuario()
                    );
        return Database::executar($sql, $params);
    }
     

    public function listar($tipo = 0, $info = ''){
        $sql = 'SELECT * FROM formulario';
        switch($tipo){
            case 1: $sql .= ' WHERE idusuario = :info'; break;
            case 2: $sql .= ' WHERE idformulario like :info';  break;
            case 3: $sql .= ' WHERE idpostagem like :info';  break;
        }          
        $params = array();
        if ($tipo > 0)
            $params = array(':info'=>$info);         
        return Database::listar($sql, $params);
    }
}

?>
