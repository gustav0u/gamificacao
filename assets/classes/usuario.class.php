<?php
require_once ('database.class.php');
    
class Usuario{
    
    //Atributos da classe
    private $id;
    private $nome;
    private $usuario;
    private $dtNasc;
    private $email;
    private $senha;
    private $cor;
    
    //construtor do objeto
    public function __construct($id, $nome, $usu, $dt, $email, $pass, $cor){
        $this->setId($id);
        $this->setNome($nome);
        $this->setUsuario($usu);
        $this->setDataNasc($dt);
        $this->setEmail($email);
        $this->setSenha($pass);
        $this->setCor($cor);
    }
    
    //Início dos Setters
    public function setId($id){
        $this->id = $id;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function setUsuario($usu){
        $this->usuario = $usu;
    }

    public function setDataNasc($dt){
        $this->dtNasc = $dt;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function setSenha($pass){
        $this->senha = $pass;
    }

    public function setCor($cor){
        $this->cor = $cor;
    }
    //Fim dos Setters

    //Início dos Getters
    public function getId(){
        return $this->id;
    }

    public function getNome(){
        return $this->nome;
    }

    public function getUsuario(){
        return $this->usuario;
    }

    public function getDataNasc(){
        return $this->dtNasc;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getSenha(){
        return $this->senha;
    }

    public function getCor(){
        return $this->cor;
    }
    //Fim dos Getters

    //Métodos do banco de dados:
    public function inserir(){
        $sql = 'INSERT INTO usuario (nome, usuario, dtNasc, email, senha, cor)
                      VALUES (:nome, :usuario, :dtNasc, :email, :senha, :cor)';
        $params = array(':nome' => $this->getNome(),
                        ':usuario '=> $this->getUsuario(),
                        ':dtNasc' => $this->getDataNasc(),
                        ':email' => $this->getEmail(),
                        ':senha' => $this->getSenha(),
                        ':cor' => $this->getCor()
                    );
        return Database::executar($sql, $params);
    }

    public function excluir(){
        $sql = 'DELETE FROM usuario 
                WHERE idusuario = :id';         
        $params = array(':id'=>$this->getId());         
        return Database::executar($sql, $params);
    }

    public function editar(){
        $sql = 'UPDATE usuario
                SET nome = :nome,
                    usuario  = :usuario,
                    dtNasc = :dtNasc,
                    email = :email,
                    senha = :senha,
                    cor = :cor
                WHERE   usuario = :id';
        
        $params = array(':nome' => $this->getNome(),
                        ':usuario '=> $this->getUsuario(),
                        ':dtNasc' => $this->getDataNasc(),
                        ':email' => $this->getEmail(),
                        ':senha' => $this->getSenha(),
                        ':cor' => $this->getCor()
                    );
        return Database::executar($sql, $params);
    }
     

    public function listar($tipo = 0, $info = ''){
        $sql = 'SELECT * FROM usuario';
        switch($tipo){
            case 1: $sql .= ' WHERE idusuario = :info'; break;
            case 2: $sql .= ' WHERE cor like :info';  break;
            case 3: $sql .= ' WHERE usuario = :info'; break;
        }           
        $params = array();
        if ($tipo > 0)
            $params = array(':info'=>$info);         
        return Database::listar($sql, $params);
    }
}

?>