<?php
  require 'source/Config.php';
  require 'source/Model.php';
?>
<!DOCTYPE html>
<html lang="pt-PT">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar conta | Meu estágio</title>
    <link rel="stylesheet" href="theme/assets/theme/bootstrap.min.css">
    <link rel="stylesheet" href="theme/assets/styles/create.css">

    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;500;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;500&display=swap" rel="stylesheet">

    <script src="theme/assets/scripts/sweetalert.min.js"></script>
</head>
<body>
    <main>
        <div class="row limit-of-line">
            <div class="col-xl-8 background"></div>
            <div class="col-xl-4 forms">
                <form action="" method="POST">
                    <div class="col-lg-12 mb-5">
                        <a href="index.php"><h1>Meu Estágio</h1></a>
                        <p>Crie a sua conta dentro da nossa plataforma</p>
                        <hr>
                    </div>
                    <div class="mt-3 col-lg-12">
                        <input type="text" name="nome" required placeholder="Ex: Eduardo Jamba" class="form-control-lg form-control">
                    </div>
                    <div class="mt-3 col-lg-12">
                        <input type="text" name="email" required placeholder="Ex: jambaeduardo@gmail.com" class="form-control-lg form-control">
                    </div>
                    <div class="mt-3 col-lg-12">
                        <input type="password" name="senha" required placeholder="Password" class="form-control-lg form-control">
                    </div>
                    <div class="mt-3 col-lg-12">
                      <select name="tipo_usuario" id="" class="form-control form-control-lg">
                        <option value="" disabled>Tipo de usuário</option>
                        <option value="Empresa">Empresa</option>
                        <option value="Estudante">Estudante</option>
                      </select>
                    </div>
                    <div class="mt-3 col-lg-12">
                        <input type="submit" name="criar_conta" value="Criar conta" class="form-control-lg form-control">
                    </div>

                    <div class="col-lg-12 mt-4">
                        <div class="row">
                            <div class="col-lg-12 text-center">
                                <p>Já tenho uma conta <a href="login.php">Login</a></p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>

<!-- Crud -->
<?php require 'source/controls/Create.php'; ?>
<!-- Crud -->
