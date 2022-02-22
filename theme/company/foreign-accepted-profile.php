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
                                    <form method="POST">
                                      <?php
                                        $parametros = [":id"  => $_SESSION['id']];
                                        $atualizarMeusDados = new Model();
                                        $atualizarDados = $atualizarMeusDados->EXE_QUERY("SELECT * FROM tb_empresa
                                        WHERE id_empresa=:id", $parametros);
                                        foreach($atualizarDados as $mostrar):
                                      ?>
                                        <div class="row">
                                          <div class="col-lg-4 form-group">
                                            <label for="">Nome da Empresa</label>
                                            <input type="text" name="nome" value="<?= $mostrar['nome_empresa'] ?>" class="form-control form-control-lg" />
                                          </div>
                                          <div class="col-lg-4 form-group">
                                            <label for="">E-mail</label>
                                            <input type="email" name="email" value="<?= $mostrar['email_empresa'] ?>" class="form-control form-control-lg" />
                                          </div>
                                          <div class="col-lg-4 form-group">
                                            <label for="">NIF</label>
                                            <input type="text" name="nif" value="<?= $mostrar['nif'] ?>" class="form-control form-control-lg" />
                                          </div>
                                          <div class="col-lg-4 form-group">
                                            <label for="">Localização</label>
                                            <input type="text" name="localizacao" value="<?= $mostrar['localizacao'] ?>" class="form-control form-control-lg" />
                                          </div>
                                          <div class="col-lg-4 form-group">
                                            <label for="">Contacto</label>
                                            <input type="tel" name="tel" value="<?= $mostrar['contacto'] ?>" class="form-control form-control-lg" />
                                          </div>
                                          <div class="col-lg-4 form-group">
                                            <label for="">Responsável</label>
                                            <input type="text" name="responsavel" value="<?= $mostrar['responsavel_empresa'] ?>" class="form-control form-control-lg" />
                                          </div>
                                          <div class="col-lg-12 form-group">
                                            <label for="">Área de Atuação da Empresa</label>
                                            <input type="text" name="area" value="<?= $mostrar['area_atuacao'] ?>" class="form-control form-control-lg" />
                                          </div>
                                        </div>
                                      <?php
                                        endforeach;?>
                                        <div class="row">
                                          <div class="col-lg-3">
                                            <input type="submit" name="atualizar_submit" value="Atualização" class="bg-primary form-control form-control-lg" />
                                          </div>
                                        </div>

                                        <?php
                                          if(isset($_POST['atualizar_submit'])):
                                            // Dados do get
                                            $idEmpresa = $_SESSION['id'];

                                            $nome  = $_POST['nome'];
                                            $email = $_POST['email'];
                                            $area  = $_POST['area'];
                                            $ceo   = $_POST['responsavel'];
                                            $tel   = $_POST['tel'];
                                            $gps   = $_POST['localizacao'];
                                            $nif   = $_POST['nif'];

                                            $parametros = [
                                              ":nome"     => $nome,
                                              ":email"    => $email,
                                              ":area"     => $area,
                                              ":ceo"      => $area,
                                              ":tel"      => $tel,
                                              ":gps"      => $gps,
                                              ":nif"      => $nif,
                                              ":idEmpresa" => $idEmpresa
                                            ];
                                            $atualizarDadosInserir = new Model();
                                            $atualizarDadosInserir->EXE_NON_QUERY("UPDATE tb_empresa SET
                                              nome_empresa=:nome,
                                              email_empresa=:email,
                                              area_atuacao=:area,
                                              responsavel_empresa=:ceo,
                                              contacto=:tel,
                                              localizacao=:gps,
                                              nif=:nif
                                              WHERE
                                              id_empresa=:idEmpresa
                                            ", $parametros);

                                            if($atualizarDadosInserir):
                                              echo "<script>location.href='home.php?id=$idEmpresa'</script>";
                                            endif;
                                          endif;
                                        ?>
                                    </form>
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
                                  <div class="bg-white border p-4">
                                      <div class="row pt-1">
                                          <div class="col-lg-6 text-left">
                                              <h1 class="h6">
                                                <a href="students.php?id=student">Regressar</a>
                                              </h1>
                                          </div>
                                          <div class="col-lg-6 text-right">
                                              <h1 class="h6">Informações sobre o Estagiário: <strong>Eduardo Jamba</strong></h1>
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
                                          Descrição
                                      </div>
                                  </div>

                                  <div class="card">
                                      <h5 class="card-header"><strong>Relatório</strong></h5>
                                      <div class="card-body p-4">
                                          <h1>Relatório do Mês</h1>
                                      </div>
                                  </div>

                                  <div class="card">
                                      <h5 class="card-header"><strong>Nível</strong></h5>
                                      <div class="card-body p-4">
                                          <h1>Relatório do Mês</h1>
                                      </div>
                                  </div>
                              </div>

                              <div class="col-xl-8 col-lg-8 col-md-6 col-sm-12 col-12">
                                  <div class="card">
                                      <h5 class="card-header"><strong>Trabalhos ligado ao Sr(a)</strong></h5>
                                      <div class="card-body p-0">
                                          <div class="table-responsive">
                                              <table class="table">
                                                  <thead class="bg-light">
                                                      <tr class="border-0">
                                                          <th class="border-0">#</th>
                                                          <th class="border-0">Image</th>
                                                          <th class="border-0">Product Name</th>
                                                          <th class="border-0">Product Id</th>
                                                          <th class="border-0">Quantity</th>
                                                          <th class="border-0">Price</th>
                                                          <th class="border-0">Order Time</th>
                                                          <th class="border-0">Customer</th>
                                                          <th class="border-0">Status</th>
                                                      </tr>
                                                  </thead>
                                                  <tbody>
                                                      <tr>
                                                          <td>1</td>
                                                          <td>
                                                              <div class="m-r-10"><img
                                                                      src="../assets/images/product-pic.jpg" alt="user"
                                                                      class="rounded" width="45"></div>
                                                          </td>
                                                          <td>
                                                              <a href="profile-students.php" style="color: blue">Product #1 </a>
                                                          </td>
                                                          <td>id000001 </td>
                                                          <td>20</td>
                                                          <td>$80.00</td>
                                                          <td>27-08-2018 01:22:12</td>
                                                          <td>Patricia J. King </td>
                                                          <td><span class="badge-dot badge-brand mr-1"></span>InTransit
                                                          </td>
                                                      </tr>
                                                  </tbody>
                                              </table>
                                          </div>
                                      </div>
                                  </div>

                                  <div class="card">
                                      <h5 class="card-header"><strong>Repositórios ligado ao Sr(a)</strong></h5>
                                      <div class="card-body p-0">
                                          <div class="table-responsive">
                                              <table class="table">
                                                  <thead class="bg-light">
                                                      <tr class="border-0">
                                                          <th class="border-0">#</th>
                                                          <th class="border-0">Image</th>
                                                          <th class="border-0">Product Name</th>
                                                          <th class="border-0">Product Id</th>
                                                          <th class="border-0">Quantity</th>
                                                          <th class="border-0">Price</th>
                                                          <th class="border-0">Order Time</th>
                                                          <th class="border-0">Customer</th>
                                                          <th class="border-0">Status</th>
                                                      </tr>
                                                  </thead>
                                                  <tbody>
                                                      <tr>
                                                          <td>1</td>
                                                          <td>
                                                              <div class="m-r-10"><img
                                                                      src="../assets/images/product-pic.jpg" alt="user"
                                                                      class="rounded" width="45"></div>
                                                          </td>
                                                          <td>
                                                              <a href="profile-students.php" style="color: blue">Product #1 </a>
                                                          </td>
                                                          <td>id000001 </td>
                                                          <td>20</td>
                                                          <td>$80.00</td>
                                                          <td>27-08-2018 01:22:12</td>
                                                          <td>Patricia J. King </td>
                                                          <td><span class="badge-dot badge-brand mr-1"></span>InTransit
                                                          </td>
                                                      </tr>
                                                  </tbody>
                                              </table>
                                          </div>
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
