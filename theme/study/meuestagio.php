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
                                        <h1 class="h6">Atualmente </h1>
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
                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                              <div class="card p-4">
                                <h1 class="h6">Sobre o meu estágio</h1>
                              </div>

                              <div class="card p-4">
                                <div class="row mb-2">
                                  <div class="col-lg-6">
                                    <h2 class="h6">Meus relatórios</h2>
                                  </div>
                                  <div class="col-lg-6 text-right">
                                    <button class="btn btn-primary btn-sm" >Adicionar relatório</button>
                                  </div>
                                </div>
                                <table class="table">
                                  <thead>
                                    <tr>
                                      <th>Id</th>
                                      <th>Arquivo</th>
                                      <th>Estado</th>
                                      <th>Valor do Relatório</th>
                                      <th>Data</th>
                                      <th>Acções</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php

                                      $parametros = [":id"  => $_SESSION['id']];
                                      $meusRelatorios = new Model();
                                      $buscarMeusRelatorios = $meusRelatorios->EXE_QUERY("SELECT * FROM tb_relatorio_estagio WHERE id_aluno=:id",
                                      $parametros);

                                      if(count($buscarMeusRelatorios)):
                                        foreach($buscarMeusRelatorios as $mostrar):
                                    ?>
                                        <tr>
                                          <!-- Trabalhar nesta área -->
                                        </tr>
                                    <?php
                                        endforeach;
                                      else:?>
                                        <tr>
                                          <td colspan="12" class="bg-warning text-center text-white">Não existe nenhum relatório</td>
                                        </tr>
                                    <?php
                                      endif;?>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                              <div class="card p-4">
                                <h1 class="h6 text-center">Perfil do meu estágio</h1>

                                <div class="mt-4 text-center">
                                  <img src="../assets/images/profile/<?= $_SESSION['foto'] ?>"
                                      style="width: 80px; height: 80px; margin: 0 auto; border-radius: 50%; border: 2px solid #1f6febe6;
                                      ">
                                    <ul class="mt-2">
                                      <li class="mb-2">Nome <span class="badge badge-primary"><?= $_SESSION['nome'] ?></span></li>
                                      <li class="mb-2">Nº Processo <span class="badge badge-primary"><?= $_SESSION['processo'] ?></span></li>
                                      <li class="mb-2">E-mail <span class="badge badge-primary"><?= $_SESSION['email'] ?></span></li>
                                    </ul>
                                </div>
                              </div>
                              <div class="card p-4 mt-2">
                                <h1 class="h6">Efetuar o pedido de declaração para estágio</h1>
                                <div class="mt-4">
                                  <a href="#" class="btn btn-primary  col-lg-12">Fazer</a>
                                </div>
                              </div>
                            </div>
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
