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
                                            <div class="col-lg-6">
                                                <h1 class="h6">Bem-vindo(a) Sr. <strong>Eduardo Jamba</strong></h1>
                                            </div>
                                            <div class="col-lg-6 text-right">
                                                <h1 class="h6">Painel Administrativo do sistema</h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="text-muted">Total Empresas</h5>
                                            <div class="metric-value d-inline-block">
                                                <h1 class="mb-1">$12099</h1>
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
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="text-muted">Total de Estagiários</h5>
                                            <div class="metric-value d-inline-block">
                                                <h1 class="mb-1">$12099</h1>
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
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="text-muted">Estagiários Sexo (M)</h5>
                                            <div class="metric-value d-inline-block">
                                                <h1 class="mb-1">0.00</h1>
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
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="text-muted">Estagiários Sexo (M)</h5>
                                            <div class="metric-value d-inline-block">
                                                <h1 class="mb-1">$28000</h1>
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
                        </div>
                    <?php
                      endif;
                    ?>
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
