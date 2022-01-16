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
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card card-static-1 shadow">
                                    <div class="card-body">
                                        <h5 class="text-muted">Total Empresas</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1">
                                                <!-- Contar quantas empresas estão no sistema -->
                                                <?php
                                                  $contEmpresa = new Model();
                                                  $empresas = $contEmpresa->EXE_QUERY("SELECT * FROM tb_empresa");
                                                  echo count($empresas);
                                                  ?>
                                                <!-- Contar quantas empresas estão no sistema -->
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
                                <div class="card card-static-2 shadow">
                                    <div class="card-body">
                                        <h5 class="text-muted">Total de Estudantes</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1">
                                              <!-- Contar quantas empresas estão no sistema -->
                                              <?php
                                                  $contAluno = new Model();
                                                  $aluno = $contAluno->EXE_QUERY("SELECT * FROM tb_aluno");
                                                  echo count($aluno);
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
                                <div class="card card-static-3 shadow">
                                    <div class="card-body">
                                        <h5 class="text-muted">Genero (Masculino)</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1">
                                              <!-- Contar quantas empresas estão no sistema -->
                                              <?php
                                                  $contAlunoMasculino = new Model();
                                                  $alunoMasculino = $contAlunoMasculino->EXE_QUERY("SELECT * FROM tb_aluno WHERE sexo='M' ");
                                                  echo count($alunoMasculino);
                                                  ?>
                                              <!-- Contar quantas empresas estão no sistema -->
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
                                <div class="card card-static-4 shadow">
                                    <div class="card-body">
                                        <h5 class="text-muted">Genero (Feminino)</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1">
                                              <!-- Contar quantas empresas estão no sistema -->
                                              <?php
                                                  $contAlunoFeminino = new Model();
                                                  $alunoFeminino = $contAlunoFeminino->EXE_QUERY("SELECT * FROM tb_aluno WHERE sexo='F' ");
                                                  echo count($alunoFeminino);
                                                  ?>
                                              <!-- Contar quantas empresas estão no sistema -->
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
                        </div>

                        <div class="row">
                            <!-- ============================================================== -->
                            <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">
                                <div class="card shadow">
                                    <h5 class="card-header"><strong>Empresas registradas</strong></h5>
                                    <div class="card-body p-0">
                                       <div>
                                            <canvas id="mycompra-chart" style="height: 300px"></canvas>
                                       </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ============================================================== -->

                            <!-- recent orders  -->
                            <!-- ============================================================== -->
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                <div class="card shadow">
                                    <h5 class="card-header"><strong>Empresas registradas</strong></h5>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="bg-light">
                                                    <tr class="border-0">
                                                        <th class="border-0">#</th>
                                                        <th class="border-0">Nome</th>
                                                        <th class="border-0">Data</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <!-- Adicionar aqui -->
                                                    <?php
                                                      $search = new Model();
                                                      $empresaLimiteCinco = $search->EXE_QUERY("SELECT * FROM tb_empresa LIMIT 5");
                                                      if(count($empresaLimiteCinco)):
                                                        foreach($empresaLimiteCinco as $mostrar):?>
                                                      <tr>
                                                          <td>1</td>
                                                          <td>Product #1 </td>
                                                          <td>Product #1 </td>
                                                      </tr>
                                                    <?php
                                                        endforeach;
                                                      else:?>
                                                      <tr>
                                                        <td colspan="3">Não existe nenhuma empresa registrada</td>
                                                      </tr>
                                                    <?php
                                                      endif;?>
                                                    <!-- Adicionar aqui -->
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end recent orders  -->

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
