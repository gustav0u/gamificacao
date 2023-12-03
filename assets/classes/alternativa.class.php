<?php
require_once ('database.class.php');
    
class Alternativa{
    
    //Atributos da classe
    private $id;
    private $texto;
    private $idpergunta;
    private $correta;
    
    //construtor do objeto
    public function __construct($id, $texto, $idpergunta, $correta){
        $this->setId($id);
        $this->setTexto($texto);
        $this->setIdpergunta($idpergunta);
        $this->setCorreta($correta);
    }
    
    //Início dos Setters
    public function setId($id){
        $this->id = $id;
    }

    public function setTexto($texto){
        $this->texto = $texto;
    }

    public function setIdpergunta($idpergunta){
        $this->idpergunta = $idpergunta;
    }

    public function setCorreta($correta){
        $this->correta = $correta;
    }

    //Fim dos Setters

    //Início dos Getters
    public function getId(){
        return $this->id;
    }

    public function getTexto(){
        return $this->texto;
    }

    public function getIdpergunta(){
        return $this->idpergunta;
    }

    public function getCorreta(){
        return $this->correta;
    }


    //Fim dos Getters

    //Métodos do banco de dados:
    public function inserir(){
        $sql = 'INSERT INTO alternativa (texto, pergunta_idpergunta, correta)
                      VALUES (:texto, :idpergunta, :correta)';
        $params = array(':texto' => $this->getTexto(),
                        ':idpergunta' => $this->getIdpergunta(),
                        ':correta' => $this->getCorreta()
                    );
        return Database::executar($sql, $params);
    }

    public function excluir(){
        $sql = 'DELETE FROM alternativa 
                WHERE idalternativa = :id';         
        $params = array(':id'=>$this->getId());         
        return Database::executar($sql, $params);
    }

    public function editar(){
        $sql = 'UPDATE alternativa
                SET texto = :texto,
                    pergunta_idpergunta = :idpergunta,
                WHERE   idalternativa = :id';
        
        $params = array(':texto' => $this->getTexto()
                    );
        return Database::executar($sql, $params);
    }
     

    static public function listar($tipo = 0, $info = ''){
        $sql = 'SELECT * FROM alternativa';
        switch($tipo){
            case 1: $sql .= ' WHERE idalternativa = :info'; break;
            case 2: $sql .= ' WHERE pergunta_idpergunta like :info';  break;
            case 3: $sql .= ' WHERE texto like :info';  break;
        }          
        $params = array();
        if ($tipo > 0)
            $params = array(':info'=>$info);         
        return Database::listar($sql, $params);
    }

    
}

?>
