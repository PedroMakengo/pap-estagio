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
                                            <h1 class="h6">Bem-vindo(a) Sr. <strong>Eduardo Jamba</strong></h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
                                <div class="card shadow">
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="bg-light">
                                                    <tr class="border-0">
                                                        <th class="border-0">#</th>
                                                        <th class="border-0">Nome Completo</th>
                                                        <th class="border-0">Vaga</th>
                                                        <th class="border-0">Motivação</th>
                                                        <th class="border-0">Data de Candidatura</th>
                                                        <th class="border-0">Acções</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        $parametros = [":id"    => $_SESSION['id']];
                                                        $listagemCandidatos = new Model();
                                                        $buscandoCandidatos = $listagemCandidatos->EXE_QUERY("SELECT * FROM tb_candidatura_vaga
                                                        INNER JOIN tb_vaga_estagio ON tb_candidatura_vaga.id_vaga_estagio=tb_vaga_estagio.id_vaga_estagio
                                                        INNER JOIN tb_aluno ON tb_candidatura_vaga.id_aluno=tb_aluno.id_aluno
                                                        WHERE tb_vaga_estagio.id_empresa=:id", $parametros);

                                                        foreach($buscandoCandidatos as $mostrar):
                                                    ?>
                                                        <tr>
                                                            <td><?= $mostrar['id_candidatura'] ?></td>
                                                            <td><?= $mostrar['nome'] ?></td>
                                                            <td><?= $mostrar['area_atuacao_vaga'] ?> </td>
                                                            <td><?= $mostrar['motivacao_candidatura'] ?></td>
                                                            <td><?= $mostrar['data_registro_candidatura'] ?></td>
                                                            <td>
                                                              <a href="#" class="btn btn-small btn-primary">Ativar</a>
                                                            </td>
                                                        </tr>
                                                      <?php
                                                        endforeach;?>
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
