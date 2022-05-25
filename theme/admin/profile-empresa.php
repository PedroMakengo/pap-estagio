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
                        <?php
                          $id = $_GET['id'];
                          $parametros = [":id" => $id];
                          $buscarProfileEstudante = new Model();
                          $buscando = $buscarProfileEstudante->EXE_QUERY("SELECT * FROM tb_empresa WHERE id_empresa=:id", $parametros);
                          foreach($buscando as $mostrar):
                            $nome         = $mostrar['nome_empresa'];
                            $foto         = $mostrar['foto'];
                            $contacto     = $mostrar['contacto'];
                            $nif          = $mostrar['nif'];
                            $localizacao  = $mostrar['localizacao'];
                            $area         = $mostrar['area_atuacao'];
                            $responsavel  = $mostrar['responsavel_empresa'];
                          endforeach;
                        ?>

                        <div class="row mb-4">
                            <div class="col-xl-12 col-lg-12">
                                <div class="bg-white border p-4">
                                    <div class="row pt-1">
                                        <div class="col-lg-6 text-left">
                                            <h1 class="h6">
                                              <a href="company.php?id=company">
                                                <i class="fas fa-arrow-circle-left"></i> Voltar
                                              </a>
                                            </h1>
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
                                        <p>Todas as informações relacionadas a empresa <strong><?= $nome ?></strong> encontras nesta sessão.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-8 col-lg-8 col-md-6 col-sm-12 col-12">
                              <div class="card">
                                  <h5 class="card-header"><strong>Informações da empresa</strong></h5>
                                  <div class="card-body p-4">
                                    <div class="row">
                                      <div class="col-lg-4">
                                        <img src="../assets/storage/study/<?= $foto ?>" alt="<?= $nome ?>" class="col-lg-12">
                                      </div>
                                      <div class="col-lg-8">
                                        <div class="row">
                                          <div class="col-lg-12">
                                            <h5>Nome da empresa: <strong><?= $nome ?></strong></h5><hr />
                                          </div>
                                          <div class="col-lg-12">
                                            <h5>Responsável: <strong><?= $responsavel ?></strong></h5><hr />
                                          </div>
                                          <div class="col-lg-6">
                                            <h5>Localização: <strong><?= $localizacao ?></strong></h5>
                                          </div>
                                          <div class="col-lg-6">
                                            <h5>Contacto: <strong><?= $contacto ?></strong></h5>
                                          </div>
                                          <div class="col-lg-12">
                                            <hr>
                                          </div>
                                          <div class="col-lg-6">
                                            <h5>Area: <strong><?= $area ?></strong></h5>
                                          </div>
                                          <div class="col-lg-6">
                                            <h5>NIF: <strong><?= $nif ?></strong></h5>
                                          </div>
                                        </div>
                                      </div>
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
    <?php require 'includes/grafico-atividades.php' ?>
