<?php
  // Efectuando a verificação do login
  if(isset($_POST['login'])){
    // Pegar os dados enviado apartir do front-end
    $email = $_POST['email'];
    $pass  = $_POST['password'];

    $paramets = [
      ":email"  => $email,
      ":pass"   => md5(md5($pass))
    ]
    // Efectuando o login do Administrador
    $loginAdmin->EXE_QUERY("SELECT * FROM ", $paramets);
    if($loginAdmin){
      echo "<script>location.href='theme/admin/home.php'</script>";
    }else {
      // Efectuando o login da company
      $loginCompany->EXE_QUERY("SELECT * FROM ", $paramets);
      if($loginCompany){
        echo "<script>location.href='theme/company/home.php'</script>";
      }else {
        // Efectuando login do usuário
        $loginStudy->EXE_QUERY("SELECT * FROM ", $paramets);
        if($loginStudy){
          echo "<script>location.href='theme/study/home.php'</script>";
        }
      }
    }
  }
