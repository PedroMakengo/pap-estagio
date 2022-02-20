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
                                            <h1 class="h6">Sobre Meu estágio</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                              <div class="card p-4">
                                <h1 class="h6">Sobre o meu estágio</h1>
                              </div>

                              <div class="card p-4">
                                <h1 class="h6">Meus Relatório</h1>
                              </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                              <div class="card p-4">
                                <h1 class="h6">Perfil do meu estágio</h1>
                              </div>
                              <div class="card p-4 mt-2">
                                <h1 class="h6">Efetuar o pedido de declaração para estágio</h1>


                                <div class="mt-4">
                                  <a href="#" class="btn btn-primary  col-lg-12">Fazer</a>
                                </div>
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

        <!-- Modal de declaração  -->

        <!-- Modal de declaração  -->
    </div>

    <!-- Footer -->
    <?php require __DIR__ . "./includes/footer.php" ?>
    <!-- Footer -->
