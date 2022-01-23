


<?php

  if(isset($_POST['criar_conta'])):

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = md5(md5($_POST['senha']));

    if($_POST['tipo_usuario'] ==  'Empresa'):
      echo "<script>window.alert('Criar usuário empresa');</script>";
    elseif($_POST['tipo_usuario'] == 'Estudante'):
        echo "<script>window.alert('Criar usuário empresa');</script>";
    endif;
  endif;
