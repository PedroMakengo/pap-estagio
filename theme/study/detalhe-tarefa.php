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
                    if($processoVerificando == "0"):
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

                      <?php

                        $parametros = [":id" => $_GET['id']];
                        $buscandoTodosDadosDaMinhaTarefa = new Model();
                        $buscandoTarefa = $buscandoTodosDadosDaMinhaTarefa->EXE_QUERY("SELECT * FROM tb_atribuir_tarefa
                        INNER JOIN tb_aluno ON tb_atribuir_tarefa.id_aluno=tb_aluno.id_aluno
                        WHERE id_atribuir_tarefa=:id", $parametros);

                        foreach($buscandoTarefa as $mostrar):
                          $tema = $mostrar['tema'];
                          $descricao_tarefa = $mostrar['descricao_tarefa'];
                          $dataEntrega = $mostrar['data_entrega'];
                          $dataAtiva   = $mostrar['data_entregada'];
                          $arquivo     = $mostrar['arquivo_tarefa_enviado'];
                          $responsavel = $mostrar['nome'];
                          $estado      = $mostrar['estado_tarefa'] === '0' ? "<span class='text-warning'>Processando</span>" : "<span class='text-success'>Aprovado</span>";
                        endforeach;
                      ?>

                      <div class="row mb-4">
                          <div class="col-xl-12 col-lg-12">
                              <div class="bg-white border p-4">
                                  <div class="row pt-1">
                                      <div class="col-lg-6 text-left">
                                          <h1 class="h6">
                                            <a href="meuestagio.php?id=meuestagio">
                                              <i class="fas fa-arrow-circle-left"></i> Voltar
                                            </a>
                                          </h1>
                                      </div>
                                      <div class="col-lg-6 text-right">
                                          <h1 class="h6">Tarefa: <strong><?= $tema ?></strong></h1>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>


                      <div class="row">
                        <!-- recent orders  -->
                        <div class="col-xl-4 col-lg-4 scol-md-6 col-sm-12 col-12">
                          <div class="card">
                            <h5 class="card-header"><strong>Descrição</strong></h5>
                            <div class="card-body p-4">
                              <p><?= $descricao_tarefa ?></p>
                              <hr>
                              <p>Data de Entrega: <strong><?= $dataEntrega ?></strong> </p>
                              <hr>
                              <p>Estado: <strong><?=  $estado  ?></strong></p>
                              <hr>
                              <p>Data Submetida: <strong><?= $dataAtiva ?></strong></p>
                            </div>
                          </div>

                          <div class="card mt-2">
                            <h5 class="card-header"><strong>Arquivos</strong></h5>
                            <div class="card-body p-4">
                              <a href="">Abrir arquivo da Tarefa</a>
                              <hr>
                              <a href="">Meu arquivo submetido</a>
                            </div>
                          </div>

                          <div class="card mt-2">
                            <h5 class="card-header"><strong>Responsável pela atividade</strong></h5>
                            <div class="card-body p-4">
                              <p><?= $responsavel ?></p>
                            </div>
                          </div>
                        </div>

                        <?php if($arquivo === ''): ?>
                        <div class="col-xl-8 col-lg-8 col-md-6 col-sm-12 col-12">
                          <div class="card">
                            <h5 class="card-header"><strong>Enviar tarefa</strong></h5>
                            <div class="card-body p-4">
                              <form method="POST" enctype="multipart/form-data">
                                <div class="row">
                                  <div class="col-lg-6 form-group">
                                    <label for="">Tema do </label>
                                    <input type="text" value="<?= $tema ?>" disabled class="form-control form-control-lg" />
                                  </div>
                                  <div class="col-lg-6 form-group">
                                    <label for="">Data de Envio</label>
                                    <input type="date" name="data_envio" class="form-control form-control-lg" />
                                  </div>
                                  <div class="col-lg-12 form-group">
                                    <label for="">Arquivo do Trabalho</label>
                                    <input type="file" name="foto" class="form-control form-control-lg" />
                                  </div>
                                  <!-- <div class="col-lg-12 form-group">
                                    <label for="">Descrição da atividade</label>
                                    <textarea name="descricao" id="" class="form-control form-control-lg"></textarea>
                                  </div> -->

                                  <div class="col-lg-4">
                                    <input type="submit" name="adicionar" class="btn btn-primary form-control form-control-lg" value="Enviar Tarefa"/>
                                  </div>
                                </div>

                                <?php
                                  if(isset($_POST['adicionar'])):

                                    $data_envio   = $_POST['data_envio'];
                                    // $descricao    = $_POST['descricao'];

                                    $target        = "../assets/storage/curriculo/" . basename($_FILES['foto']['name']);
                                    $foto          = $_FILES['foto']['name'];

                                    $parametros = [
                                      ":data_envio" => $data_envio,
                                      ":foto"       => $foto,
                                      ":id"         => $_GET['id']
                                    ];

                                    $atualizarMinhaAtividade = new Model();
                                    $atualizarMinhaAtividade->EXE_NON_QUERY("UPDATE tb_atribuir_tarefa SET
                                      data_entregada=:data_envio,
                                      arquivo_tarefa_recibo=:foto
                                      WHERE id_atribuir_tarefa=:id", $parametros);

                                    if($atualizarMinhaAtividade):
                                      if (move_uploaded_file($_FILES['foto']['tmp_name'], $target)):
                                          $sms = "Uploaded feito com sucesso";
                                      else:
                                          $sms = "Não foi possível fazer o upload";
                                      endif;
                                        echo '<script>
                                              swal({
                                                title: "Operação efetuada com sucesso!",
                                                text: "Inserção efetuada com sucesso",
                                                icon: "success",
                                                button: "Fechar!",
                                              })
                                            </script>';
                                        echo '<script>
                                                setTimeout(function() {
                                                  window.location.href="meuestagio.php?id=meuestagio";
                                                }, 2000)
                                            </script>';
                                    endif;
                                  endif;
                                ?>
                              </form>
                            </div>
                          </div>
                        </div>
                        <?php else: ?>
                        <div class="col-xl-8 col-lg-8 col-md-6 col-sm-12 col-12">
                          <div class="card bg-success text-white p-4 text-center">
                            <p>Tarefa efuatada com sucesso</p>
                          </div>
                        </div>
                        <?php endif;?>
                      </div>
                    </div>
                    <?php endif; ?>
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
