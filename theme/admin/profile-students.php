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
                          $buscando = $buscarProfileEstudante->EXE_QUERY("SELECT * FROM tb_aluno WHERE id_aluno=:id", $parametros);
                          foreach($buscando as $mostrar):
                            $nome = $mostrar['nome'];
                            $foto = $mostrar['foto'];
                            $genero = $mostrar['sexo'] === 'M' ? "Masculino": "Femenino";
                            $contacto = $mostrar['contacto'];
                            $email = $mostrar['email'];
                          endforeach;
                        ?>

                        <div class="row mb-4">
                            <div class="col-xl-12 col-lg-12">
                                <div class="bg-white border p-4">
                                    <div class="row pt-1">
                                        <div class="col-lg-6 text-left">
                                            <h1 class="h6">
                                              <a href="students.php?id=student">
                                                <i class="fas fa-arrow-circle-left"></i> Voltar
                                              </a>
                                            </h1>
                                        </div>
                                        <div class="col-lg-6 text-right">
                                            <h1 class="h6">Informações sobre o Estagiário: <strong><?= $nome ?></strong></h1>
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
                                        <p>Todas as informações relacionadas ao estudante <strong><?= $nome ?></strong> encontras nesta sessão.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-8 col-lg-8 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header"><strong>Informações do estudante</strong></h5>
                                    <div class="card-body p-4">
                                      <div class="row">
                                        <div class="col-lg-4">
                                          <img src="../assets/storage/study/<?= $foto ?>" alt="<?= $nome ?>" class="col-lg-12">
                                        </div>
                                        <div class="col-lg-8">
                                          <div class="row">
                                            <div class="col-lg-12">
                                              <h5>Nome completo: <strong><?= $nome ?></strong></h5><hr />
                                            </div>
                                            <div class="col-lg-6">
                                              <h5>Genero: <strong><?= $genero ?></strong></h5>
                                            </div>
                                            <div class="col-lg-6">
                                              <h5>Contacto: <strong><?= $contacto ?></strong></h5>
                                            </div>
                                            <div class="col-lg-12">
                                              <hr>
                                              <h5>E-mail: <strong><?= $email ?></strong></h5>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 card">
                                    <h5 class="card-header"><strong>Relatório</strong></h5>
                                    <div class="card-body p-4">
                                        <h1>Relatório do Mês</h1>
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
