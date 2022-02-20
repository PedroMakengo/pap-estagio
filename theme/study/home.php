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
                <?php
                    if($processoVerificando == "0"):
                ?>
                <div class="ecommerce-widget">
                  <div class="row mb-4">
                      <div class="col-xl-12 col-lg-12">
                          <div class="bg-white border rounded p-4">
                              <div class="row pt-1">
                                  <div class="col-lg-6">
                                      <h1 class="h6">Atualmente </h1>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>

                  <div class="row">
                      <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
                          <div class="card rounded p-4">
                            <form action="">
                              <div class="row">
                                <div class="form-group col-lg-4">
                                  <label for="#">Nome</label>
                                  <input type="text" name="nome" placeholder="Nome Completo" class="form-control form-control-lg" />
                                </div>
                                <div class="form-group col-lg-4">
                                  <label for="#">E-mail</label>
                                  <input type="email" name="email" placeholder="E-mail" class="form-control form-control-lg" />
                                </div>
                                <div class="form-group col-lg-4">
                                  <label for="#">Processo</label>
                                  <input type="text" name="processo" placeholder="Processo" class="form-control form-control-lg" />
                                </div>
                                <div class="form-group col-lg-4">
                                  <label for="#">Palavra-passe</label>
                                  <input type="password" name="password" placeholder="Processo" class="form-control form-control-lg" />
                                </div>
                                <div class="form-group col-lg-4">
                                  <label for="#">Genero</label>
                                  <select name="sexo" id="" class="form-control form-control-lg">
                                    <option value="M">Masculino</option>
                                    <option value="F">Femenino</option>
                                  </select>
                                </div>
                                <div class="form-group col-lg-4">
                                  <label for="">Foto</label>
                                  <input type="file" class="form-control" name="foto">
                                </div>

                                <div class="form-group col-lg-4">
                                  <input type="submit" value="Atualizar os dados" class="bg-primary btn">
                                </div>
                              </div>
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
                                <div class="bg-white border rounded p-4">
                                    <div class="row pt-1">
                                        <div class="col-lg-6">
                                            <h1 class="h6">Bem-vindo(a) Sr. <strong><?= $_SESSION['nome'] ?></strong></h1>
                                        </div>
                                        <div class="col-lg-6 text-right">
                                            <h1 class="h6">Vagas disponíveis</h1>
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
                                              $vagasDisponiveis = new Model();
                                              $listaDisponivel = $vagasDisponiveis->EXE_QUERY("SELECT * FROM tb_vaga_estagio");
                                              if(count($listaDisponivel)):
                                                foreach($listaDisponivel as $mostrar):?>
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
                                                <?php endforeach;?>
                                              <?php
                                            else:?>
                                              <tr>
                                                <td class="text-center bg-warning text-white" colspan="12">Não existe vagas</td>
                                              </tr>
                                            <?php
                                            endif;
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
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
