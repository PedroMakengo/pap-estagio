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
                                            <button class="btn btn-small btn-primary">Adicionar uma vaga</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
                                <div class="card shadow">
                                    <h5 class="card-header"><strong>Empresas registradas recentemente...</strong></h5>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table">
                                              <thead>
                                                <tr>
                                                  <th>Id</th>
                                                  <th>Empresa</th>
                                                  <th>Area</th>
                                                  <th>Número de Candidatos</th>
                                                  <th>Estado</th>
                                                  <th class="text-center">Acções</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                <?php
                                                    $parametros = [":id"  => $_SESSION['id']];
                                                    $vagasDisponiveis = new Model();
                                                    $listaDisponivel = $vagasDisponiveis->EXE_QUERY("SELECT * FROM tb_vaga_estagio
                                                    INNER JOIN tb_empresa ON tb_vaga_estagio.id_empresa=tb_empresa.id_empresa");
                                                    if(count($listaDisponivel)):
                                                      foreach($listaDisponivel as $mostrar):?>
                                                        <tr>
                                                          <td><?= $mostrar['id_vaga_estagio'] ?></td>
                                                          <td><a href="#"><?= $mostrar['nome_empresa'] ?></a></td>
                                                          <td><?= $mostrar['area_atuacao_vaga'] ?></td>
                                                          <td><?= $mostrar['numero_candidatura'] ?></td>
                                                          <td><?= $mostrar['estado_vaga'] == 0 ?  'Aberto' :  'Fechado' ?></td>
                                                          <td class="text-center">
                                                            <a href="candidatura_vaga.php?id=<?= $mostrar['id_vaga_estagio'] ?>" class="btn btn-sm btn-primary">Inscrever-se</a>
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

    <!-- Footer -->
    <?php require __DIR__ . "./includes/footer.php" ?>
    <!-- Footer -->
