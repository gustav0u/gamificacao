<?php
require_once ('database.class.php');
    
class Isignia{
    
    //Atributos da classe
    private $id;
    private $descricao;
    private $usuario;
    private $tipo;
    
    //construtor do objeto
    public function __construct($id, $descricao, $usu, $tipo){
        $this->setId($id);
        $this->setDescricao($descricao);
        $this->setUsuario($usu);
        $this->setTipo($tipo);
    }
    
    //Início dos Setters
    public function setId($id){
        $this->id = $id;
    }

    public function setDescricao($descricao){
        $this->descricao = $descricao;
    }

    public function setUsuario($usu){
        $this->usuario = $usu;
    }

    public function setTipo($tipo){
        $this->tipo = $tipo;
    }
    //Fim dos Setters

    //Início dos Getters
    public function getId(){
        return $this->id;
    }

    public function getDescricao(){
        return $this->descricao;
    }

    public function getUsuario(){
        return $this->usuario;
    }

    public function gettsetTipo(){
        return $this->tipo;
    }

    //Fim dos Getters

    //Métodos do banco de dados:
    public function inserir(){
        $sql = 'INSERT INTO isignia (descricao, usuario, tipo)
                      VALUES (:descricao, :usuario, :tipo)';
        $params = array(':descricao' => $this->getDescricao(),
                        ':usuario '=> $this->getUsuario(),
                        ':tipo '=> $this->gettsetTipo(),
                    );
        return Database::executar($sql, $params);
    }

    public function excluir(){
        $sql = 'DELETE FROM isignia 
                WHERE idisignia = :id';         
        $params = array(':id'=>$this->getId());         
        return Database::executar($sql, $params);
    }

    public function editar(){
        $sql = 'UPDATE isignia
                SET descricao = :descricao,
                    usuario  = :usuario,
                    tipo = :tipo
                WHERE   idisignia = :id';
        
        $params = array(':descricao' => $this->getDescricao(),
                        ':usuario'=> $this->getUsuario(),
                        ':tipo'=> $this->gettsetTipo()
                    );
        return Database::executar($sql, $params);
    }
     

    public function listar($tipo = 0, $info = ''){
        $sql = 'SELECT * FROM isignia';
        switch($tipo){
            case 1: $sql .= ' WHERE idusuario = :info'; break;
            case 2: $sql .= ' WHERE tipo like :info';  break;
        }          
        $params = array();
        if ($tipo > 0)
            $params = array(':info'=>$info);         
        return Database::listar($sql, $params);
    }
}

?>
