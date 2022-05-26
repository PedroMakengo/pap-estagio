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
                            <div class="col-lg-12">
                              <ul class="nav nav-tabs bg-white p-3" id="myTab" role="tablist">
                                <li class="nav-item">
                                  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
                                    Solicitação da Declaração
                                  </a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">
                                    Declaração Emitidas
                                  </a>
                                </li>
                              </ul>
                              <div class="tab-content mt-3" id="myTabContent">

                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="card">
                                      <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table" id="dataTableEstagio">
                                                <thead class="bg-light">
                                                    <tr class="border-0">
                                                        <th class="border-0">#</th>
                                                        <th class="border-0">Nome do Aluno</th>
                                                        <th class="border-0">Empresa</th>
                                                        <th class="border-0">Data da Emissão</th>
                                                        <th class="border-0">Estado</th>
                                                        <th class="border-0 text-center">Acções</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php

                                                      $search = new Model();
                                                      $relatorio = $search->EXE_QUERY("SELECT * FROM tb_emissao_declaracao
                                                      INNER JOIN tb_aluno ON tb_emissao_declaracao.id_aluno=tb_aluno.id_aluno
                                                      INNER JOIN tb_empresa ON tb_emissao_declaracao.id_empresa=tb_empresa.id_empresa");
                                                      if(count($relatorio)):
                                                        foreach($relatorio as $mostrar):?>
                                                          <tr>
                                                              <td><?= $mostrar['id_declaracao'] ?></td>
                                                              <td><?= $mostrar['nome'] ?></td>
                                                              <td><?= $mostrar['nome_empresa'] ?></td>
                                                              <td><?= $mostrar['data_emissao'] ?></td>
                                                              <td><?= $mostrar['estado_emissao'] === "0" ? 'Processando' : 'Aceite' ?></td>
                                                              <td class="text-center">
                                                                <?php if($mostrar['estado_emissao'] === "0"): ?>
                                                                  <form method="POST">
                                                                    <button name="<?= $submeter_validacao = "enviar".$mostrar['id_declaracao'] ?>" class="btn btn-sm btn-primary">
                                                                      <i class="fas fa-check"></i>
                                                                    </button>
                                                                    <?php
                                                                      if(isset($_POST[$submeter_validacao])):


                                                                        $parametros = [
                                                                          ":id" => $mostrar['id_declaracao'],
                                                                          ":estado" => 1
                                                                        ];

                                                                        $updateDeclaracao = new Model();
                                                                        $updateDeclaracao->EXE_NON_QUERY("UPDATE tb_emissao_declaracao SET
                                                                          estado_emissao=:estado
                                                                          WHERE id_declaracao=:id
                                                                        ", $parametros);

                                                                        if($updateDeclaracao):
                                                                          echo '<script>
                                                                                  swal({
                                                                                  title: "Operação efetuada com sucesso!",
                                                                                  text: "Estado atualizado com sucesso",
                                                                                  icon: "success",
                                                                                  button: "Fechar",
                                                                                  })
                                                                              </script>';
                                                                          echo '<script>
                                                                                    setTimeout(function() {
                                                                                        window.location.href="declaracao.php?id=declaracao";
                                                                                    }, 2000)
                                                                                </script>';
                                                                        endif;
                                                                      endif;
                                                                    ?>
                                                                  </form>
                                                                <?php else: ?>
                                                                  <button disabled class="btn btn-sm bg-warning">
                                                                    <i class="fas fa-check"></i>
                                                                  </button>
                                                                <?php endif; ?>
                                                              </td>
                                                          </tr>
                                                        <?php
                                                        endforeach;
                                                      else: ?>
                                                        <tr>
                                                          <td colspan="12" class="bg-warning text-center text-white">Não existe nenhum declaração</td>
                                                        </tr>
                                                      <?php
                                                      endif;?>
                                                </tbody>
                                            </table>
                                        </div>
                                      </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="card">
                                      <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table" id="dataTableEstagio">
                                                <thead class="bg-light">
                                                    <tr class="border-0">
                                                        <th class="border-0">#</th>
                                                        <th class="border-0">Nome do Aluno</th>
                                                        <th class="border-0">Empresa</th>
                                                        <th class="border-0">Data da Emissão</th>
                                                        <th class="border-0">Estado</th>
                                                        <th class="border-0 text-center">Acções</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php

                                                      $search = new Model();
                                                      $relatorio = $search->EXE_QUERY("SELECT * FROM tb_emissao_declaracao
                                                      INNER JOIN tb_aluno ON tb_emissao_declaracao.id_aluno=tb_aluno.id_aluno
                                                      INNER JOIN tb_empresa ON tb_emissao_declaracao.id_empresa=tb_empresa.id_empresa
                                                      WHERE estado_emissao=1");
                                                      if(count($relatorio)):
                                                        foreach($relatorio as $mostrar):?>
                                                          <tr>
                                                              <td><?= $mostrar['id_declaracao'] ?></td>
                                                              <td><?= $mostrar['nome'] ?></td>
                                                              <td><?= $mostrar['nome_empresa'] ?></td>
                                                              <td><?= $mostrar['data_emissao'] ?></td>
                                                              <td><?= $mostrar['estado_emissao'] === "0" ? "<span class='text-warning'>Processando</span>" : "<span class='text-success'>Aceite</span>" ?></td>
                                                              <td class="text-center">
                                                                <a href="#" class="btn btn-primary btn-sm">
                                                                  <i class="fas fa-eye"></i>
                                                                </a>
                                                              </td>
                                                          </tr>
                                                        <?php
                                                        endforeach;
                                                      else: ?>
                                                        <tr>
                                                          <td colspan="12" class="bg-warning text-center text-white">Não existe nenhum declaração</td>
                                                        </tr>
                                                      <?php
                                                      endif;?>
                                                </tbody>

                                                <!-- Eliminar Pedido de Declaração -->
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
                                                                          window.location.href="declaracao.php?id=declaracao";
                                                                      }, 2000)
                                                                  </script>';
                                                        else:
                                                            echo "<script>window.alert('Operação falhou');</script>";
                                                        endif;
                                                    endif;
                                                ?>
                                                <!-- Eliminar Pedido de Declaração -->
                                            </table>
                                        </div>
                                      </div>
                                    </div>
                                </div>

                              </div>
                            </div>

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
