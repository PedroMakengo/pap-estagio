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
                        <div class="row mb-4">
                            <div class="col-xl-12 col-lg-12">
                                <div class="bg-white border p-4 shadow">
                                    <div class="row pt-1">
                                        <div class="col-lg-6">
                                            <h1 class="h6">Bem-vindo(a) Sr. <strong><?= $_SESSION['nome'] ?></strong></h1>
                                        </div>
                                        <div class="col-lg-6 text-right">
                                            <!-- <h1 class="h6">Painel Administrativo do sistema</h1> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-6">
                            <div class="card p-4">
                              <div class="row">
                                <div class="col-lg-6">
                                  <h5>Gráfico de candidatura</h2>
                                </div>
                                <div class="col-lg-6 text-right">
                                  <a href="#">Relatório</a>
                                </div>

                                <div class="col-lg-12">
                                  <hr>
                                  <h1>Gráfico</h1>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="col-lg-6">
                            <div class="card p-4">
                              <h5>Gráfico sexo</h5>
                            </div>
                          </div>

                          <div class="col-lg-6">
                            <div class="card p-4">
                              <h5>Gráfico de vagas</h5>
                            </div>
                          </div>

                          <div class="col-lg-6">
                            <div class="card p-4">
                              <h5>Gráfico de emissão de declaração</h5>
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
