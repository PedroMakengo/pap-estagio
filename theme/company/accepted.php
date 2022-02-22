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
                                              <h1 class="h6">Bem-vindo(a) Sr. <strong>Eduardo Jamba</strong></h1>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>

                          <div class="row">
                              <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
                                  <div class="card shadow">
                                      <div class="card-body p-0">
                                          <div class="table-responsive">
                                              <table class="table">
                                                  <thead class="bg-light">
                                                      <tr class="border-0">
                                                          <th class="border-0">#</th>
                                                          <th class="border-0">Nome Completo</th>
                                                          <th class="border-0">Vaga</th>
                                                          <th class="border-0">Motivação</th>
                                                          <th class="border-0">Data de Candidatura</th>
                                                          <th class="border-0">Acções</th>
                                                      </tr>
                                                  </thead>
                                                  <tbody>
                                                      <?php
                                                          $parametros = [":id"    => $_SESSION['id']];
                                                          $listagemCandidatos = new Model();
                                                          $buscandoCandidatos = $listagemCandidatos->EXE_QUERY("SELECT * FROM tb_candidatura_vaga
                                                          INNER JOIN tb_vaga_estagio ON tb_candidatura_vaga.id_vaga_estagio=tb_vaga_estagio.id_vaga_estagio
                                                          INNER JOIN tb_aluno ON tb_candidatura_vaga.id_aluno=tb_aluno.id_aluno
                                                          WHERE tb_vaga_estagio.id_empresa=:id", $parametros);

                                                          if(count($buscandoCandidatos)):
                                                            foreach($buscandoCandidatos as $mostrar):
                                                      ?>
                                                          <tr>
                                                              <td><?= $mostrar['id_candidatura'] ?></td>
                                                              <td><?= $mostrar['nome'] ?></td>
                                                              <td><?= $mostrar['area_atuacao_vaga'] ?> </td>
                                                              <td><?= $mostrar['motivacao_candidatura'] ?></td>
                                                              <td><?= $mostrar['data_registro_candidatura'] ?></td>
                                                              <td>
                                                                <a href="#" class="btn btn-small btn-primary">Ativar</a>
                                                              </td>
                                                          </tr>
                                                        <?php
                                                          endforeach;
                                                        else:?>
                                                            <tr>
                                                              <td colspan="12" class="bg-warning p-2 text-white text-center">Não existe estagiários dentro da tua empresaa</td>
                                                            </tr>
                                                        <?php
                                                        endif;
                                                        ?>
                                                  </tbody>
                                              </table>
                                          </div>
                                      </div>
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
    </div>

    <!-- Footer -->
    <?php require __DIR__ . "./includes/footer.php" ?>
    <!-- Footer -->
