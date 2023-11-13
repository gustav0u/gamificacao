<?php

    // Configuração do Banco de Dados
    define('HOST', 'localhost');  
    define('DBNAME', 'gamificacao');    
    define('USER', 'root');  
    define('PASSWORD', '');
    define('DRIVER', 'mysql'); 
    define('CHARSET', 'utf8');
    define('MYSQL_DSN', 'mysql:host=localhost;dbname=gamificacao');
    define('MYSQL_USUARIO', 'root');
    define('MYSQL_SENHA', '');

    // URL Base - Usado para o Menu, links, ...
    define('URL_BASE', 'http://localhost/crud-padrao/');
    
    // Configuração da Aplicação (dev ou prod)
    // dev mostra os erros e prod não mostra os erros
    define('PERFIL', 'dev');
    
?>
