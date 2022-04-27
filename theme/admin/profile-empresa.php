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
                                        <div class="col-lg-12 text-center">
                                            <h1 class="h6">Trabalhando nesta parte</h1>
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
