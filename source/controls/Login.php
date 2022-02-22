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
    // (1) Efectuando o login do Administrador
    $login = new Model();
    $loginAdmin = $login->EXE_QUERY("SELECT * FROM tb_admin WHERE email_admin=:email AND senha_admin=:senha", $parametro);
    if($loginAdmin){
      // Sessão do administrador
      foreach($loginAdmin as $mostrar):
        $_SESSION['id']       = addslashes($mostrar['id_admin']);
        $_SESSION['nome']     = addslashes($mostrar['nome_admin']);
        $_SESSION['email']    = addslashes($mostrar['email_admin']);
        $_SESSION['senha']    = addslashes($mostrar['senha_admin']);
        $_SESSION['foto']     = addslashes($mostrar['foto_admin']);
      endforeach;
      echo "<script>location.href='theme/admin/home.php?id=home'</script>";

    // ===========================================================================================================================
    }else {
      // (2) Efectuando o login da company
      $loginCompany = $login->EXE_QUERY("SELECT * FROM tb_empresa WHERE email_empresa=:email AND senha_empresa=:senha", $parametro);
      if($loginCompany){
        foreach($loginCompany as $mostrar):
          $_SESSION['id']       = addslashes($mostrar['id_empresa']);
          $_SESSION['nome']     = addslashes($mostrar['nome_empresa']);
          $_SESSION['email']    = addslashes($mostrar['email_empresa']);
          $_SESSION['senha']    = addslashes($mostrar['senha_empresa']);
          $_SESSION['nif']      = addslashes($mostrar['nif']);
          $_SESSION['local']    = addslashes($mostrar['localizacao']);
          $_SESSION['contacto'] = addslashes($mostrar['contacto']);
          $_SESSION['data']     = addslashes($mostrar['data_registro_empresa']);
          $_SESSION['responsa'] = addslashes($mostrar['responsavel_empresa']);
          $_SESSION['foto']     = addslashes($mostrar['foto']);
        endforeach;
        echo "<script>location.href='theme/company/home.php?id=home'</script>";
      }else {
        // Efectuando login do usuário estudante
        $loginStudy = $login->EXE_QUERY("SELECT * FROM tb_aluno WHERE email=:email AND senha=:senha", $parametro);
        if($loginStudy){
          foreach($loginStudy as $mostrar):
            $_SESSION['id']   = addslashes($mostrar['id_aluno']);
            $_SESSION['nome'] = addslashes($mostrar['nome']);
            $_SESSION['email'] = addslashes($mostrar['email']);
            $_SESSION['senha'] = addslashes($mostrar['senha']);
            $_SESSION['foto'] = addslashes($mostrar['foto']);
            $_SESSION['sexo'] = addslashes($mostrar['sexo']);
            $_SESSION['processo'] = addslashes($mostrar['numero_processo']);
            $_SESSION['contacto'] = addslashes($mostrar['contacto']);
            $_SESSION['estado_aluno'] = addslashes($mostrar['estado_aluno']);
          endforeach;
          echo "<script>location.href='theme/study/home.php?id=home'</script>";
        }else {
          echo "<script>window.alert('Este usuário não exixte')</script>";
        }
      }
    }
  }
