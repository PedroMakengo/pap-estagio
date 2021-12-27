<?php
  // Efectuando a verificação do login
  if(isset($_POST['login'])){
    // Pegar os dados enviado apartir do front-end
    $email = $_POST['email'];
    $pass  = $_POST['password'];

    $parametro = [
      ":email"  => $email,
      ":senha"   => md5(md5($pass))
    ];
    // Efectuando o login do Administrador
    $login = new Model();
    $loginAdmin = $login->EXE_QUERY("SELECT * FROM tb_admin WHERE email_admin=:email AND senha_admin=:senha", $parametro);
    if($loginAdmin){
      echo "<script>location.href='theme/admin/home.php'</script>";
      // Adicionar a sessão do administrador
    }else {
      // Efectuando o login da company
      $loginCompany = $login->EXE_QUERY("SELECT * FROM tb_empresa WHERE email_empresa=:email AND senha_empresa=:senha", $parametro);
      if($loginCompany){
        echo "<script>location.href='theme/company/home.php'</script>";
      }else {
        // Efectuando login do usuário
        $loginStudy = $login->EXE_QUERY("SELECT * FROM tb_aluno WHERE email=:email AND senha=:senha", $parametro);
        if($loginStudy){
          echo "<script>location.href='theme/study/home.php'</script>";
        }else {
          echo "<script>window.alert('Este usuário não exixte')</script>";
        }
      }
    }
  }
