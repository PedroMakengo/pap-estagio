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
                                    <nav>
                                      <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Candidaturas</a>
                                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Estagiários</a>
                                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-atribuir" role="tab" aria-controls="nav-profile" aria-selected="false">Tarefas</a>
                                      </div>
                                    </nav>
                                  </div>
                              </div>
                          </div>

                          <div class="row">
                              <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
                                  <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                        <div class="card shadow">
                                          <div class="card-body p-2">
                                              <div class="table-responsive">
                                                  <table class="table" id="dataTableEstagio">
                                                      <thead class="bg-light">
                                                          <tr class="border-0">
                                                              <th class="border-0">#</th>
                                                              <th class="border-0">Nome Completo</th>
                                                              <th class="border-0">Vaga</th>
                                                              <th class="border-0">Motivação</th>
                                                              <th class="border-0">Data de Candidatura</th>
                                                              <th class="border-0 text-center">Acções</th>
                                                          </tr>
                                                      </thead>
                                                      <tbody>
                                                          <?php
                                                              $parametros = [":id"    => $_SESSION['id']];
                                                              $listagemCandidatos = new Model();
                                                              $buscandoCandidatos = $listagemCandidatos->EXE_QUERY("SELECT * FROM tb_candidatura_vaga
                                                              INNER JOIN tb_vaga_estagio ON tb_candidatura_vaga.id_vaga_estagio=tb_vaga_estagio.id_vaga_estagio
                                                              INNER JOIN tb_aluno ON tb_candidatura_vaga.id_aluno=tb_aluno.id_aluno
                                                              WHERE tb_vaga_estagio.id_empresa=:id AND estado_candidatura=0", $parametros);

                                                              if(count($buscandoCandidatos)):
                                                                foreach($buscandoCandidatos as $mostrar):
                                                          ?>
                                                              <tr>
                                                                  <td><?= $mostrar['id_candidatura'] ?></td>
                                                                  <td><?= $mostrar['nome'] ?></td>
                                                                  <td><?= $mostrar['area_atuacao_vaga'] ?> </td>
                                                                  <td><?= $mostrar['motivacao_candidatura'] ?></td>
                                                                  <td><?= $mostrar['data_registro_candidatura'] ?></td>
                                                                  <td>
                                                                    <a href="profile-students.php?id=<?= $mostrar['id_aluno'] ?>&candidatura=<?= $mostrar['id_candidatura'] ?>" class="btn btn-sm btn-primary">
                                                                      <i class="fas fa-eye"></i>
                                                                    </a>
                                                                    <a href="accepted.php?action=delete&id=<?= $mostrar['id_candidatura'] ?>" class="btn btn-sm btn-danger">
                                                                      <i class="fas fa-trash"></i>
                                                                    </a>
                                                                  </td>
                                                              </tr>
                                                            <?php
                                                              endforeach;
                                                            else:?>
                                                                <tr>
                                                                  <td colspan="12" class="bg-warning p-2 text-white text-center">Não existe estagiários dentro da tua empresaa</td>
                                                                </tr>
                                                            <?php
                                                            endif;
                                                            ?>
                                                      </tbody>
                                                  </table>

                                                  <!-- Eliminar -->
                                                  <?php
                                                    if (isset($_GET['action']) && $_GET['action'] == 'delete'):
                                                        $id = $_GET['id'];
                                                        $parametros  =[
                                                            ":id"=>$id
                                                        ];
                                                        $delete = new Model();
                                                        $delete->EXE_NON_QUERY("DELETE FROM tb_candidatura_vaga WHERE id_candidatura=:id", $parametros);
                                                        if($delete == true):
                                                            echo "<script>window.alert('Apagado com sucesso');</script>";
                                                            echo "<script>location.href='accepted.php?id=aceite'</script>";
                                                        else:
                                                            echo "<script>window.alert('Operação falhou');</script>";
                                                        endif;
                                                    endif;
                                                  ?>
                                                  <!-- Eliminar -->
                                              </div>
                                          </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                      <div class="card shadow">
                                          <div class="card-body p-2">
                                              <div class="table-responsive">
                                                  <table class="table" id="dataTableEstagioAceiteCandidato">
                                                      <thead class="bg-light">
                                                          <tr class="border-0">
                                                              <th class="border-0">#</th>
                                                              <th class="border-0">Nome Completo</th>
                                                              <th class="border-0">Vaga</th>
                                                              <th class="border-0">Motivação</th>
                                                              <th class="border-0">Data de Candidatura</th>
                                                              <th class="border-0 text-center">Acções</th>
                                                          </tr>
                                                      </thead>
                                                      <tbody>
                                                          <?php
                                                              $parametros = [":id"    => $_SESSION['id']];
                                                              $listagemCandidatos = new Model();
                                                              $buscandoCandidatos = $listagemCandidatos->EXE_QUERY("SELECT * FROM tb_candidatura_vaga
                                                              INNER JOIN tb_vaga_estagio ON tb_candidatura_vaga.id_vaga_estagio=tb_vaga_estagio.id_vaga_estagio
                                                              INNER JOIN tb_aluno ON tb_candidatura_vaga.id_aluno=tb_aluno.id_aluno
                                                              WHERE tb_vaga_estagio.id_empresa=:id AND estado_candidatura=1", $parametros);

                                                              if(count($buscandoCandidatos)):
                                                                foreach($buscandoCandidatos as $mostrar):
                                                          ?>
                                                              <tr>
                                                                  <td><?= $mostrar['id_candidatura'] ?></td>
                                                                  <td><?= $mostrar['nome'] ?></td>
                                                                  <td><?= $mostrar['area_atuacao_vaga'] ?> </td>
                                                                  <td><?= $mostrar['motivacao_candidatura'] ?></td>
                                                                  <td><?= $mostrar['data_registro_candidatura'] ?></td>
                                                                  <td class="text-center">
                                                                    <a href="profile-students.php?id=<?= $mostrar['id_aluno'] ?>&candidatura=<?= $mostrar['id_candidatura'] ?>" class="btn btn-sm btn-primary">
                                                                      <i class="fas fa-eye"></i>
                                                                    </a>
                                                                    <a href="atribuir-tarefa.php?id=<?= $mostrar['id_aluno'] ?>" title="Atribuir tarefa o estágio" class="btn btn-sm btn-success">
                                                                      <i class="fas fa-book"></i>
                                                                    </a>
                                                                  </td>
                                                              </tr>
                                                            <?php
                                                              endforeach;
                                                            else:?>
                                                                <tr>
                                                                  <td colspan="12" class="bg-warning p-2 text-white text-center">Não existe estagiários dentro da tua empresaa</td>
                                                                </tr>
                                                            <?php
                                                            endif;
                                                            ?>
                                                      </tbody>
                                                  </table>

                                                  <!-- Eliminar -->
                                                  <?php
                                                    if (isset($_GET['action']) && $_GET['action'] == 'delete'):
                                                        $id = $_GET['id'];
                                                        $parametros  =[
                                                            ":id"=>$id
                                                        ];
                                                        $delete = new Model();
                                                        $delete->EXE_NON_QUERY("DELETE FROM tb_candidatura_vaga WHERE id_candidatura=:id", $parametros);
                                                        if($delete == true):
                                                            echo "<script>window.alert('Apagado com sucesso');</script>";
                                                            echo "<script>location.href='accepted.php?id=aceite'</script>";
                                                        else:
                                                            echo "<script>window.alert('Operação falhou');</script>";
                                                        endif;
                                                    endif;
                                                  ?>
                                                  <!-- Eliminar -->
                                              </div>
                                          </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="nav-atribuir" role="tabpanel" aria-labelledby="nav-profile-tab">
                                      <div class="card shadow">
                                          <div class="card-body p-2">
                                              <div class="table-responsive">
                                                  <table class="table" id="dataAtribuirTarefa" style="width: 1500px">
                                                      <thead class="bg-light">
                                                          <tr class="border-0">
                                                              <th class="border-0">#</th>
                                                              <th class="border-0">Estagiário</th>
                                                              <th class="border-0">Tema Tarefa</th>
                                                              <th class="border-0">Arquivo Tarefa</th>
                                                              <th class="border-0">Arquivo Recebido</th>
                                                              <th class="border-0">Data Entrega</th>
                                                              <th class="border-0">Data de Recepção</th>
                                                              <th class="border-0 text-center">Acções</th>
                                                          </tr>
                                                      </thead>
                                                      <tbody>
                                                          <?php
                                                              $parametros = [":id"    => $_SESSION['id']];
                                                              $buscandoMinhasTarefas = new Model();
                                                              $buscandoTarefa = $buscandoMinhasTarefas->EXE_QUERY("SELECT * FROM tb_atribuir_tarefa
                                                              INNER JOIN tb_aluno ON tb_atribuir_tarefa.id_aluno=tb_aluno.id_aluno
                                                              INNER JOIN tb_empresa ON tb_atribuir_tarefa.id_empresa=tb_empresa.id_empresa
                                                              WHERE tb_empresa.id_empresa=:id", $parametros);

                                                              if(count($buscandoTarefa)):
                                                                foreach($buscandoTarefa as $mostrar):
                                                          ?>
                                                              <tr>
                                                                  <td><?= $mostrar['id_atribuir_tarefa'] ?></td>
                                                                  <td><?= $mostrar['nome'] ?></td>
                                                                  <td><?= $mostrar['tema'] ?> </td>
                                                                  <td><a href="../assets/storage/curriculo/<?= $mostrar['arquivo_tarefa_enviado'] ?>" taregt="_blank">Tarefa Enviada</a></td>
                                                                  <td><a href="../assets/storage/curriculo/<?= $mostrar['arquivo_tarefa_recibo'] ?>" taregt="_blank">Tarefa Recebida</a></td>
                                                                  <td><?= $mostrar['data_entrega'] ?></td>
                                                                  <td><?= $mostrar['data_entregada'] ?></td>
                                                                  <td class="text-center">
                                                                    <!-- Atualizar tarefa -->
                                                                    <form method="POST">
                                                                      <button title="Verificar o estado da tarefa" name="<?= $submeter_tarefa = 'adicionar_estado_tarefa' . $mostrar['id_atribuir_tarefa'] ?>" class="btn btn-sm btn-success">
                                                                        <i class="fas fa-check"></i>
                                                                      </button>

                                                                      <?php
                                                                        if(isset($_POST[$submeter_tarefa])):
                                                                          echo "<script>window.alert('Funcionando')</script>";
                                                                        endif;
                                                                      ?>
                                                                    </form>
                                                                    <!-- Atualizar tarefa -->
                                                                  </td>
                                                              </tr>
                                                            <?php
                                                              endforeach;
                                                            else:?>
                                                                <tr>
                                                                  <td colspan="12" class="bg-warning p-2 text-white text-center">Não existe estagiários dentro da tua empresaa</td>
                                                                </tr>
                                                            <?php
                                                            endif;
                                                            ?>
                                                      </tbody>
                                                  </table>

                                                  <!-- Eliminar -->
                                                  <?php
                                                    if (isset($_GET['action']) && $_GET['action'] == 'delete'):
                                                        $id = $_GET['id'];
                                                        $parametros  =[
                                                            ":id"=>$id
                                                        ];
                                                        $delete = new Model();
                                                        $delete->EXE_NON_QUERY("DELETE FROM tb_candidatura_vaga WHERE id_candidatura=:id", $parametros);
                                                        if($delete == true):
                                                            echo "<script>window.alert('Apagado com sucesso');</script>";
                                                            echo "<script>location.href='accepted.php?id=aceite'</script>";
                                                        else:
                                                            echo "<script>window.alert('Operação falhou');</script>";
                                                        endif;
                                                    endif;
                                                  ?>
                                                  <!-- Eliminar -->
                                              </div>
                                          </div>
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

    <!-- Footer -->
    <?php require __DIR__ . "./includes/footer.php" ?>
    <!-- Footer -->
