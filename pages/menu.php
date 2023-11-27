<?php

    $path = '../conf/conf.inc.php';
    if (file_exists($path))
        include_once($path);
    $path = '../../conf/conf.inc.php';
    if (file_exists($path))
        include_once($path);
?> 
<title><?= $title ?></title>
<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
        <div class="row w-100">
            <div class="col-auto">
                <a class="navbar-brand" href="index.php">
                    <img src="<?=URL_BASE."assets/img/loguin.png"?>" alt="Logo" height="64" class="d-inline-block align-text-middle">
                    Study n' Play
                </a>
            </div>

            <div class="col d-flex justify-content-end align-items-center me-3"> <!-- Adiciona a classe me-3 para margem à direita -->
            
                <form class="d-flex ms-3" action="consulta.php" method="GET"> <!-- Adiciona a classe ms-3 para margem à esquerda na barra de pesquisa -->
                    <input class="form-control me-2" type="search" placeholder="Buscar usuários" aria-label="Search" name="q">
                    <button class="btn btn-outline-light" type="submit"><i class="bi bi-search"></i></button>
                </form>
                
                <div class="ms-3"> <!-- Adiciona a classe ms-3 para margem à esquerda no ícone de usuário -->
                    <a href="perfil.php" class="text-light"> <!-- Remova a classe me-2 para margem à direita -->
                        <div><img src="../assets/img/userr.webp" alt="" width="40px"></div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>
</body>
</html>
