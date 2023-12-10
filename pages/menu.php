<?php
    $path = '../conf/conf.inc.php';
    if (file_exists($path))
        include_once($path);
    $path = '../../conf/conf.inc.php';
    if (file_exists($path))
        include_once($path);
?> 
<title><?= $title ?></title>
<nav class="navbar bg-dark border-bottom border-body navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand text-white" href="<?=URL_BASE."pages/index.php"?>">
        <img src="<?=URL_BASE."assets/img/loguin.png"?>" alt="Logo" height="64" class="d-inline-block align-text-middle">
        Study n' Play
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
            <li class="nav-item ">
                <a class="nav-link text-white" aria-current="page" href="<?=URL_BASE."pages/formulario/cad.php"?>"><h5>Criar Formulário <i class="bi bi-journal-richtext"></i></h5></a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="<?=URL_BASE."pages/chat"?>"><h5>Chat <i class="bi bi-chat-dots-fill"></i> </h5></a>
            </li>
        </ul>
        <form class="d-flex ms-3" action="consulta.php" method="GET" class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Buscar usuários" aria-label="Search" name="q">
            <button class="btn btn-outline-light" type="submit"><i class="bi bi-search"></i></button>
        </form>
        <div class="ms-3"> <!-- Adiciona a classe ms-3 para margem à esquerda no ícone de usuário -->
            <a href="<?=URL_BASE."pages/perfil.php"?>" class="text-light"> <!-- Remova a classe me-2 para margem à direita -->
                <div>                
                    <img src="<?=URL_BASE?>assets/<?php echo isset($_SESSION['user_image']) ? "imgusuarios/".$_SESSION['user_image'] : 'img/perfpadrao.jpg'; ?>" class="foto-home tamanho2" alt="Perfil Padrão" id="profileImage" data-bs-toggle="modal" data-bs-target="#uploadModal">
                </div>
            </a>
        </div>
    </div>
  </div>
</nav>