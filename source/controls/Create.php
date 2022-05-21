<?php

  if(isset($_POST['criar_conta'])):
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = md5(md5($_POST['senha']));

    // Verificar se já existe um usuário com o mesmo email
    $parametro = [":email" => $email];
    $verificarEmail = new Model();
    $verificarAluno = $verificarEmail->EXE_QUERY("SELECT * FROM tb_aluno WHERE email=:email", $parametro);

    if($verificarAluno):
      echo '<script>
              swal({
                title: "Opps!",
                text: "Já existe um usuário com este e-mail",
                icon: "error",
                button: "Fechar!",
              })
            </script>';
    else:
      // Verificar se existe uma empresa com este e-mail
      $verificarEmpresa = $verificarEmail->EXE_QUERY("SELECT * FROM tb_empresa WHERE email_empresa=:email", $parametro);
      if($verificarEmpresa):
        echo '<script>
              swal({
                title: "Opps!",
                text: "Já existe um usuário com este e-mail",
                icon: "error",
                button: "Fechar!",
              })
            </script>';
      else:
        if(empty($nome) && empty($email) && empty($senha)):
          echo '<script>
                swal({
                  title: "Opps!",
                  text: "Preencha todos os campos",
                  icon: "error",
                  button: "Fechar!",
                })
              </script>';
        else:
          $parametros = [
            ":nome"     => $nome,
            ":email"    => $email,
            ":senha"    => $senha
          ];

          if($_POST['tipo_usuario'] ==  'Empresa'):
            // Inserir dados na tabela de uma empresa
            $inserirEmpresa = new Model();
            $inserirEmpresa->EXE_NON_QUERY("INSERT INTO tb_empresa (nome_empresa, email_empresa, senha_empresa, nif, localizacao, contacto, data_registro_empresa)
            VALUES (:nome, :email, :senha, 0, NULL, NULL, now()) ", $parametros);
            if($inserirEmpresa):
              echo '<script>
                      swal({
                        title: "Operação efetuado com sucesso!",
                        text: "A tua operação foi efetuada com sucesso",
                        icon: "success",
                        button: "Fechar!",
                      })
                    </script>';
            endif;
            // Verificação do tipo de usuário
            elseif($_POST['tipo_usuario'] == 'Estudante'):
              $inserirEstudante = new Model();
              $inserirEstudante->EXE_NON_QUERY("INSERT INTO tb_aluno
              (nome, numero_processo, email, senha)
              VALUES (:nome, 0, :email, :senha)", $parametros);
              if($inserirEstudante):
                echo '<script>
                      swal({
                        title: "Operação efetuado com sucesso!",
                        text: "A tua operação foi efetuada com sucesso",
                        icon: "success",
                        button: "Fechar!",
                      })
                    </script>';
              endif;
          endif;
        endif;
      endif;
    endif;
  endif;
