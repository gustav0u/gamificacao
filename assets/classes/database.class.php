<?php
$path = '../conf/conf.inc.php';
if (file_exists($path))
    include_once($path);
$path = '../../conf/conf.inc.php';
if (file_exists($path))
    include_once($path);
class Database{
    public static function conectar(){
        try{
            $conexao = Conexao::getInstance();
            return $conexao;
        }catch(PDOException $e){
            echo "Erro ao conectar com o banco de dados. Verifique os parâmetros de configuração.";
        }
    }

    public static function executar($sql,$params = array()){
        $conexao = self::conectar();
        $comando = self::preparar($conexao, $sql, $params);
        return $comando->execute();
    }
    
    public static function listar($sql,$params){
        $conexao = self::conectar();
        $comando = self::preparar($conexao, $sql, $params);
        if ($comando->execute())
            return $comando->fetch(PDO::FETCH_ASSOC);
    }

    public static function preparar($conexao, $sql, $params = array()){
        $comando = $conexao->prepare($sql);
        foreach($params as $chave=>$valor){
            $comando->bindValue($chave,$valor);
        }
        return $comando;
    }
}


?>