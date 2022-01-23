


<?php

  if(isset($_POST['criar_conta'])):

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = md5(md5($_POST['senha']));

    if($_POST['tipo_usuario'] ==  'Empresa'):
      // Inserir dados na tabela de uma empresa
      $parametros = [
        ":nome"     => $nome,
        ":email"    => $email,
        ":senha"    => $senha
      ];
      $inserirEmpresa = new Model();
      $inserirEmpresa->EXE_NON_QUERY("INSERT INTO tb_empresa (nome_empresa, email_empresa, senha_empresa)
      VALUES (:nome, :email, :senha) ", $parametros);
      if($inserirEmpresa):
        echo "<script>window.alert('Usuário inserido com sucesso');</script>";
      endif;
      // Verificação do tipo de usuário
    elseif($_POST['tipo_usuario'] == 'Estudante'):
        echo "<script>window.alert('Criar usuário empresa');</script>";
    endif;
  endif;
