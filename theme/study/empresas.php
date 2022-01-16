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
                <div class="fundoCompany"></div>
                <div class="container-fluid dashboard-content manterTop">
                    <div class="ecommerce-widget">

                        <div class="row mb-4">
                            <div class="col-xl-12 col-lg-12">
                                <div class="bg-white border rounded p-4">
                                    <div class="row pt-1">
                                        <div class="col-lg-6">
                                            <h1 class="h6">Algumas empresas</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
                                <div class="card rounded p-4">
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
                                            $empresaLista = new Model();
                                            $listaEmpresa = $empresaLista->EXE_QUERY("SELECT * FROM tb_empresa");
                                            if(count($listaEmpresa)):
                                              foreach($listaEmpresa as $mostrar):?>
                                                <tr>
                                                  <td>1</td>
                                                  <td>Sonangol Lda</td>
                                                  <td>Informática</td>
                                                  <td>2</td>
                                                  <td>Aberto</td>
                                                  <td class="text-center">
                                                    <a href="#" class="btn btn-sm btn-primary">Ver</a>
                                                  </td>
                                                </tr>
                                              <?php
                                              endforeach;
                                            else:?>
                                            <tr>
                                              <td class="text-white bg-warning text-center" colspan="12">
                                                Não existe empresas registradas
                                              </td>
                                            </tr>
                                            <?php
                                            endif;?>
                                        </tbody>
                                    </table>
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