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
                                            <h1 class="h6">Nome da Empresa: <strong><?= $_SESSION['nome'] ?></strong></h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                              <div class="card p-4">
                                <div class="row">
                                  <div class="col-lg-6">
                                    <h5>Gráfico de Vagas</h2>
                                  </div>
                                  <div class="col-lg-6 text-right">
                                    <a href="relatorio-pdf.php?id=vagasEmpresa" target="_blank">Relatório</a>
                                  </div>

                                  <div class="col-lg-12">
                                    <hr>
                                    <div>
                                      <canvas id="graficoVaga" style="height: 230px"></canvas>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                              <div class="card p-4">
                                <div class="row">
                                  <div class="col-lg-6">
                                    <h5>Gráfico de Estagiários</h2>
                                  </div>
                                  <div class="col-lg-6 text-right">
                                    <a href="relatorio-pdf.php?id=estagiarios" target="_blank">Relatório</a>
                                  </div>

                                  <div class="col-lg-12">
                                    <hr>
                                    <div>
                                      <canvas id="graficoVaga" style="height: 230px"></canvas>
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
