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
                        <div class="row">
                            <!-- Retornar os dados do usuário -->
                            <?php
                              $parametros = [":id" => $_SESSION['id']];
                              $buscandoDadosUsuarioEstudante = new Model();
                              $buscando = $buscandoDadosUsuarioEstudante->EXE_QUERY("SELECT * FROM tb_aluno WHERE id_aluno=:id", $parametros);
                              foreach ($buscando as $mostrar):
                                $nome  = $mostrar['nome'];
                                $email = $mostrar['email'];
                                $foto  = $mostrar['foto'];
                                $sexo  = $mostrar['sexo'] === "M" ? 'Masculino' : "Femenino";
                                $tel   = $mostrar['contacto'];
                                $escola = $mostrar['escola_frequenta'];
                              endforeach;
                            ?>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                              <div class="card rounded p-4">
                                 <div class="m-auto text-center">
                                   <img src="../assets/storage/study/<?= $foto ?>" style="width: 150px; height: 150px;" alt="">
                                   <hr>
                                   <h3 class="mt-2">Estudante</h3>
                                   <div class="row">
                                     <div class="col-lg-12">
                                       <span>Nome: <strong><?= $nome ?></strong></span>
                                       <hr>
                                     </div>
                                     <div class="col-lg-12">
                                       <span>E-mail: <strong><?= $email ?></strong></span>
                                       <hr>
                                     </div>
                                     <div class="col-lg-12">
                                       <span>Genero: <strong><?= $sexo ?></strong></span>
                                       <hr>
                                     </div>
                                     <div class="col-lg-12">
                                       <span>Tel: <strong><?= $tel ?></strong></span>
                                       <hr>
                                     </div>
                                     <div class="col-lg-12">
                                       <span>Escola: <strong><?= $escola ?></strong></span>
                                       <hr>
                                     </div>
                                   </div>
                                 </div>
                              </div>
                            </div>

                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
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
                                        <div class="form-group col-lg-6">
                                          <label for="#">Nome</label>
                                          <input type="text" name="nome" value="<?= $mostrar['nome'] ?>" placeholder="Nome Completo" class="form-control form-control-lg" />
                                        </div>
                                        <div class="form-group col-lg-6">
                                          <label for="#">E-mail</label>
                                          <input type="email" name="email" value="<?= $mostrar['email'] ?>" placeholder="E-mail" class="form-control form-control-lg" />
                                        </div>
                                        <div class="form-group col-lg-6">
                                          <label for="#">Processo</label>
                                          <input type="text" name="processo" value="<?= $mostrar['numero_processo'] ?>" placeholder="Processo" class="form-control form-control-lg" />
                                        </div>
                                        <div class="form-group col-lg-6">
                                          <label for="#">Genero</label>
                                          <select name="sexo" value="<?= $sexo ?>" id="" class="form-control form-control-lg">
                                            <option value="M">Masculino</option>
                                            <option value="F">Femenino</option>
                                          </select>
                                        </div>
                                        <div class="form-group col-lg-6">
                                          <label for="#">Contacto</label>
                                          <input type="text" name="contacto" value="<?= $mostrar['contacto'] ?>" placeholder="Contacto" class="form-control form-control-lg" />
                                        </div>
                                        <div class="form-group col-lg-6">
                                          <label for="">Foto</label>
                                          <input type="file" class="form-control" name="foto">
                                        </div>
                                        <div class="form-group col-lg-6">
                                          <label for="#">Escola Frequenta</label>
                                          <input type="text" name="escola_frequenta" value="<?= $mostrar['escola_frequenta'] ?>" placeholder="Escola que frequenta" class="form-control form-control-lg" />
                                        </div>
                                        <div class="form-group col-lg-6">
                                          <label for="#">Palavra-passe</label>
                                          <input type="text" name="senha"  placeholder="" class="form-control form-control-lg" />
                                        </div>
                                      </div>

                                      <div class="row">
                                    <div class="form-group col-lg-4">
                                      <input type="submit" name="atualizarPerfil" value="Atualizar os dados" class="bg-primary btn">
                                    </div>
                                  </div>

                                  <?php
                                    if(isset($_POST['atualizarPerfil'])):
                                        // Pegando os dados dos inputs
                                        $nome  = $_POST['nome'];
                                        $email = $_POST['email'];
                                        $sexo  = $_POST['sexo'];
                                        $processo = $_POST['processo'];
                                        $contacto = $_POST['contacto'];
                                        $escola   = $_POST['escola_frequenta'];

                                        // Pegando a foto
                                        $target        = "../assets/storage/study/" . basename($_FILES['foto']['name']);
                                        $senha         = $_POST['senha'] === '' ? $mostrar['senha'] : md5(md5($_POST['senha']));
                                        $foto          = $_FILES['foto']['name'] === '' ? $mostrar['foto'] : $_FILES['foto']['name'];


                                        // Procurar saber se o número de processo adicionado já existe no banco de dados e é diferente
                                        // de zero

                                        $parametros = [
                                          ":nome"     => $nome,
                                          ":email"    => $email,
                                          ":processo" => $processo,
                                          ":sexo"     => $sexo,
                                          ":foto"     => $foto,
                                          ":tel"      => $contacto,
                                          ":escola"   => $escola,
                                          ":senha"    => $senha,
                                          ":id"       => $_SESSION['id']
                                        ];

                                        $updateUsuario = new Model();
                                        $updateUsuario->EXE_NON_QUERY("UPDATE tb_aluno SET
                                          nome=:nome,
                                          senha=:senha,
                                          email=:email,
                                          sexo=:sexo,
                                          numero_processo=:processo,
                                          foto=:foto,
                                          contacto=:tel,
                                          escola_frequenta=:escola
                                          WHERE id_aluno=:id
                                        ", $parametros);

                                        if($updateUsuario):
                                          if (move_uploaded_file($_FILES['foto']['tmp_name'], $target)):
                                              $sms = "Uploaded feito com sucesso";
                                          else:
                                              $sms = "Não foi possível fazer o upload";
                                          endif;
                                            echo '<script>
                                                  swal({
                                                    title: "Operação efetuada com sucesso!",
                                                    text: "Os seus dados foram atualizados com sucesso",
                                                    icon: "success",
                                                    button: "Fechar!",
                                                  })
                                                </script>';
                                            echo '<script>
                                                setTimeout(function() {
                                                    window.location.href="perfil.php?id=perfil";
                                                }, 2000)
                                            </script>';
                                        endif;
                                    endif;
                                  ?>
                                  <?php endforeach;
                                    endif;
                                  ?>


                                </form>
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
