<?php
require_once ('database.class.php');
    
class PostagemSala{
    
    //Atributos da classe
    private $idpost;
    private $idsala;
    
    //construtor do objeto
    public function __construct($idpost, $idsala){
        $this->setIdpost($idpost);
        $this->setIdsala($idsala);
    }
    
    //Início dos Setters
    public function setIdpost($idpost){
        $this->idpost = $idpost;
    }

    public function setIdsala($idsala){
        $this->idsala = $idsala;
    }
    //Fim dos Setters

    //Início dos Getters
    public function getIdpost(){
        return $this->idpost;
    }

    public function getIdsala(){
        return $this->idsala;
    }

    //Fim dos Getters

    //Métodos do banco de dados:
    public function inserir(){
        $sql = 'INSERT INTO sala_has_postagem (sala_idsala, postagem_idpostagem)
                      VALUES (:idsala, :idpost)';
        $params = array(':idsala' => $this->getIdsala(),
                        ':idpost'=> $this->getIdpost(),
                    );
        return Database::executar($sql, $params);
    }

    public function excluir(){
        $sql = 'DELETE FROM sala_has_postagem 
                WHERE postagem_idpostagem = :idpost and sala_idsala = :idsala';         
        $params = array(':idpostagem'=>$this->getIdpostagem(),
                        'idsala'=>$this->getIdsala()
        );         
        return Database::executar($sql, $params);
    }
     

    public static function listar($tipo = 0, $info = 0, $info_s = 0){
        $sql = 'SELECT * FROM sala_has_postagem';
        switch($tipo){
            case 1: $sql .= ' WHERE sala_idsala = :info'; break;
            case 2: $sql .= ' WHERE postagem_idpostagem = :info and sala_idsala = :info_s';  break;
            case 3: $sql .= ' WHERE postagem_idpostagem like :info';  break;
        }          
        $params = array();
        if ($tipo > 0){
            $params = array(
                ':info'=>$info,
                ':info_s'=>$info_s    
            );     
        }    
        return Database::listar($sql, $params);
    }
}

?>
