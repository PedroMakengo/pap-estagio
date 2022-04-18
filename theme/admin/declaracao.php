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
                                <div class="bg-white border p-4">
                                    <div class="row pt-1">
                                        <div class="col-lg-6">
                                            <h1 class="h6">Bem-vindo(a) Sr. <strong><?= $_SESSION['nome'] ?> </strong></h1>
                                        </div>
                                        <div class="col-lg-6 text-right">
                                            <!-- <h1 class="h6">Painel Administrativo do sistema</h1> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- recent orders  -->
                            <div class="col-lg-12">
                              <ul class="nav nav-tabs bg-white p-3" id="myTab" role="tablist">
                                <li class="nav-item">
                                  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
                                    Solicitação da Declaração
                                  </a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">
                                    Declaração Emitidas
                                  </a>
                                </li>
                              </ul>
                              <div class="tab-content mt-3" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="card">
                                      <h5 class="card-header"><strong>Declaração</strong></h5>
                                      <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table" id="dataTableEstagio">
                                                <thead class="bg-light">
                                                    <tr class="border-0">
                                                        <th class="border-0">#</th>
                                                        <th class="border-0">Nome do Aluno</th>
                                                        <th class="border-0">Empresa</th>
                                                        <th class="border-0">Data da Emissão</th>
                                                        <th class="border-0">Estado</th>
                                                        <th class="border-0">Acções</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php

                                                      $search = new Model();
                                                      $relatorio = $search->EXE_QUERY("SELECT * FROM tb_relatorio_estagio");
                                                      if(count($relatorio)):
                                                        foreach($relatorio as $mostrar):?>
                                                          <tr>
                                                              <td>1</td>
                                                              <td>Product #1 </td>
                                                              <td>id000001 </td>
                                                              <td>20</td>
                                                              <td>$80.00</td>
                                                              <td><span class="badge-dot badge-brand mr-1"></span>InTransit
                                                              </td>
                                                          </tr>
                                                        <?php
                                                        endforeach;
                                                      else: ?>
                                                        <tr>
                                                          <td colspan="12" class="bg-warning text-center text-white">Não existe nenhum relatório</td>
                                                        </tr>
                                                      <?php
                                                      endif;?>
                                                </tbody>
                                            </table>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="card">
                                      <h5 class="card-header"><strong>Declaração</strong></h5>
                                      <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table" id="dataTableEstagio">
                                                <thead class="bg-light">
                                                    <tr class="border-0">
                                                        <th class="border-0">#</th>
                                                        <th class="border-0">Nome do Aluno</th>
                                                        <th class="border-0">Empresa</th>
                                                        <th class="border-0">Data da Emissão</th>
                                                        <th class="border-0">Estado</th>
                                                        <th class="border-0">Acções</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php

                                                      $search = new Model();
                                                      $relatorio = $search->EXE_QUERY("SELECT * FROM tb_relatorio_estagio");
                                                      if(count($relatorio)):
                                                        foreach($relatorio as $mostrar):?>
                                                          <tr>
                                                              <td>1</td>
                                                              <td>Product #1 </td>
                                                              <td>id000001 </td>
                                                              <td>20</td>
                                                              <td>$80.00</td>
                                                              <td><span class="badge-dot badge-brand mr-1"></span>InTransit
                                                              </td>
                                                          </tr>
                                                        <?php
                                                        endforeach;
                                                      else: ?>
                                                        <tr>
                                                          <td colspan="12" class="bg-warning text-center text-white">Não existe nenhum relatório</td>
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
