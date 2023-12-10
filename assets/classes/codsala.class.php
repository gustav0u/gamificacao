<?php
require_once ('database.class.php');
    
class Codsala{
    
    //Atributos da classe
    private $cod_sala;
    private $idsala;
    
    //construtor do objeto
    public function __construct($cod_sala, $idsala){
        $this->setCod_sala($cod_sala);
        $this->setIdsala($idsala);
    }
    
    //Início dos Setters
    public function setCod_sala($cod_sala){
        $this->cod_sala = $cod_sala;
    }

    public function setIdsala($idsala){
        $this->idsala = $idsala;
    }
    //Fim dos Setters

    //Início dos Getters
    public function getCod_sala(){
        return $this->cod_sala;
    }

    public function getIdsala(){
        return $this->idsala;
    }

    //Fim dos Getters

    //Métodos do banco de dados:
    public function inserir(){
        $sql = 'INSERT INTO codsala (cod_sala, sala_idsala)
                      VALUES (:cod_sala, :idsala)';
        $params = array(
            ':cod_sala'=> $this->getCod_sala(),
            ':idsala' => $this->getIdsala()
                    );
        return Database::executar($sql, $params);
    }

    public function excluir(){
        $sql = 'DELETE FROM codsala 
                WHERE cod_sala = :cod_sala';         
        $params = array(':cod_sala'=>$this->getCod_sala()
        );         
        return Database::executar($sql, $params);
    }
     

    public static function listar($tipo = 0, $info = 0){
        $sql = 'SELECT * FROM codsala';
        switch($tipo){
            case 1: $sql .= ' WHERE sala_idsala = :info'; break;
            case 2: $sql .= ' WHERE cod_sala = :info';  break;
        }          
        $params = array();
        if ($tipo > 0){
            $params = array(
                ':info'=>$info
            );     
        }    
        return Database::listar($sql, $params);
    }
}

?>
