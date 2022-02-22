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
                                    <div class="row pt-1">
                                      <form method="POST"></form>
                                    </div>
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
                                    <div class="bg-white border rounded p-4">
                                        <div class="row pt-1">
                                            <div class="col-lg-6">
                                                <h1 class="h6">Bem-vindo(a) Sr. <strong><?= $_SESSION['nome'] ?></strong></h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="text-muted">Comunicado de Vagas</h5>
                                            <div class="metric-value d-inline-block">
                                                <h1 class="mb-1">
                                                    <?php

                                                        $parametros = [":id"    => $_SESSION['id']];
                                                        $totalVagasInseridas = new Model();
                                                        $buscarTotalVagas = $totalVagasInseridas->EXE_QUERY("SELECT * FROM tb_vaga_estagio
                                                        WHERE id_empresa=:id", $parametros);

                                                        echo count($buscarTotalVagas);
                                                    ?>
                                                </h1>
                                            </div>
                                            <div
                                                class="metric-label d-inline-block float-right text-success font-weight-bold">
                                                <span><i class="fa fa-fw fa-arrow-up"></i></span><span>5.86%</span>
                                            </div>
                                        </div>
                                        <div id="sparkline-revenue"></div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="text-muted">Total de Estagiários</h5>
                                            <div class="metric-value d-inline-block">
                                                <h1 class="mb-1">
                                                <!-- Contar quantas empresas estão no sistema -->
                                                <?php
                                                    $parametros = [":id" => $_SESSION['id']];
                                                    $totalEstudanteMinhaEmpresa = new Model();
                                                    $totalEstagio = $totalEstudanteMinhaEmpresa->EXE_QUERY("SELECT * FROM tb_candidatura_vaga
                                                    INNER JOIN tb_vaga_estagio ON tb_candidatura_vaga.id_vaga_estagio=tb_vaga_estagio.id_vaga_estagio
                                                    INNER JOIN tb_empresa ON tb_vaga_estagio.id_empresa=tb_empresa.id_empresa
                                                    WHERE tb_empresa.id_empresa=:id", $parametros);
                                                    echo count($totalEstagio);
                                                ?>
                                                <!-- Contar quantas empresas estão no sistema -->
                                                </h1>
                                            </div>
                                            <div
                                                class="metric-label d-inline-block float-right text-success font-weight-bold">
                                                <span><i class="fa fa-fw fa-arrow-up"></i></span><span>5.86%</span>
                                            </div>
                                        </div>
                                        <div id="sparkline-revenue2"></div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="text-muted">Estagiários Sexo (M)</h5>
                                            <div class="metric-value d-inline-block">
                                                <h1 class="mb-1">
                                                <!-- Contar quantas empresas estão no sistema -->
                                                0
                                                </h1>
                                            </div>
                                            <div
                                                class="metric-label d-inline-block float-right text-primary font-weight-bold">
                                                <span>N/A</span>
                                            </div>
                                        </div>
                                        <div id="sparkline-revenue3"></div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="text-muted">Relatórios Submitidos</h5>
                                            <div class="metric-value d-inline-block">
                                                <h1 class="mb-1">
                                                0
                                                </h1>
                                            </div>
                                            <div
                                                class="metric-label d-inline-block float-right text-secondary font-weight-bold">
                                                <span>-2.00%</span>
                                            </div>
                                        </div>
                                        <div id="sparkline-revenue4"></div>
                                    </div>
                                </div>

                                <div class="col-xl-12 col-lg-12">
                                    <div class="card">
                                        <div>
                                            <canvas id="mycompra-chart" style="height: 300px"></canvas>
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
