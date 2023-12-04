<?php
require_once ('database.class.php');
    
class UsuarioFormulario{
    
    //Atributos da classe
    private $usuario;
    private $formulario;
    private $pontuacao;
    private $data;
    
    //construtor do objeto
    public function __construct($usuario, $formulario, $pontuacao, $data){
        $this->setUsuario($usuario);
        $this->setFormulario($formulario);
        $this->setPontuacao($pontuacao);
        $this->setData($data);
    }
    
    //Início dos Setters
    public function setUsuario($usuario){
        $this->usuario = $usuario;
    }

    public function setData($data){
        $this->data = $data;
    }

    public function setPontuacao($pontuacao){
        $this->pontuacao = $pontuacao;
    }

    public function setFormulario($formulario){
        $this->formulario = $formulario;
    }
    //Fim dos Setters

    //Início dos Getters
    public function getUsuario(){
        return $this->usuario;
    }

    public function getData(){
        return $this->data;
    }

    public function getPontuacao(){
        return $this->pontuacao;
    }

    public function getFormulario(){
        return $this->formulario;
    }
    //Fim dos Getters

    //Métodos do banco de dados:
    public function inserir(){
        $sql = 'INSERT INTO usuario_responde_formulario (usuario_idusuario, formulario_idformulario, pontuacao, dataenvio)
                      VALUES (:usuario, :formulario, :pontuacao, curdate())';
        $params = array(':usuario' => $this->getUsuario(),
                        ':formulario' => $this->getFormulario(),
                        ':pontuacao' => $this->getPontuacao(),
                    );
        return Database::executar($sql, $params);
    }

    public function excluir(){
        $sql = 'DELETE FROM usuario_responde_formulario
                WHERE usuario_idusuario = :id and formulario_idformulario = :idform';         
        $params = array(':id'=>$this->getUsuario(),
                        ':idform'=>$this->getFormulario()
    );         
        return Database::executar($sql, $params);
    }

    public static function listar($tipo = 0, $info = ''){
        $sql = 'SELECT * FROM usuario_responde_formulario';
        switch($tipo){
            case 1: $sql .= ' WHERE usuario_idusuario = :info'; break;
            case 2: $sql .= ' WHERE formulario_idformulario = :info';  break;
        }           
        $params = array();
        if ($tipo > 0)
            $params = array(':info'=>$info);         
        return Database::listar($sql, $params);
    }
}

?>