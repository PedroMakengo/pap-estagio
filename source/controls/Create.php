


<?php

  if(isset($_POST['criar_conta'])):

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = md5(md5($_POST['senha']));

    $parametros = [
      ":nome"     => $nome,
      ":email"    => $email,
      ":senha"    => $senha
    ];

    if($_POST['tipo_usuario'] ==  'Empresa'):
      // Inserir dados na tabela de uma empresa
      $inserirEmpresa = new Model();
      $inserirEmpresa->EXE_NON_QUERY("INSERT INTO tb_empresa (nome_empresa, email_empresa, senha_empresa)
      VALUES (:nome, :email, :senha) ", $parametros);
      if($inserirEmpresa):
        echo "<script>location.href='theme/company/home.php?id=home'</script>";
      endif;
      // Verificação do tipo de usuário
      elseif($_POST['tipo_usuario'] == 'Estudante'):
        $inserirEstudante = new Model();
        $inserirEstudante->EXE_NON_QUERY("INSERT INTO tb_aluno
        (nome, numero_processo, email, senha) VALUES (:nome, '', :email, :senha)", $parametros);
        if($inserirEstudante):
          echo "<script>location.href='theme/study/home.php?id=home'</script>";
        endif;
    endif;
  endif;
