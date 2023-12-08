<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
    <?php 
        session_start(); 
        $chat = isset($_GET["chat"]) ? $_GET["chat"] : 1;
    ?>
    <title>Document</title>
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <div class="row w-100">
                <div class="col-auto">
                    <a class="navbar-brand" href="../index.php">
                        <img src="img/loguin.png" alt="Logo" height="64" class="d-inline-block align-text-top">
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
                            <div><img src="img/userr.webp" alt="" width="40px"></div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div class="row">
        <div class="col-4 bg-dark" style="height: 100vh; overflow:scroll">
            <div class="container " >
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-10 ">
                        <div class="space"></div>
                        <form class="d-flex" action="consulta.php" method="GET" width="110%"> <!-- Adiciona a classe ms-3 para margem à esquerda na barra de pesquisa -->
                            <input class="form-control me-2" type="search" placeholder="Buscar usuários" aria-label="Search" name="q">
                            <button class="btn btn-dark" type="submit"><i class="bi bi-search"></i></button>
                            <button class="btn btn-dark " type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-three-dots-vertical"></i></button>
                            <ul class="dropdown-menu dropdown-menu-dark">
                                <li><a class="dropdown-item active" data-bs-toggle="offcanvas" data-bs-target="#novoChat" aria-controls="novoChat"><i class="bi bi-plus-lg"></i> Criar Chat</a></li>
                                <li><a class="dropdown-item" href="#"><i class="bi bi-pencil"></i> Gerenciar Chats</a></li>
                            </ul>
                            <!-- Parte de Criar novo Chat -->
                            <div class="offcanvas offcanvas-start text-bg-dark" data-bs-backdrop="static" tabindex="-1" id="novoChat" aria-labelledby="staticBackdropLabel">
                                <div class="offcanvas-header">
                                    <h5 class="offcanvas-title" id="staticBackdropLabel">Novo Chat</h5>
                                    <button type="button" class="btn btn-dark" data-bs-dismiss="offcanvas" aria-label="Close"><i class="bi bi-x-lg"></i></button>
                                </div>
                                <div class="offcanvas-body">

                                    <div class="container">
                                        <div class="row">
                                            <div class="card border-light text-bg-dark col-12">
                                                <div class="card-body">
                                                    <h5 class="card-title">
                                                        <img src="img/perfpadrao.jpg" alt="" width="100%">
                                                    </h5>
                                                    <p class="card-text">
                                                        <div class="input-group flex-nowrap">
                                                            <span class="input-group-text" id="addon-wrapping"><i class="bi bi-chat-left"></i></span>
                                                            <input type="text" class="form-control" placeholder="Nome do Chat" aria-label="Nome do Chat" aria-describedby="addon-wrapping">
                                                        </div>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="space"></div>
                                        <div class="row">
                                            <div class="col-4">
                                                <p>Participantes:</p>
                                            </div>
                                            <div class="col-8">
                                                <div class="input-group flex-nowrap">
                                                        <select name="" id="" class="form-select" aria-label="Default select example">
                                                            <option value="1">Pessoa 1</option>
                                                            <option value="2">Pessoa 2</option>
                                                            <option value="3">Pessoa 3</option>
                                                        </select>
                                                        <button class="btn btn-outline-light" type="button"><i class="bi bi-person-fill-add"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-10">
                                                <table class="table table-striped table-dark">
                                                    <thead>
                                                        <tr>
                                                        <th scope="col">#ID</th>
                                                        <th scope="col">Nome</th>
                                                        <th scope="col">Usuário</th>
                                                        <th class="justify-content-center text-center" scope="col"><i class="bi bi-x-lg text-light"></i></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                        <th scope="row">1</th>
                                                        <td>Mark</td>
                                                        <td>@mdo</td>
                                                        <td class="justify-content-center text-center"><button class="btn btn-sm btn-danger rounded-pill" style="font-size: 70%" type="button"><i class="bi bi-dash-lg"></i></button></td>
                                                        </tr>
                                                        <tr>
                                                        <th scope="row">2</th>
                                                        <td>Jacob</td>
                                                        <td>@fat</td>
                                                        <td class="justify-content-center text-center"><button class="btn btn-sm btn-danger rounded-pill" style="font-size: 70%" type="button"><i class="bi bi-dash-lg"></i></button></td>
                                                        </tr>
                                                        <tr>
                                                        <th scope="row">3</th>
                                                        <td>Larry</td>
                                                        <td>@twitter</td>
                                                        <td class="justify-content-center text-center"><button class="btn btn-sm btn-danger rounded-pill" style="font-size: 70%" type="button"><i class="bi bi-dash-lg"></i></button></td>
                                                        </tr>
                                                        <tr>
                                                        <th scope="row">1</th>
                                                        <td>Mark</td>
                                                        <td>@mdo</td>
                                                        <td class="justify-content-center text-center"><button class="btn btn-sm btn-danger rounded-pill" style="font-size: 70%" type="button"><i class="bi bi-dash-lg"></i></button></td>
                                                        </tr>
                                                        <tr>
                                                        <th scope="row">2</th>
                                                        <td>Jacob</td>
                                                        <td>@fat</td>
                                                        <td class="justify-content-center text-center"><button class="btn btn-sm btn-danger rounded-pill" style="font-size: 70%" type="button"><i class="bi bi-dash-lg"></i></button></td>
                                                        </tr>
                                                        <tr>
                                                        <th scope="row">3</th>
                                                        <td>Larry</td>
                                                        <td>@twitter</td>
                                                        <td class="justify-content-center text-center"><button class="btn btn-sm btn-danger rounded-pill" style="font-size: 70%" type="button"><i class="bi bi-dash-lg"></i></button></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="row justify-content-between text-between">
                                                <div class="col-5">
                                                    <button class="btn btn-danger "><i class="bi bi-trash"></i> Excluir</button>
                                                </div>
                                                <div class="col-4">
                                                    <button class="btn btn-success "><i class="bi bi-check-lg"></i> Salvar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- ------------------ -->

                        </form>
                        <div class="space"></div>
                        <div id="chats"></div>
                        <?php
                            include "chatloader.php";
                        ?>  
                    </div>
                    <div class="col-1"></div>
                </div>
            
            </div>
            
            
        </div>
        <div class="col-8 chat" style=" border-left: 2px solid black;">
        <div  id="chatmessages" class="container "  style="height: 100vh; overflow:scroll" onscroll="verificarScroll();">
            <?php
            if ($_GET['chat'] == 0 || !isset($_GET['chat']) || null == $_GET["chat"]) {
                echo '
                    <div class="space"></div>
                    <div class="row  justify-content-center text-center">
                        <div class="col-12" style="height: 100vh; overflow:scroll">                           
                            <h1 class="text-white">Selecione Um Chat e comece a Conversar</h1>
                            <div class="spinner-grow spinner-grow-sm text-light" role="status">
                            <span class="visually-hidden">Loading...</span>
                            </div>
                            <br>
                            <img src="img/logo.png" alt="" width="50%">
                        </div>
                    </div>'
                ;
            }else{
                include "msg.php";
                echo '
                    <div class="row justify-content-center text-center sticky-lg-bottom ">
                        <div class="col-10">
                            <div id="botaoDescer"></div>
                            <div class="input-group flex-nowrap">
                                <input id="msg" type="text" class="form-control" placeholder="Digite Aqui..." aria-label="Digitar" aria-describedby="addon-wrapping">
                                <span class="input-group-text" id="addon-wrapping"><button class="btn btn-purple" onclick="mensagem()"><i class="bi bi-send"></i></button></span>
                            </div>
                        </div>
                    </div>   
                '; 
            }
                
            ?>
             
        </div>
            
        </div>
            
    </div>
    </div>
    

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>