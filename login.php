<!-- Adicionando configurações -->
<?php
  require './source/Config.php';
  require './source/Model.php';

  session_start();
  ?>
<!-- Adicionando configurações -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
        <div class="col-xl-4 forms">
          <form method="POST">
              <div class="col-lg-12 mb-5">
                  <a href="index.php"><h1>Meu Estágio</h1></a>
                  <p>Faça o seu logon dentro da nossa plataforma</p>
                  <hr>
              </div>
              <div class="mt-3 col-lg-12 form-group">
                  <input type="email" name="email" placeholder="Ex: eduardo@gmail.com" class="form-control form-control-lg">
              </div>
              <div class="mt-3 col-lg-12 form-group">
                  <input type="password" name="password" placeholder="Password" class="form-control-lg form-control">
              </div>
              <div class="mt-3 col-lg-12">
                  <input type="submit" value="Login" name="login" class="form-control-lg form-control">
              </div>

              <div class="col-lg-12 mt-4">
                  <div class="row">
                      <div class="col-lg-12 text-center">
                          <p>Já tenho uma conta <a href="create.php">Criar conta</a></p>
                      </div>
                  </div>
              </div>
          </form>
        </div>
        <div class="col-xl-8 background-login">
        </div>
      </div>
    </main>
</body>
</html>

 <!-- Adicionando a configuração do login -->
 <?php
    require './source/controls/Login.php';
  ?>
  <!-- End Configuração do login -->
