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
                <div class="p-4 fundoCompany"></div>
                <div class="container-fluid dashboard-content manterTop">
                   <?php
                        if($nifVerificado == "0"):
                    ?>
                      <div class="ecommerce-widget">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12">
                                <div class="bg-white rounded border p-3">
                                    <div class="row pt-1">
                                        <div class="col-lg-6">
                                            <h1 class="h6">Atualização de dados</h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-white rounded mt-4 border p-4">
                                    <form method="POST">
                                      <?php
                                        $parametros = [":id"  => $_SESSION['id']];
                                        $atualizarMeusDados = new Model();
                                        $atualizarDados = $atualizarMeusDados->EXE_QUERY("SELECT * FROM tb_empresa
                                        WHERE id_empresa=:id", $parametros);
                                        foreach($atualizarDados as $mostrar):
                                      ?>
                                        <div class="row">
                                          <div class="col-lg-4 form-group">
                                            <label for="">Nome da Empresa</label>
                                            <input type="text" name="nome" value="<?= $mostrar['nome_empresa'] ?>" class="form-control form-control-lg" />
                                          </div>
                                          <div class="col-lg-4 form-group">
                                            <label for="">E-mail</label>
                                            <input type="email" name="email" value="<?= $mostrar['email_empresa'] ?>" class="form-control form-control-lg" />
                                          </div>
                                          <div class="col-lg-4 form-group">
                                            <label for="">NIF</label>
                                            <input type="text" name="nif" value="<?= $mostrar['nif'] ?>" class="form-control form-control-lg" />
                                          </div>
                                          <div class="col-lg-4 form-group">
                                            <label for="">Localização</label>
                                            <input type="text" name="localizacao" value="<?= $mostrar['localizacao'] ?>" class="form-control form-control-lg" />
                                          </div>
                                          <div class="col-lg-4 form-group">
                                            <label for="">Contacto</label>
                                            <input type="tel" name="tel" value="<?= $mostrar['contacto'] ?>" class="form-control form-control-lg" />
                                          </div>
                                          <div class="col-lg-4 form-group">
                                            <label for="">Responsável</label>
                                            <input type="text" name="responsavel" value="<?= $mostrar['responsavel_empresa'] ?>" class="form-control form-control-lg" />
                                          </div>
                                          <div class="col-lg-12 form-group">
                                            <label for="">Área de Atuação da Empresa</label>
                                            <input type="text" name="area" value="<?= $mostrar['area_atuacao'] ?>" class="form-control form-control-lg" />
                                          </div>
                                        </div>
                                      <?php
                                        endforeach;?>
                                        <div class="row">
                                          <div class="col-lg-3">
                                            <input type="submit" name="atualizar_submit" value="Atualização" class="bg-primary form-control form-control-lg" />
                                          </div>
                                        </div>

                                        <?php
                                          if(isset($_POST['atualizar_submit'])):
                                            // Dados do get
                                            $idEmpresa = $_SESSION['id'];

                                            $nome  = $_POST['nome'];
                                            $email = $_POST['email'];
                                            $area  = $_POST['area'];
                                            $ceo   = $_POST['responsavel'];
                                            $tel   = $_POST['tel'];
                                            $gps   = $_POST['localizacao'];
                                            $nif   = $_POST['nif'];

                                            $parametros = [
                                              ":nome"     => $nome,
                                              ":email"    => $email,
                                              ":area"     => $area,
                                              ":ceo"      => $area,
                                              ":tel"      => $tel,
                                              ":gps"      => $gps,
                                              ":nif"      => $nif,
                                              ":idEmpresa" => $idEmpresa
                                            ];
                                            $atualizarDadosInserir = new Model();
                                            $atualizarDadosInserir->EXE_NON_QUERY("UPDATE tb_empresa SET
                                              nome_empresa=:nome,
                                              email_empresa=:email,
                                              area_atuacao=:area,
                                              responsavel_empresa=:ceo,
                                              contacto=:tel,
                                              localizacao=:gps,
                                              nif=:nif
                                              WHERE
                                              id_empresa=:idEmpresa
                                            ", $parametros);

                                            if($atualizarDadosInserir):
                                              echo "<script>location.href='home.php?id=$idEmpresa'</script>";
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
                          <div class="row mb-4">
                              <div class="col-xl-12 col-lg-12">
                                  <div class="bg-white border p-4">
                                      <div class="row pt-1">
                                          <div class="col-lg-6">
                                              <h1 class="h6"><strong><?= $_SESSION['nome'] ?></strong></h1>
                                          </div>
                                          <div class="col-lg-6 text-right">
                                              <h1 class="h6">Atualizar a minha conta</h1>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>

                          <div class="row">
                              <?php
                                $parametros = [":id" => $_SESSION['id']];
                                $buscandoMeuPerfil = new Model();
                                $buscando = $buscandoMeuPerfil->EXE_QUERY("SELECT * FROM tb_empresa WHERE id_empresa=:id", $parametros);
                                foreach ($buscando as $mostrar):
                                  $nome           = $mostrar['nome_empresa'];
                                  $email          = $mostrar['email_empresa'];
                                  $nif            = $mostrar['nif'];
                                  $localizacao    = $mostrar['localizacao'];
                                  $contacto       = $mostrar['contacto'];
                                  $responsavel    = $mostrar['responsavel_empresa'];
                                  $foto           = $mostrar['foto'];
                                  $area           = $mostrar['area_atuacao'];
                                endforeach;
                              ?>
                              <div class="col-lg-4 col-xl-4">
                                <div class="card p-4">
                                  <img src="../assets/images/profile/<?= $foto ?>" alt="" class="mb-2" style="margin: 0 auto; width: 80px; height: 80px; border-radius: 80px">
                                  <p class="m-auto text-center"><strong><?= $nome ?></strong></p>
                                  <p class="m-auto text-center"><strong><?= $email ?></strong></p>
                                  <hr>

                                  <div class="text-center m-auto">
                                    <p class="mt-0">Nif: <strong><?= $nif ?></strong></p>
                                    <p class="mt-0">Contacto: <strong><?= $contacto ?></strong></p>
                                    <p class="mt-0">Localização: <strong><?= $localizacao ?></strong></p>
                                    <p class="mt-0">Aréa de atuação: <strong><?= $area ?></strong></p>
                                    <p class="mt-0">Responsável da Empresa: <strong><?= $responsavel ?></strong></p>
                                  </div>
                                </div>
                              </div>
                              <div class="col-xl-8 col-lg-8 col-md-6 col-sm-12 col-12">
                                  <div class="card shadow">
                                      <div class="card-body p-4">
                                        <form method="post">
                                          <div class="row">
                                            <?php
                                              $parametros = [":id" => $_SESSION['id']];
                                              $perfilEditando = new Model();
                                              $edita = $perfilEditando->EXE_QUERY("SELECT * FROM tb_empresa WHERE id_empresa=:id", $parametros);

                                              foreach ($edita as $mostrar):?>
                                                <div class="col-lg-6 form-group">
                                                  <label for="">E-mail</label>
                                                  <input type="email" class="form-control" name="email" value="<?=$mostrar['email_empresa'] ?>" />
                                                </div>
                                                <div class="col-lg-6 form-group">
                                                  <label for="">Empresa</label>
                                                  <input type="text" class="form-control" name="nome" value="<?= $mostrar['nome_empresa'] ?>" />
                                                </div>
                                                <div class="col-lg-6 form-group">
                                                  <label for="">Responsável da Empresa</label>
                                                  <input type="text" class="form-control" name="responsavel" value="<?= $mostrar['responsavel_empresa'] ?>">
                                                </div>
                                                <div class="col-lg-6 form-group">
                                                  <label for="">Nif</label>
                                                  <input type="text" class="form-control" name="nif" value="<?= $mostrar['nif'] ?>">
                                                </div>
                                                <div class="col-lg-6 form-group">
                                                  <label for="">Localização</label>
                                                  <input type="text" class="form-control" name="localizacao" value="<?= $mostrar['localizacao'] ?>">
                                                </div>
                                                <div class="col-lg-6 form-group">
                                                  <label for="">Contacto</label>
                                                  <input type="tel" maxlength="9" class="form-control" name="contacto" value="<?= $mostrar['contacto'] ?>">
                                                </div>
                                                <div class="col-lg-12 form-group">
                                                  <label for="">Area de atuação</label>
                                                  <input type="text" class="form-control" name="area" value="<?= $mostrar['area_atuacao'] ?>">
                                                </div>
                                              <?php
                                              endforeach;?>
                                            <div class="col-lg-4 form-group">
                                              <input type="submit" class="form-control btn-primary" name="editar" value="Atualizar">
                                            </div>
                                          </div>
                                        </form>

                                        <!-- Editar Perfil -->
                                        <?php

                                        if(isset($_POST['editar'])):

                                          $nome         = $_POST['nome'];
                                          $responsavel  = $_POST['responsavel'];
                                          $nif          = $_POST['nif'];
                                          $localizacao  = $_POST['localizacao'];
                                          $area         = $_POST['area'];
                                          $contacto     = $_POST['contacto'];
                                          $email        = $_POST['email'];

                                          $parametros = [
                                            ":nome"     => $nome,
                                            ":email"    => $email,
                                            ":gps"      => $localizacao,
                                            ":ceo"      => $responsavel,
                                            ":area"     => $area,
                                            ":tel"      => $contacto,
                                            ":nif"      => $nif,
                                            ":id"       => $_SESSION['id']
                                          ];
                                          $atualizarPerfil = new Model();
                                          $atualizarPerfil->EXE_NON_QUERY("UPDATE tb_empresa SET
                                            nome_empresa=:nome,
                                            email_empresa=:email,
                                            area_atuacao=:area,
                                            responsavel_empresa=:ceo,
                                            contacto=:tel,
                                            localizacao=:gps,
                                            nif=:nif
                                            WHERE
                                            id_empresa=:id
                                          ", $parametros);

                                            if($atualizarPerfil):
                                              echo "<script>location.href='profile.php?id=perfil'</script>";
                                            endif;
                                          endif;
                                          ?>
                                        <!-- Editar Perfil -->
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                    <?php
                    endif;?>
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
