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

                        <div class="row">
                            <!-- recent orders  -->
                            <!-- ============================================================== -->
                            <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header"><strong>Estudantes registradas recentemente...</strong></h5>
                                    <div class="card-body p-0 mt-4">
                                        <div class="table-responsive">
                                            <table class="table" id="dataTableEstagio" style="width: 1400px">
                                                <thead class="bg-light">
                                                    <tr class="border-0">
                                                        <th class="border-0">#</th>
                                                        <th class="border-0">Nome do estudante</th>
                                                        <th class="border-0">E-mail</th>
                                                        <th class="border-0">Contacto</th>
                                                        <th class="border-0">Numero de Processo</th>
                                                        <!-- <th class="border-0">Data de registro</th> -->
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
                                                            <!-- <td><?= $mostrar['data_registro_aluno'] ?></td> -->
                                                            <td>
                                                                <a href="profile-students.php?id=<?= $mostrar['id_aluno'] ?>" class="btn btn-sm btn-primary">
                                                                  <i class="fas fa-eye"></i>
                                                                </a>
                                                                <a href="students.php?action=delete&id=<?= $mostrar['id_aluno']?>" class="btn btn-sm btn-danger">
                                                                  <i class="fas fa-trash"></i>
                                                                </a>
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

                                                 <!-- Eliminar empresa -->
                                                 <?php
                                                    if (isset($_GET['action']) && $_GET['action'] == 'delete'):
                                                        $id = $_GET['id'];
                                                        $parametros  =[
                                                            ":id"=>$id
                                                        ];
                                                        $delete = new Model();
                                                        $delete->EXE_NON_QUERY("DELETE FROM tb_aluno WHERE id_aluno=:id", $parametros);
                                                        if($delete == true):
                                                            echo '<script>
                                                                    swal({
                                                                    title: "Dado Eliminado!",
                                                                    text: "Operação Efetuada com sucesso",
                                                                    icon: "success",
                                                                    button: "Fechar!",
                                                                    })
                                                                </script>';
                                                            echo '<script>
                                                                        setTimeout(function() {
                                                                            window.location.href="students.php?id=students";
                                                                        }, 2000)
                                                                </script>';
                                                        else:
                                                            echo "<script>window.alert('Operação falhou');</script>";
                                                        endif;
                                                    endif;
                                                ?>
                                                <!-- End Eliminar empresa -->
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
