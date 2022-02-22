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
                    <div class="ecommerce-widget">

                        <div class="row mb-4">
                            <div class="col-xl-12 col-lg-12">
                                <div class="bg-white border p-4">
                                    <div class="row pt-1">
                                        <div class="col-lg-6">
                                            <h1 class="h6">Olá, Sr(a). <strong>Eduardo Jamba</strong></h1>
                                            <span>Nesta tela tens a possibilidade de adicionar uma nova vaga</span>
                                        </div>
                                        <div class="col-lg-6 text-right">
                                            <button class="btn btn-small btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Adicionar uma vaga</button>
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
                                              <thead>
                                                <tr>
                                                  <th>Id</th>
                                                  <th>Area</th>
                                                  <th>Nº Candidatos</th>
                                                  <th>Nº Candidatura Disponível</th>
                                                  <th>Área de atuação</th>
                                                  <th>Estado</th>
                                                  <th class="text-center">Acções</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                <?php
                                                    $parametros = [":id"  => $_SESSION['id']];
                                                    $vagasDisponiveis = new Model();
                                                    $listaDisponivel = $vagasDisponiveis->EXE_QUERY("SELECT * FROM tb_vaga_estagio
                                                    INNER JOIN tb_empresa ON tb_vaga_estagio.id_empresa=tb_empresa.id_empresa
                                                    WHERE tb_empresa.id_empresa=:id", $parametros);
                                                    if(count($listaDisponivel)):
                                                      foreach($listaDisponivel as $mostrar):?>
                                                        <tr>
                                                          <td><?= $mostrar['id_vaga_estagio'] ?></td>
                                                          <td><?= $mostrar['area_atuacao_vaga'] ?></td>
                                                          <td><?= $mostrar['numero_candidatura'] ?></td>
                                                          <td><?= $mostrar['numero_candidatura'] ?></td>
                                                          <td><?= $mostrar['area_atuacao_vaga'] ?></td>
                                                          <td><?= $mostrar['estado_vaga'] == 0 ?  'Aberto' :  'Fechado' ?></td>
                                                          <td class="text-center">
                                                            <a href="candidatura_vaga.php?id=<?= $mostrar['id_vaga_estagio'] ?>" class="btn btn-sm btn-danger">
                                                              <i class="fas fa-trash"></i>
                                                            </a>
                                                            <a href="candidatura_vaga.php?id=<?= $mostrar['id_vaga_estagio'] ?>" class="btn btn-sm btn-primary">
                                                              <i class="fas fa-edit"></i>
                                                            </a>
                                                          </td>
                                                      </tr>
                                                      <?php endforeach;?>
                                                    <?php
                                                  else:?>
                                                    <tr>
                                                      <td class="text-center bg-warning text-white" colspan="12">Não existe vagas</td>
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
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->
    </div>

    <!-- MODAL -->
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Adicionar vaga</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST">
              <div class="row">
                <div class="col-lg-4 form-group">
                  <label for="">Nome da Empresa</label>
                  <input type="text" disabled value="<?= $_SESSION['nome'] ?>" class="form-control form-control-lg" />
                </div>
                <div class="col-lg-4 form-group">
                  <label for="">NIF</label>
                  <input type="text" disabled value="<?= $_SESSION['nif'] ?>" class="form-control form-control-lg" />
                </div>
                <div class="col-lg-4 form-group">
                  <label for="">Contacto</label>
                  <input type="text" disabled value="<?= $_SESSION['contacto'] ?>" class="form-control form-control-lg" />
                </div>
                <div class="col-lg-8 form-group">
                  <label for="">Área de atuação</label>
                  <input type="text" name="area_atuacao" class="form-control form-control-lg" placeholder="Área de atuação da vaga" />
                </div>
                <div class="col-lg-4 form-group">
                  <label for="">Quantidade de Candidatos</label>
                  <input type="number" name="qt_candidatos" class="form-control form-control-lg" />
                </div>

                <div class="col-lg-4 form-group">
                  <input type="submit" value="Adicionar vaga" class="form-control btn-primary btn" name="adicionar_vaga" />
                </div>
              </div>
              <?php

                if(isset($_POST['adicionar_vaga'])):

                  $quantidadeCandidatos = $_POST['qt_candidatos'];
                  $area_atuacao = $_POST['area_atuacao'];

                  $parametros = [
                    ":id_empresa"   => $_SESSION['id'],
                    ":area"         => $area_atuacao,
                    ":quantidade"   => $quantidadeCandidatos
                  ];

                  $inserirVagaMinha = new Model();
                  $inserirVagaMinha->EXE_NON_QUERY("INSERT INTO tb_vaga_estagio
                  (id_empresa, area_atuacao_vaga, numero_candidatura, data_registro_vaga, estado_vaga)
                   VALUES
                  (:id_empresa, :area, :quantidade, now(), 0) ", $parametros);

                   if($inserirVagaMinha):
                    // echo "<script>location.href='vacancy.php?id=vaga'</script>";
                   endif;
                endif;
              ?>

            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- MODAL -->

    <!-- Footer -->
    <?php require __DIR__ . "./includes/footer.php" ?>
    <!-- Footer -->
