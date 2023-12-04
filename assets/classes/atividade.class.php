<?php
require_once ('database.class.php');
    
class Atividade{
    
    //Atributos da classe
    private $id;
    private $post;
    private $dataentrega;
    private $valor;
    
    //construtor do objeto
    public function __construct($id, $post, $dataentrega, $valor){
        $this->setId($id);
        $this->setPost($post);
        $this->setDataE($dataentrega);
        $this->setValor($valor);
    }
    
    //Início dos Setters
    public function setId($id){
        $this->id = $id;
    }

    public function setPost($post){
        $this->post = $post;
    }

    public function setDataE($dataentrega){
        $this->dataentrega = $dataentrega;
    }

    public function setValor($valor){
        $this->valor = $valor;
    }

    //Fim dos Setters

    //Início dos Getters
    public function getId(){
        return $this->id;
    }

    public function getPost(){
        return $this->post;
    }

    public function getDataE(){
        return $this->dataentrega;
    }
    
    public function getValor(){
        return $this->valor;
    }

    //Fim dos Getters

    //Métodos do banco de dados:
    public function inserir(){
        $sql = 'INSERT INTO atividade (postagem_idpostagem, dataentrega, valor)
                      VALUES (:post, :dataentrega, :valor)';
        $params = array(':post' => $this->getPost(),
                        ':dataentrega' => $this->getDataE(),
                        ':valor' => $this->getValor()
                    );
        return Database::executar($sql, $params);
    }

    public function excluir(){
        $sql = 'DELETE FROM atividade 
                WHERE idatividade = :id';         
        $params = array(':id'=>$this->getId());         
        return Database::executar($sql, $params);
    }

    public function editar(){
        $sql = 'UPDATE atividade
                SET valor = :valor,
                dataentrega = :dataentrega,
                valor = :valor
                WHERE   idatividade = :id';
        
        $params = array(':dataentrega' => $this->getDataE(),
                        ':valor' => $this->getValor()
                    );
        return Database::executar($sql, $params);
    }
     

    public function listar($tipo = 0, $info = ''){
        $sql = 'SELECT * FROM atividade';
        switch($tipo){
            case 1: $sql .= ' WHERE idatividade = :info'; break;
            case 2: $sql .= ' WHERE postagem_idpostagem like :info';  break;
        }          
        $params = array();
        if ($tipo > 0)
            $params = array(':info'=>$info);         
        return Database::listar($sql, $params);
    }
}

?>
