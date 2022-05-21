<!-- Footer -->
<?php require __DIR__ . "./includes/head.php" ?>
<!-- Footer -->

    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">

        <!-- Footer -->
        <?php require __DIR__ . "./includes/header.php" ?>
        <!-- Footer -->
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="fundoCompany"></div>
                <div class="container-fluid dashboard-content manterTop">
                <?php
                    if($nifVerificado === '0'):
                ?>
                  <div class="ecommerce-widget">
                    <div class="row mb-4">
                        <div class="col-xl-12 col-lg-12">
                            <div class="bg-white border rounded p-4">
                                <div class="row pt-1">
                                    <div class="col-lg-6">
                                      <h1 class="h6">Por favor Sr(a) <strong><?= $_SESSION["nome"] ?></strong>, atualize a sua conta !</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
                            <div class="card rounded p-4">
                              <form method="POST" enctype="multipart/form-data">
                                <?php
                                  $parametros = [":idUsuarioLogado" => $_SESSION['id']];
                                  $atualizarDadosUsuarioLogado = new Model();
                                  $selecionarDadosDoUsuarioLogado = $atualizarDadosUsuarioLogado->EXE_QUERY("SELECT * FROM tb_aluno WHERE id_aluno=:idUsuarioLogado", $parametros);

                                  if($selecionarDadosDoUsuarioLogado):
                                    foreach($selecionarDadosDoUsuarioLogado as $mostrar):
                                      $nome = $mostrar['nome'];
                                      $email = $mostrar['email'];
                                      $numero_de_processo = $mostrar['numero_processo'];
                                      $foto = $mostrar['foto'];
                                      $sexo = $mostrar['sexo'];
                                      $contacto = $mostrar['contacto'];
                                ?>
                                    <div class="row">
                                      <div class="form-group col-lg-4">
                                        <label for="#">Nome</label>
                                        <input type="text" name="nome" value="<?= $mostrar['nome'] ?>" placeholder="Nome Completo" class="form-control form-control-lg" />
                                      </div>
                                      <div class="form-group col-lg-4">
                                        <label for="#">E-mail</label>
                                        <input type="email" name="email" value="<?= $mostrar['email'] ?>" placeholder="E-mail" class="form-control form-control-lg" />
                                      </div>
                                      <div class="form-group col-lg-4">
                                        <label for="#">Processo</label>
                                        <input type="text" name="processo" value="<?= $mostrar['numero_processo'] ?>" placeholder="Processo" class="form-control form-control-lg" />
                                      </div>
                                      <div class="form-group col-lg-4">
                                        <label for="#">Genero</label>
                                        <select name="sexo" value="<?= $sexo ?>" id="" class="form-control form-control-lg">
                                          <option value="M">Masculino</option>
                                          <option value="F">Femenino</option>
                                        </select>
                                      </div>
                                      <div class="form-group col-lg-4">
                                        <label for="#">Contacto</label>
                                        <input type="text" name="contacto" value="<?= $mostrar['contacto'] ?>" placeholder="Contacto" class="form-control form-control-lg" />
                                      </div>
                                      <div class="form-group col-lg-4">
                                        <label for="">Foto</label>
                                        <input type="file" class="form-control" name="foto">
                                      </div>
                                    </div>
                                <?php endforeach;
                                  endif;
                                ?>

                                <div class="row">
                                  <div class="form-group col-lg-4">
                                    <input type="submit" name="atualizarConta" value="Atualizar os dados" class="bg-primary btn">
                                  </div>
                                </div>

                                <?php
                                  if(isset($_POST['atualizarConta'])):

                                    // Pegando os dados dos inputs
                                    $nome  = $_POST['nome'];
                                    $email = $_POST['email'];
                                    $sexo  = $_POST['sexo'];
                                    $processo = $_POST['processo'];
                                    $contacto = $_POST['contacto'];

                                    // Pegando a foto
                                    $target        = "../assets/storage/study/" . basename($_FILES['foto']['name']);
                                    $foto          = $_FILES['foto']['name'];


                                    // Procurar saber se o número de processo adicionado já existe no banco de dados e é diferente
                                    // de zero

                                    $parametros = [
                                      ":nome"     => $nome,
                                      ":email"    => $email,
                                      ":processo" => $processo,
                                      ":sexo"     => $sexo,
                                      ":foto"     => $foto,
                                      ":tel"      => $contacto,
                                      ":id"       => $_SESSION['id']
                                    ];

                                    $updateUsuario = new Model();
                                    $updateUsuario->EXE_NON_QUERY("UPDATE tb_aluno SET
                                      nome=:nome,
                                      email=:email,
                                      sexo=:sexo,
                                      numero_processo=:processo,
                                      foto=:foto,
                                      contacto=:tel
                                      WHERE id_aluno=:id
                                    ", $parametros);

                                    if($updateUsuario):
                                      if (move_uploaded_file($_FILES['foto']['tmp_name'], $target)):
                                          $sms = "Uploaded feito com sucesso";
                                      else:
                                          $sms = "Não foi possível fazer o upload";
                                      endif;
                                      echo "<script>location.href='home.php?id=home'</script>";
                                    endif;
                                  endif;
                                ?>
                              </form>
                            </div>
                        </div>
                    </div>
                  </div>
                <?php
                    else:
                    ?>

                    <div class="ecommerce-widget">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                              <div class="card rounded p-4">
                                <?php

                                  $parametros = [":id" => $_GET['id']];
                                  $buscandoDadosEstagiario = new Model();
                                  $buscando = $buscandoDadosEstagiario->EXE_QUERY("SELECT * FROM tb_aluno WHERE id_aluno=:id", $parametros);
                                  foreach($buscando as $mostrar):
                                    $nome = $mostrar['nome'];
                                  endforeach;

                                ?>
                                <form method="POST" enctype="multipart/form-data">
                                  <div class="row">
                                    <div class="col-lg-4 form-group">
                                      <label for="">Nome do Estagiário</label>
                                      <input type="text" value="<?= $nome ?>" disabled class="form-control form-control-lg">
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-4 form-group">
                                      <label for="">Tema</label>
                                      <input type="text" name="tema" class="form-control form-control-lg">
                                    </div>
                                    <div class="col-lg-4 form-group">
                                      <label for="">Data de Entrega</label>
                                      <input type="date" name="data_entrega" class="form-control form-control-lg">
                                    </div>
                                    <div class="col-lg-4 form-group">
                                      <label for="">Ficheiro <small class="text-warning">Tarefa(arquivo pdf)</small> </label>
                                      <input type="file" name="foto" class="form-control form-control-lg">
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-12">
                                      <textarea name="descricao" class="form-control form-control-lg"></textarea>
                                    </div>
                                  </div>

                                  <div class="row mt-4">
                                    <div class="form-group col-lg-3">
                                      <input type="submit" value="Adicionar tarefa" name="adicionar_tarefa" class="form-control btn btn-primary form-control-lg" />
                                    </div>
                                  </div>

                                  <?php

                                    if(isset($_POST['adicionar_tarefa'])):
                                      $id = $_GET['id'];
                                      $tema = $_POST['tema'];
                                      $data_entrega = $_POST['data_entrega'];
                                      $descricao = $_POST['descricao'];

                                      $target        = "../assets/storage/curriculo/" . basename($_FILES['foto']['name']);
                                      $foto          = $_FILES['foto']['name'];

                                      $parametros = [
                                        ":id"          => $_SESSION['id'],
                                        ":idAluno"     => $id,
                                        ":dataEntrega" => $data_entrega,
                                        ":dataEntregada"   => NULL,
                                        ":arquivoE"    => $foto,
                                        ":arquivoR"    => NULL,
                                        ":tema"        => $tema,
                                        ":descricao"   => $descricao,
                                        ":tarefa" => 0
                                      ];

                                      $inserir = new Model();
                                      $inserir->EXE_NON_QUERY("INSERT INTO tb_atribuir_tarefa
                                      (
                                        id_empresa,
                                        id_aluno,
                                        data_entrega,
                                        data_entregada,
                                        arquivo_tarefa_enviado,
                                        arquivo_tarefa_recibo,
                                        tema,
                                        descricao_tarefa,
                                        estado_tarefa,
                                        data_registro_tarefa
                                      ) VALUES
                                      (
                                        :id,
                                        :idAluno,
                                        :dataEntrega,
                                        :dataEntregada,
                                        :arquivoE,
                                        :arquivoR,
                                        :tema,
                                        :descricao,
                                        :tarefa,
                                        now()) ", $parametros);

                                      if($inserir):
                                        if (move_uploaded_file($_FILES['foto']['tmp_name'], $target)):
                                            $sms = "Uploaded feito com sucesso";
                                        else:
                                            $sms = "Não foi possível fazer o upload";
                                        endif;
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
                                  ?>
                                </form>
                              </div>
                            </div>
                        </div>
                    </div>
                <?php
                    endif;
                 ?>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->

        <!-- Modal de declaração  -->

        <!-- Modal de declaração  -->
    </div>

    <!-- Footer -->
    <?php require __DIR__ . "./includes/footer.php" ?>
    <!-- Footer -->
