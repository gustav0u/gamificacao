<!DOCTYPE HTML>
<html lang="pt-br">
<head>
<?php

$path = '../conf/conf.inc.php';
if (file_exists($path))
    include_once($path);
$path = '../../conf/conf.inc.php';
if (file_exists($path))
    include_once($path);
?> 
<link rel="icon" href="<?=URL_BASE?>/assets/img/favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=URL_BASE."assets/css/style.css"?>">

    <link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon">
    <meta charset="UTF-8">
    <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
    }
    .tamanho{
    width: 215px;
    height: 215px;
}
.tamanho2{
    width: 40px;
    height: 40px;
}
    .off-canvas {
      position: fixed;
      top: 0;
      left: -250px;
      width: 250px;
      height: 100%;
      background-color: #333;
      color: #fff;
      padding: 20px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
      transition: left 0.3s ease;
    }

    .toggle-button {
            position: absolute;
            top: 33%; /* Ajuste a posição conforme necessário */
            left: 30%; /* Ajuste a posição conforme necessário */
            z-index: 999; /* Certifique-se de que o botão esteja acima de outros elementos */
        }
    /* Estilize o modal como desejado */
.modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.7);
}

.modal-content {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: white;
    padding: 20px;
    border-radius: 10px;
}

.close {
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 20px;
    cursor: pointer;
}

.foto-home{
  border-radius: 50%;
}
  </style>


</head>
<body id="body">