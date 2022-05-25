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
                <div class="container-fluid dashboard-content ">
                    <div class="ecommerce-widget">
                    <div class="row">
                            <!-- Retornar os dados do usuário -->
                            <?php
                              $parametros = [":id" => $_SESSION['id']];
                              $buscandoDadosUsuarioEstudante = new Model();
                              $buscando = $buscandoDadosUsuarioEstudante->EXE_QUERY("SELECT * FROM tb_admin WHERE id_admin=:id", $parametros);
                              foreach ($buscando as $mostrar):
                                $nome  = $mostrar['nome_admin'];
                                $email = $mostrar['email_admin'];
                                $foto   = $mostrar['foto_admin'];
                              endforeach;
                            ?>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                              <div class="card rounded p-4">
                                 <div class="m-auto text-center">
                                   <img src="../assets/images/profile/<?= $foto ?>" style="width: 150px; height: 150px;" alt="">
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
                                    $selecionarDadosDoUsuarioLogado = $atualizarDadosUsuarioLogado->EXE_QUERY("SELECT * FROM tb_admin WHERE id_admin=:idUsuarioLogado", $parametros);

                                    if($selecionarDadosDoUsuarioLogado):
                                      foreach($selecionarDadosDoUsuarioLogado as $mostrar): ?>
                                      <div class="row">
                                        <div class="form-group col-lg-6">
                                          <label for="#">Nome</label>
                                          <input type="text" name="nome" value="<?= $mostrar['nome_admin'] ?>" placeholder="Nome Completo" class="form-control form-control-lg" />
                                        </div>
                                        <div class="form-group col-lg-6">
                                          <label for="#">E-mail</label>
                                          <input type="email" name="email" value="<?= $mostrar['email_admin'] ?>" placeholder="E-mail" class="form-control form-control-lg" />
                                        </div>
                                        <div class="form-group col-lg-6">
                                          <label for="">Foto</label>
                                          <input type="file" class="form-control" name="foto">
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
                                        // Pegando a foto
                                        $target        = "../assets/images/profile/" . basename($_FILES['foto']['name']);
                                        $senha         = $_POST['senha'] === '' ? $mostrar['senha_admin'] : md5(md5($_POST['senha']));
                                        $foto          = $_FILES['foto']['name'] === '' ? $mostrar['foto'] : $_FILES['foto']['name'];

                                        // Procurar saber se o número de processo adicionado já existe no banco de dados e é diferente
                                        // de zero

                                        $parametros = [
                                          ":nome"     => $nome,
                                          ":email"    => $email,
                                          ":foto"     => $foto,
                                          ":senha"    => $senha,
                                          ":id"       => $_SESSION['id']
                                        ];

                                        $updateUsuario = new Model();
                                        $updateUsuario->EXE_NON_QUERY("UPDATE tb_admin SET
                                          nome_admin=:nome,
                                          senha_admin=:senha,
                                          email_admin=:email,
                                          foto_admin=:foto
                                          WHERE id_admin=:id
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
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->
    </div>

    <!-- Footer -->
    <?php require __DIR__ . "./includes/footer.php" ?>
    <!-- Footer -->
    <?php require 'includes/grafico-estatistica.php' ?>
