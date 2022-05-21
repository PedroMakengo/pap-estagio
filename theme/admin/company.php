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
                                    <h5 class="card-header"><strong>Empresas registradas recentemente...</strong></h5>
                                    <div class="card-body p-0 mt-3">
                                        <div class="table-responsive">
                                            <table class="table" id="dataTableEstagio" >
                                                <thead class="bg-light">
                                                    <tr class="border-0">
                                                        <th class="border-0">#</th>
                                                        <th class="border-0">Nome</th>
                                                        <th class="border-0">Responsável</th>
                                                        <th class="border-0">NIF</th>
                                                        <th class="border-0">Localização</th>
                                                        <th class="border-0">Contacto</th>
                                                        <th class="border-0">Data de registro</th>
                                                        <th class="border-0 text-center">Acções</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php

                                                      $empresa = new Model();
                                                      $search = $empresa->EXE_QUERY("SELECT * FROM tb_empresa");
                                                      if(count($search)):
                                                        foreach($search as $mostrar):?>
                                                          <tr>
                                                              <td><?= $mostrar['id_empresa'] ?></td>
                                                              <td><?= $mostrar['nome_empresa'] ?></td>
                                                              <td><?= $mostrar['responsavel_empresa'] ?></td>
                                                              <td><?= $mostrar['nif'] ?></td>
                                                              <td><?= $mostrar['localizacao'] ?></td>
                                                              <td><?= $mostrar['contacto'] ?></td>
                                                              <td><?= $mostrar['data_registro_empresa'] ?></td>
                                                              <td>
                                                                <a href="profile-empresa.php?id=<?= $mostrar['id_empresa'] ?>" class="btn btn-sm btn-primary">
                                                                  <i class="fas fa-eye"></i>
                                                                </a>
                                                                <a href="company.php?action=delete&id=<?= $mostrar['id_empresa']?>" class="btn btn-sm btn-danger">
                                                                  <i class="fas fa-trash"></i>
                                                                </a>
                                                              </td>
                                                          </tr>
                                                        <?php
                                                        endforeach;
                                                      else:?>
                                                        <tr>
                                                          <td class="text-white bg-warning text-center" colspan="12">
                                                        Não existe nenhuma empresa registrada</td>
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
                                                        $delete->EXE_NON_QUERY("DELETE FROM tb_empresa WHERE id_empresa=:id", $parametros);
                                                        if($delete == true):
                                                            echo '<script>
                                                                    swal({
                                                                    title: "Dado Eliminado!",
                                                                    text: "Operação Efetuada com sucesso",
                                                                    icon: "success",
                                                                    button: "Fechar",
                                                                    })
                                                                </script>';
                                                                echo '<script>
                                                                setTimeout(function() {
                                                                    window.location.href="company.php?id=company";
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
