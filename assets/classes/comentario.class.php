<?php
require_once ('../classes/database.class.php');
    
class Comentario{
    
    //Atributos da classe
    private $id;
    private $postagem;
    private $usuario;
    private $comentario;
    
    //construtor do objeto
    public function __construct($id, $postagem, $usu, $comentario){
        $this->setId($id);
        $this->setPostagem($postagem);
        $this->setUsuario($usu);
        $this->setText($comentario);
    }
    
    //Início dos Setters
    public function setId($id){
        $this->id = $id;
    }

    public function setPostagem($postagem){
        $this->postagem = $postagem;
    }

    public function setUsuario($usu){
        $this->usuario = $usu;
    }

    public function setComentario($comentario){
        $this->comentario = $comentario;
    }
    //Fim dos Setters

    //Início dos Getters
    public function getId(){
        return $this->id;
    }

    public function getPostagem(){
        return $this->postagem;
    }

    public function getUsuario(){
        return $this->usuario;
    }

    public function getComentario(){
        return $this->comentario;
    }

    //Fim dos Getters

    //Métodos do banco de dados:
    public function inserir(){
        $sql = 'INSERT INTO comentario (postagem, usuario, comentario)
                      VALUES (:postagem, :usuario, :comentario)';
        $params = array(':postagem' => $this->getPostagem(),
                        ':usuario '=> $this->getUsuario(),
                        ':comentario '=> $this->getComentario(),
                    );
        return Database::executar($sql, $params);
    }

    public function excluir(){
        $sql = 'DELETE FROM comentario 
                WHERE idcomentario = :id';         
        $params = array(':id'=>$this->getId());         
        return Database::executar($sql, $params);
    }

    public function editar(){
        $sql = 'UPDATE comentario
                SET postagem = :postagem,
                    usuario  = :usuario,
                    comentario = :comentario
                WHERE   idcomentario = :id';
        
        $params = array(':postagem' => $this->getPostagem(),
                        ':usuario'=> $this->getUsuario(),
                        ':comentario'=> $this->getComentario()
                    );
        return Database::executar($sql, $params);
    }
     

    public function listar($tipo = 0, $info = ''){
        $sql = 'SELECT * FROM comentario';
        switch($tipo){
            case 1: $sql .= ' WHERE idusuario = :info'; break;
            case 2: $sql .= ' WHERE idpostagem like :info';  break;
            case 3: $sql .= ' WHERE comentario like :info';  break;
        }          
        $params = array();
        if ($tipo > 0)
            $params = array(':info'=>$info);         
        return Database::listar($sql, $params);
    }
}

?>
