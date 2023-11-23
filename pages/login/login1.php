<?php
    if (isset($_POST['nomUser'])) {
        // Atribui o valor da variável 'nome_da_variavel' a uma nova variável
        $minha_variavel = $_POST['nomUser'];
    } else {
        $minha_variavel = "";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="text-white">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-purple">
                        <h2 class="text-center">Login</h2>
                    </div>
                    <div class="card-body glass-effect">
                        <form action="login.php" method="post">
                            <div class="mb-3">
                                <label for="username" class="form-label">Usuário:</label>
                                <input type="text" class="form-control" id="username" name="username" value='<?php echo $minha_variavel; ?>' required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Senha:</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-secondary w-100">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>j
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
