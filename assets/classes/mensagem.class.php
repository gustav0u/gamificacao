<?php
require_once ('../classes/database.class.php');
    
class Mensagem{
    
    //Atributos da classe
    private $id;
    private $chat;
    private $usuario;
    private $mensagem;
    
    //construtor do objeto
    public function __construct($id, $chat, $usu, $mensagem){
        $this->setId($id);
        $this->setChat($chat);
        $this->setUsuario($usu);
        $this->setMensagem($mensagem);
    }
    
    //Início dos Setters
    public function setId($id){
        $this->id = $id;
    }

    public function setChat($chat){
        $this->chat = $chat;
    }

    public function setUsuario($usu){
        $this->usuario = $usu;
    }

    public function setMensagem($mensagem){
        $this->mensagem = $mensagem;
    }
    //Fim dos Setters

    //Início dos Getters
    public function getId(){
        return $this->id;
    }

    public function getChat(){
        return $this->chat;
    }

    public function getUsuario(){
        return $this->usuario;
    }

    public function getMensagem(){
        return $this->mensagem;
    }

    //Fim dos Getters

    //Métodos do banco de dados:
    public function inserir(){
        $sql = 'INSERT INTO mensagem (chat, usuario, mensagem)
                      VALUES (:chat, :usuario, :mensagem)';
        $params = array(':chat' => $this->getChat(),
                        ':usuario '=> $this->getUsuario(),
                        ':mensagem '=> $this->getMensagem(),
                    );
        return Database::executar($sql, $params);
    }

    public function excluir(){
        $sql = 'DELETE FROM mensagem 
                WHERE idmensagem = :id';         
        $params = array(':id'=>$this->getId());         
        return Database::executar($sql, $params);
    }

    public function editar(){
        $sql = 'UPDATE mensagem
                SET chat = :chat,
                    usuario  = :usuario,
                    mensagem = :mensagem
                WHERE   idmensagem = :id';
        
        $params = array(':chat' => $this->getChat(),
                        ':usuario'=> $this->getUsuario(),
                        ':mensagem'=> $this->getMensagem()
                    );
        return Database::executar($sql, $params);
    }
     

    public function listar($tipo = 0, $info = ''){
        $sql = 'SELECT * FROM mensagem';
        switch($tipo){
            case 1: $sql .= ' WHERE idusuario = :info'; break;
            case 2: $sql .= ' WHERE idchat like :info';  break;
            case 3: $sql .= ' WHERE mensagem like :info';  break;
        }          
        $params = array();
        if ($tipo > 0)
            $params = array(':info'=>$info);         
        return Database::listar($sql, $params);
    }
}

?>
