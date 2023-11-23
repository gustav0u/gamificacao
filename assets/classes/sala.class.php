<?php
require_once ('database.class.php');
    
class Sala{
    
    //Atributos da classe
    private $id;
    private $nome;
    private $cor;
    private $descricao;
    
    //construtor do objeto
    public function __construct($id, $nome, $cor, $descricao){
        $this->setId($id);
        $this->setNome($nome);
        $this->setId($cor);
        $this->setNome($descricao);
    }
    
    //Início dos Setters
    public function setId($id){
        $this->id = $id;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }
    
    public function setCor($cor){
        $this->cor = $cor;
    }

    public function setDescricao($descricao){
        $this->descricao = $descricao;
    }

    //Fim dos Setters

    //Início dos Getters
    public function getId(){
        return $this->id;
    }

    public function getNome(){
        return $this->nome;
    }

    public function getCor(){
        return $this->cor;
    }

    public function getDescricao(){
        return $this->descricao;
    }


    //Fim dos Getters

    //Métodos do banco de dados:
    public function inserir(){
        $sql = 'INSERT INTO sala (nome, cor, descricao)
                      VALUES (:nome, :cor, :descricao)';
        $params = array(':nome' => $this->getNome(),
                        ':cor' => $this->getCor(),
                        ':descricao' => $this->getDescricao()
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
                SET nome = :nome,
                cor = :cor,
                descricao = :descricao
                WHERE   idsala = :id';
        
        $params = array(':nome' => $this->getNome(),
                        ':cor' => $this->getCor(),
                        ':descricao' => $this->getDescricao()
                    );
        return Database::executar($sql, $params);
    }
     

    static public function listar($tipo = 0, $info = ''){
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

