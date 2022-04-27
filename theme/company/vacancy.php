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
                                              <h1 class="h6">Empresa <strong><?= $_SESSION['nome'] ?></strong></h1>
                                              <span>Nesta tela tens a possibilidade de adicionar uma nova vaga</span>
                                          </div>
                                          <div class="col-lg-6 text-right">
                                              <button class="btn btn-small btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Adicionar uma vaga</button>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>

                          <div class="row">
                              <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
                                  <div class="card shadow">
                                      <div class="card-body p-2">
                                          <div class="table-responsive" >
                                              <table class="table" id="dataTableEstagio">
                                                <thead>
                                                  <tr>
                                                    <th>Id</th>
                                                    <th>Área de atuação</th>
                                                    <th>Nº Candidatos</th>
                                                    <th>Nº Candidatura Disponível</th>
                                                    <th>Estado</th>
                                                    <th class="text-center">Acções</th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                  <?php
                                                      $parametros = [":id"  => $_SESSION['id']];
                                                      $vagasDisponiveis = new Model();
                                                      $listaDisponivel = $vagasDisponiveis->EXE_QUERY("SELECT * FROM tb_vaga_estagio
                                                      INNER JOIN tb_empresa ON tb_vaga_estagio.id_empresa=tb_empresa.id_empresa
                                                      WHERE tb_empresa.id_empresa=:id", $parametros);
                                                      if(count($listaDisponivel)):
                                                        foreach($listaDisponivel as $mostrar):?>
                                                          <tr>
                                                            <td><?= $mostrar['id_vaga_estagio'] ?></td>
                                                            <td><?= $mostrar['area_atuacao_vaga'] ?></td>
                                                            <td><?= $mostrar['numero_candidatura'] ?></td>
                                                            <td><?= $mostrar['numero_candidatura'] ?></td>
                                                            <td><?= $mostrar['estado_vaga'] == 0 ?  'Aberto' :  'Fechado' ?></td>
                                                            <td class="text-center">
                                                              <a href="vacancy.php?action=delete&id=<?= $mostrar['id_vaga_estagio'] ?>" class="btn btn-sm btn-danger">
                                                                <i class="fas fa-trash"></i>
                                                              </a>
                                                              <a href="#id=<?= $mostrar['id_vaga_estagio'] ?>" class="btn btn-sm btn-primary">
                                                                <i class="fas fa-edit"></i>
                                                              </a>
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

                                              <!-- Eliminar empresa -->
                                              <?php
                                                if (isset($_GET['action']) && $_GET['action'] == 'delete'):
                                                    $id = $_GET['id'];
                                                    $parametros  =[
                                                        ":id"=>$id
                                                    ];
                                                    $delete = new Model();
                                                    $delete->EXE_NON_QUERY("DELETE FROM tb_vaga_estagio WHERE id_vaga_estagio=:id", $parametros);
                                                    if($delete == true):
                                                        echo "<script>window.alert('Apagado com sucesso');</script>";
                                                        echo "<script>location.href='vacancy.php?id=vaga'</script>";
                                                    else:
                                                        echo "<script>window.alert('Operação falhou');</script>";
                                                    endif;
                                                endif;
                                              ?>
                                              <!-- End Eliminar empresa -->
                                          </div>
                                      </div>
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

    <!-- MODAL -->
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Adicionar vaga</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST">
              <div class="row">
                <div class="col-lg-4 form-group">
                  <label for="">Nome da Empresa</label>
                  <input type="text" disabled value="<?= $_SESSION['nome'] ?>" class="form-control form-control-lg" />
                </div>
                <div class="col-lg-4 form-group">
                  <label for="">NIF</label>
                  <input type="text" disabled value="<?= $_SESSION['nif'] ?>" class="form-control form-control-lg" />
                </div>
                <div class="col-lg-4 form-group">
                  <label for="">Contacto</label>
                  <input type="text" disabled value="<?= $_SESSION['contacto'] ?>" class="form-control form-control-lg" />
                </div>
                <div class="col-lg-8 form-group">
                  <label for="">Área de atuação</label>
                  <input type="text" name="area_atuacao" class="form-control form-control-lg" placeholder="Área de atuação da vaga" />
                </div>
                <div class="col-lg-4 form-group">
                  <label for="">Quantidade de Candidatos</label>
                  <input type="number" name="qt_candidatos" class="form-control form-control-lg" />
                </div>
                <div class="col-lg-6 form-group">
                  <label for="">Atividades por realizar</label>
                  <textarea class="form-control form-control-lg" name="atividades"></textarea>
                </div>

                <div class="col-lg-6 form-group">
                  <label for="">Competências</label>
                  <textarea class="form-control form-control-lg" name="competencias"></textarea>
                </div>

                <div class="col-lg-6 form-group">
                  <label for="">Línguas</label>
                  <select name="linguas" class="form-control form-control-lg" id="linguas" multiple>
                    <option value="Português">Português</option>
                    <option value="Inglês">Inglês</option>
                    <option value="Francês">Francês</option>
                  </select>
                </div>

                <div class="col-lg-6 form-group">
                  <label for="">Grau academico</label>
                  <select name="grau_academico" id="" class="form-control form-control-lg">
                    <option value="Médio da Concluído">Médio Concluído</option>
                  </select>
                </div>

                <div class="col-lg-4 form-group">
                  <input type="submit" value="Adicionar vaga" class="form-control btn-primary btn" name="adicionar_vaga" />
                </div>
              </div>
              <?php

                if(isset($_POST['adicionar_vaga'])):
                  $quantidadeCandidatos = $_POST['qt_candidatos'];
                  $area_atuacao = $_POST['area_atuacao'];

                  $grau         = $_POST['grau_academico'];
                  $linguas      = $_POST['linguas'];
                  $competencias = $_POST['competencias'];
                  $atividades   = $_POST['atividades'];

                  $parametros = [
                    ":id_empresa"   => $_SESSION['id'],
                    ":area"         => $area_atuacao,
                    ":quantidade"   => $quantidadeCandidatos,
                    ":atividades"   => $atividades,
                    ":estado"       => 0,
                    ":num_resta"    => $quantidadeCandidatos,
                    ":competencias" => $competencias,
                    ":linguas"      => $linguas,
                    ":ensino"       => $grau
                  ];

                  $inserirVagaMinha = new Model();
                  $inserirVagaMinha->EXE_NON_QUERY("INSERT INTO tb_vaga_estagio
                  (
                    id_empresa,
                    area_atuacao_vaga,
                    numero_candidatura,
                    data_registro_vaga,
                    estado_vaga,
                    numero_restante_candidatura,
                    atividades_por_realizar,
                    competencias,
                    linguas,
                    ensino
                  )
                   VALUES
                  (
                    :id_empresa,
                    :area,
                    :quantidade,
                     now(),
                     :estado,
                     :num_resta,
                     :atividades,
                     :competencias,
                     :linguas,
                     :ensino
                  ) ", $parametros);
                   if($inserirVagaMinha):
                    echo "<script>location.href='vacancy.php?id=vaga'</script>";
                   endif;
                endif;
              ?>

            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- MODAL -->

    <!-- Footer -->
    <?php require __DIR__ . "./includes/footer.php" ?>
    <!-- Footer -->
