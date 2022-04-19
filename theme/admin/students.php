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
                            <!-- ============================================================== -->
                            <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header"><strong>Estudantes registradas recentemente...</strong></h5>
                                    <div class="card-body p-0 mt-4">
                                        <div class="table-responsive">
                                            <table class="table" id="dataTableEstagio">
                                                <thead class="bg-light">
                                                    <tr class="border-0">
                                                        <th class="border-0">#</th>
                                                        <th class="border-0">Nome do estudante</th>
                                                        <th class="border-0">E-mail</th>
                                                        <th class="border-0">Contacto</th>
                                                        <th class="border-0">Numero de Processo</th>
                                                        <th class="border-0">Estado na plataforma</th>
                                                        <th class="border-0">Acções</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                      $search = new Model();
                                                      $estudantes = $search->EXE_QUERY("SELECT * FROM tb_aluno");
                                                      if(count($estudantes)):
                                                        foreach($estudantes as $mostrar):?>
                                                        <tr>
                                                            <td><?= $mostrar['id_aluno'] ?></td>
                                                            <td><?= $mostrar['nome'] ?></td>
                                                            <td><?= $mostrar['email'] ?></td>
                                                            <td><?= $mostrar['contacto'] ?></td>
                                                            <td><?= $mostrar['numero_processo'] ?></td>
                                                            <td><?= $mostrar['estado_aluno'] ?></td>
                                                            <td>
                                                                <button class="btn btn-small btn-primary">ver</button>
                                                            </td>
                                                        </tr>
                                                    <?php
                                                      endforeach;
                                                    else:?>
                                                      <tr>
                                                        <td colspan="12" class="bg-warning text-center text-white">Nenhum aluno registrado</td>
                                                      </tr>
                                                    <?php
                                                    endif;?>
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
