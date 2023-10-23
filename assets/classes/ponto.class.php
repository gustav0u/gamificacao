<?php
require_once ('database.class.php');
    
class Ponto{
    
    //Atributos da classe
    private $id;
    private $quantidade;
    private $usuario;
    private $sala;
    
    //construtor do objeto
    public function __construct($id, $quantidade, $usu, $sala){
        $this->setId($id);
        $this->setQuantidade($quantidade);
        $this->setUsuario($usu);
        $this->setSala($sala);
    }
    
    //Início dos Setters
    public function setId($id){
        $this->id = $id;
    }

    public function setQuantidade($quantidade){
        $this->quantidade = $quantidade;
    }

    public function setUsuario($usu){
        $this->usuario = $usu;
    }

    public function setSala($sala){
        $this->sala = $sala;
    }
    //Fim dos Setters

    //Início dos Getters
    public function getId(){
        return $this->id;
    }

    public function getQuantidade(){
        return $this->quantidade;
    }

    public function getUsuario(){
        return $this->usuario;
    }

    public function getSala(){
        return $this->sala;
    }

    //Fim dos Getters

    //Métodos do banco de dados:
    public function inserir(){
        $sql = 'INSERT INTO ponto (quantidade, usuario, sala)
                      VALUES (:quantidade, :usuario, :sala)';
        $params = array(':quantidade' => $this->getQuantidade(),
                        ':usuario '=> $this->getUsuario(),
                        ':sala '=> $this->getSala(),
                    );
        return Database::executar($sql, $params);
    }

    public function excluir(){
        $sql = 'DELETE FROM ponto 
                WHERE idponto = :id';         
        $params = array(':id'=>$this->getId());         
        return Database::executar($sql, $params);
    }

    public function editar(){
        $sql = 'UPDATE ponto
                SET quantidade = :quantidade,
                    usuario  = :usuario,
                    sala = :sala
                WHERE   idponto = :id';
        
        $params = array(':quantidade' => $this->getQuantidade(),
                        ':usuario'=> $this->getUsuario(),
                        ':sala'=> $this->getSala()
                    );
        return Database::executar($sql, $params);
    }
     

    public function listar($tipo = 0, $info = ''){
        $sql = 'SELECT * FROM ponto';
        switch($tipo){
            case 1: $sql .= ' WHERE idusuario = :info'; break;
            case 3: $sql .= ' WHERE sala like :info';  break;
        }          
        $params = array();
        if ($tipo > 0)
            $params = array(':info'=>$info);         
        return Database::listar($sql, $params);
    }
}

?>
