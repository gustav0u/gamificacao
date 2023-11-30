<?php
require_once ('database.class.php');
    
class Postagem{
    
    //Atributos da classe
    private $id;
    private $texto;
    private $usuario;
    private $data;
    
    //construtor do objeto
    public function __construct($id, $texto, $usu, $data){
        $this->setId($id);
        $this->setTexto($texto);
        $this->setUsuario($usu);
        $this->setData($data);

    }
    
    //Início dos Setters
    public function setId($id){
        $this->id = $id;
    }

    public function setTexto($texto){
        $this->texto = $texto;
    }

    public function setUsuario($usu){
        $this->usuario = $usu;
    }

    public function setData($data){
        $this->data = $data;
    }
    //Fim dos Setters

    //Início dos Getters
    public function getId(){
        return $this->id;
    }

    public function getTexto(){
        return $this->texto;
    }

    public function getUsuario(){
        return $this->usuario;
    }

    public function getData(){
        return $this->data;
    }

    //Fim dos Getters

    //Métodos do banco de dados:
    public function inserir(){
        $sql = 'INSERT INTO postagem (usuario_idusuario, texto, `data`)
                      VALUES (:usuario, :texto, :data)';
        $params = array(':usuario' => $this->getUsuario(),
                        ':texto' => $this->getTexto(),
                        ':data' => $this->getData()
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
        $sql = 'UPDATE texto
                SET texto = :texto,
                    usuario  = :usuario
                WHERE   idpostagem = :id';
        
        $params = array(':texto' => $this->getTexto(),
                        ':usuario '=> $this->getUsuario()
                    );
        return Database::executar($sql, $params);
    }
     

    public static function listar($tipo = 0, $info = ''){
        $sql = 'SELECT * FROM postagem';
        switch($tipo){
            case 1: $sql .= ' WHERE usuario_idusuario = :info'; break;
            case 3: $sql .= ' WHERE idpostagem like :info';  break;
        }          
        $params = array();
        if ($tipo > 0)
            $params = array(':info'=>$info);         
        return Database::listar($sql, $params);
    }
}

?>
