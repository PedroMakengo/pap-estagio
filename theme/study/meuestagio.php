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
                                      <h1 class="h6">Por favor Sr(a) <strong><?= $_SESSION["nome"] ?></strong>, atualize a sua conta !</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                      <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
                          <div class="card rounded p-4">
                          <form method="POST" enctype="multipart/form-data">
                            <?php
                              $parametros = [":idUsuarioLogado" => $_SESSION['id']];
                              $atualizarDadosUsuarioLogado = new Model();
                              $selecionarDadosDoUsuarioLogado = $atualizarDadosUsuarioLogado->EXE_QUERY("SELECT * FROM tb_aluno WHERE id_aluno=:idUsuarioLogado", $parametros);

                              if($selecionarDadosDoUsuarioLogado):
                                foreach($selecionarDadosDoUsuarioLogado as $mostrar):
                                  $nome = $mostrar['nome'];
                                  $email = $mostrar['email'];
                                  $numero_de_processo = $mostrar['numero_processo'];
                                  $foto = $mostrar['foto'];
                                  $sexo = $mostrar['sexo'];
                                  $contacto = $mostrar['contacto'];
                            ?>
                                <div class="row">
                                  <div class="form-group col-lg-4">
                                    <label for="#">Nome</label>
                                    <input type="text" name="nome" value="<?= $mostrar['nome'] ?>" placeholder="Nome Completo" class="form-control form-control-lg" />
                                  </div>
                                  <div class="form-group col-lg-4">
                                    <label for="#">E-mail</label>
                                    <input type="email" name="email" value="<?= $mostrar['email'] ?>" placeholder="E-mail" class="form-control form-control-lg" />
                                  </div>
                                  <div class="form-group col-lg-4">
                                    <label for="#">Processo</label>
                                    <input type="text" name="processo" value="<?= $mostrar['numero_processo'] ?>" placeholder="Processo" class="form-control form-control-lg" />
                                  </div>
                                  <div class="form-group col-lg-4">
                                    <label for="#">Genero</label>
                                    <select name="sexo" value="<?= $sexo ?>" id="" class="form-control form-control-lg">
                                      <option value="M">Masculino</option>
                                      <option value="F">Femenino</option>
                                    </select>
                                  </div>
                                  <div class="form-group col-lg-4">
                                    <label for="#">Contacto</label>
                                    <input type="text" name="contacto" value="<?= $mostrar['contacto'] ?>" placeholder="Contacto" class="form-control form-control-lg" />
                                  </div>
                                  <div class="form-group col-lg-4">
                                    <label for="">Foto</label>
                                    <input type="file" class="form-control" name="foto">
                                  </div>
                                </div>
                            <?php endforeach;
                              endif;
                            ?>

                            <div class="row">
                                <div class="form-group col-lg-4">
                                <input type="submit" name="atualizarConta" value="Atualizar os dados" class="bg-primary btn">
                              </div>
                            </div>

                            <?php
                              if(isset($_POST['atualizarConta'])):

                                // Pegando os dados dos inputs
                                $nome  = $_POST['nome'];
                                $email = $_POST['email'];
                                $sexo  = $_POST['sexo'];
                                $processo = $_POST['processo'];
                                $contacto = $_POST['contacto'];

                                // Pegando a foto
                                $target        = "../assets/storage/study/" . basename($_FILES['foto']['name']);
                                $foto          = $_FILES['foto']['name'];


                                // Procurar saber se o n??mero de processo adicionado j?? existe no banco de dados e ?? diferente
                                // de zero

                                $parametros = [
                                  ":nome"     => $nome,
                                  ":email"    => $email,
                                  ":processo" => $processo,
                                  ":sexo"     => $sexo,
                                  ":foto"     => $foto,
                                  ":tel"      => $contacto,
                                  ":id"       => $_SESSION['id']
                                ];

                                $updateUsuario = new Model();
                                $updateUsuario->EXE_NON_QUERY("UPDATE tb_aluno SET
                                  nome=:nome,
                                  email=:email,
                                  sexo=:sexo,
                                  numero_processo=:processo,
                                  foto=:foto,
                                  contacto=:tel
                                  WHERE id_aluno=:id
                                ", $parametros);

                                if($updateUsuario):
                                  if (move_uploaded_file($_FILES['foto']['tmp_name'], $target)):
                                      $sms = "Uploaded feito com sucesso";
                                  else:
                                      $sms = "N??o foi poss??vel fazer o upload";
                                  endif;
                                  echo "<script>location.href='home.php?id=home'</script>";
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
                        <div class="row">
                            <!-- Painel de Atividades -->
                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">

                              <div class="card p-4">
                                <h1 class="h6 mb-4">Minhas tarefas</h1>
                                <table class="table" id="dataMinhaTarefa">
                                  <thead>
                                    <tr>
                                      <th>#</th>
                                      <th>Empresa</th>
                                      <th>Data de Entrega</th>
                                      <th>Arquivo</th>
                                      <th>Tema</th>
                                      <th>Ac????es</th>
                                    </tr>
                                  </thead>

                                  <tbody>
                                    <!-- Pegar dados sobre tarefa -->
                                    <?php
                                      $parametros = [":id" => $_SESSION['id']];
                                      $buscandoMinhasTarefasRelacionadasAminhaVaga = new Model();
                                      $todasAsMinhasTarefasPorExecutar = $buscandoMinhasTarefasRelacionadasAminhaVaga->EXE_QUERY("SELECT * FROM tb_atribuir_tarefa
                                      INNER JOIN tb_empresa ON tb_atribuir_tarefa.id_empresa=tb_empresa.id_empresa
                                      WHERE id_aluno=:id", $parametros);
                                      if($todasAsMinhasTarefasPorExecutar):
                                        foreach($todasAsMinhasTarefasPorExecutar as $mostrar):?>
                                          <tr>
                                            <td><?= $mostrar['id_atribuir_tarefa'] ?></td>
                                            <td><?= $mostrar['nome_empresa'] ?></td>
                                            <td><?= $mostrar['data_entrega'] ?></td>
                                            <td><a href="<?= $mostrar['data_entrega'] ?>">Arquivo</a></td>
                                            <td><?= $mostrar['tema'] ?></td>
                                            <td>
                                              <a href="detalhe-tarefa.php?id=<?= $mostrar['id_atribuir_tarefa'] ?>" class="btn btn-primary btn-sm">
                                                <i class="fas fa-eye"></i>
                                              </a>
                                            </td>
                                          </tr>
                                        <?php
                                        endforeach;
                                      else: ?>
                                        <tr>
                                          <td colspan="7" class="bg-warning p-2 text-white text-center">N??o existe</td>
                                        </tr>
                                        <?php
                                      endif;
                                    ?>
                                    <tr>
                                      <td></td>
                                    </tr>
                                    <!-- Pegar dados sobre tarefa -->
                                  </tbody>
                                </table>
                              </div>

                              <div class="card p-4">
                                <div class="row mb-2">
                                  <div class="col-lg-6">
                                    <h2 class="h6">Meus relat??rios</h2>
                                  </div>
                                  <div class="col-lg-6 text-right">
                                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target=".bd-example-modal-xl">Adicionar relat??rio</button>
                                  </div>
                                </div>

                                <table class="table" id="table-registro">
                                  <thead>
                                    <tr>
                                      <th>#</th>
                                      <th>Arquivo</th>
                                      <th>Estado</th>
                                      <th>Valor do Relat??rio</th>
                                      <th>Data</th>
                                      <th>Ac????es</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php

                                      $parametros = [":id"  => $_SESSION['id']];
                                      $meusRelatorios = new Model();
                                      $buscarMeusRelatorios = $meusRelatorios->EXE_QUERY("SELECT * FROM tb_relatorio_estagio WHERE id_aluno=:id",
                                      $parametros);

                                      if(count($buscarMeusRelatorios)):
                                        foreach($buscarMeusRelatorios as $mostrar):
                                    ?>
                                        <tr>
                                          <td><?= $mostrar['id_relatorio'] ?></td>
                                          <td><a href="../assets/storage/curriculo/<?= $mostrar['id_relatorio'] ?>">Baixar Arquivo</a></td>
                                          <td><?= $mostrar['estado_relatorio'] === '0' ? 'Processando':'Aprovado' ?></td>
                                          <td><?= $mostrar['valor_relatorio'] === '0' ? 'Por Definir': $mostrar['valor_relatorio'] ?></td>
                                          <td><?= $mostrar['data_registro_relatorio'] ?></td>
                                          <td>
                                            <a href="meuestagio.php?id=<?= $mostrar['id_relatorio'] ?>&action=delete" class="btn btn-sm bg-danger text-white">
                                              <i class="fas fa-trash"></i>
                                            </a>
                                          </td>
                                        </tr>
                                    <?php
                                        endforeach;
                                      else:?>
                                        <tr>
                                          <td colspan="12" class="bg-warning text-center text-white">N??o existe nenhum relat??rio</td>
                                        </tr>
                                    <?php
                                      endif;?>
                                  </tbody>

                                  <!-- Eliminar -->
                                  <?php
                                    if (isset($_GET['action']) && $_GET['action'] == 'delete'):
                                        $id = $_GET['id'];
                                        $parametros  =[
                                            ":id"=>$id
                                        ];
                                        $delete = new Model();
                                        $delete->EXE_NON_QUERY("DELETE FROM tb_relatorio_estagio WHERE id_relatorio=:id", $parametros);
                                        if($delete == true):
                                            echo '<script>
                                                    swal({
                                                    title: "Dado Eliminado!",
                                                    text: "Opera????o Efetuada com sucesso",
                                                    icon: "success",
                                                    button: "Fechar",
                                                    })
                                                </script>';
                                            echo '<script>
                                                      setTimeout(function() {
                                                          window.location.href="meuestagio.php?id=meuestagio";
                                                      }, 2000)
                                                  </script>';
                                        else:
                                            echo "<script>window.alert('Opera????o falhou');</script>";
                                        endif;
                                    endif;
                                  ?>
                                  <!-- Eliminar -->
                                </table>
                              </div>

                              <!-- Modal Relat??rio -->

                              <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Adicionar Relat??rio</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>

                                    <div class="modal-body">
                                      <form method="POST">
                                        <div class="row">
                                          <div class="col-lg-12 form-group">
                                            <label for="">Arquivo <small class="text-warning">(Relat??rio pdf)</small> </label>
                                            <input type="file" name="foto" class="form-control form-control-lg">
                                          </div>

                                          <div class="form-group col-lg-6">
                                            <input type="submit" name="adicionar_relatorio" value="Enviar Relat??rio" class="btn btn-primary form-control form-control-lg"/>
                                          </div>

                                          <?php
                                            if(isset($_POST['adicionar_relatorio'])):

                                              $target        = "../assets/storage/curriculo/" . basename($_FILES['foto']['name']);
                                              $foto          = $_FILES['foto']['name'];

                                              $parametros = [
                                                ":id" => $_SESSION['id'],
                                                ":arquivo" => $foto,
                                                ":estado"  => 0,
                                                ":valor"   => 0,
                                              ];

                                              $inserir = new Model();
                                              $inserir->EXE_NON_QUERY("INSERT INTO tb_relatorio_estagio
                                              (
                                                id_aluno,
                                                arquivo_entrega,
                                                estado_relatorio,
                                                valor_relatorio,
                                                data_registro_relatorio
                                              ) VALUES (:id, :arquivo, :estado, :valor, now()) ", $parametros);

                                              if($inserir):
                                                if (move_uploaded_file($_FILES['foto']['tmp_name'], $target)):
                                                    $sms = "Uploaded feito com sucesso";
                                                else:
                                                    $sms = "N??o foi poss??vel fazer o upload";
                                                endif;
                                                  echo '<script>
                                                        swal({
                                                          title: "Opera????o efetuada com sucesso!",
                                                          text: "Inser????o efetuada com sucesso",
                                                          icon: "success",
                                                          button: "Fechar!",
                                                        })
                                                      </script>';
                                                  echo '<script>
                                                          setTimeout(function() {
                                                            window.location.href="meuestagio.php?id=meuestagio";
                                                          }, 2000)
                                                      </script>';
                                              endif;
                                            endif;
                                          ?>
                                        </div>
                                      </form>
                                    </div>

                                  </div>
                                </div>
                              </div>
                              <!-- Modal Relat??rio -->

                            </div>
                            <!-- Painel de Atividades -->


                            <!-- Painel de Est??gio -->
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                              <div class="card p-4">
                                <h1 class="h6 text-center">Perfil do meu est??gio</h1>


                                <div class="mt-4">
                                   <!-- Selecionar os dados do usu??rio no banco de dados -->
                                   <?php
                                        $parametros = [":id"  => $_SESSION['id']];
                                        $dadosUsuario = new Model();
                                        $dadoUsuarioListagem = $dadosUsuario->EXE_QUERY("SELECT * FROM tb_aluno
                                        WHERE id_aluno=:id", $parametros);
                                        foreach($dadoUsuarioListagem as $mostrar):
                                      ?>
                                    <div class="m-auto text-center">
                                      <img src="../assets/storage/study/<?= $mostrar['foto'] ?>"
                                      style="width: 120px; height: 120px; margin: 0 auto; border-radius: 50%;
                                      ">
                                    </div>
                                    <ul class="mt-4">
                                        <li class="mb-2">Nome <span class="badge badge-primary"><?= $mostrar['nome'] ?></span></li>
                                        <li class="mb-2">N?? Processo <span class="badge badge-primary"><?= $mostrar['numero_processo'] ?></span></li>
                                        <li class="mb-2">E-mail <span class="badge badge-primary"><?= $mostrar['email'] ?></span></li>
                                        <hr>
                                        <?php
                                          $parametros = [":id" => $_SESSION['id'], ":estado" => 1];
                                          $buscandoEstagioMedico = new Model();
                                          $buscandoEstagio = $buscandoEstagioMedico->EXE_QUERY("SELECT * FROM tb_candidatura_vaga
                                          INNER JOIN tb_vaga_estagio ON tb_candidatura_vaga.id_vaga_estagio=tb_vaga_estagio.id_vaga_estagio
                                          INNER JOIN tb_empresa ON tb_vaga_estagio.id_empresa=tb_empresa.id_empresa
                                          WHERE id_aluno=:id AND estado_candidatura=:estado", $parametros);
                                          if($buscandoEstagio):
                                            foreach($buscandoEstagio as $mostrar):
                                              $idEmpresa     = $mostrar['id_empresa'];
                                              $minha_empresa = $mostrar['nome_empresa'];
                                            endforeach;
                                            ?>
                                            <div class="mt-2">Empresa: <strong class="badge badge-primary"><?= $minha_empresa ?></strong> </div>
                                            <?php
                                            else:
                                              ?>
                                              <div class="mt-2">Empresa: <strong class="badge badge-warning text-white">Nenhuma empresa vinculada</strong> </div>
                                            <?php
                                          endif;
                                        ?>
                                    </ul>
                                    <?php
                                        endforeach;
                                      ?>
                                </div>
                              </div>


                              <?php
                                 $parametros = [":id" => $_SESSION['id'], ":estado" => 1];
                                 $buscandoEstagioMedico = new Model();
                                 $buscandoEstagio = $buscandoEstagioMedico->EXE_QUERY("SELECT * FROM tb_candidatura_vaga
                                 INNER JOIN tb_vaga_estagio ON tb_candidatura_vaga.id_vaga_estagio=tb_vaga_estagio.id_vaga_estagio
                                 INNER JOIN tb_empresa ON tb_vaga_estagio.id_empresa=tb_empresa.id_empresa
                                 WHERE id_aluno=:id AND estado_candidatura=:estado", $parametros);
                                 if($buscandoEstagio):?>
                                  <!-- Aparecer apenas quando tiver empresa -->
                                  <div class="card p-4 mt-2">
                                    <?php
                                      // Verificar se existe uma declara????o com os meus dados
                                      $parametros = [":id" => $_SESSION["id"]];
                                      $buscandoDeclaracao = new Model();
                                      $buscandoMinhaDeclaracao = $buscandoDeclaracao->EXE_QUERY("SELECT * FROM tb_emissao_declaracao WHERE id_aluno=:id", $parametros);
                                      if($buscandoMinhaDeclaracao):?>
                                        <div class="mt-4">
                                          <a href="declaracao.php?id=<?= $_SESSION["id"] ?>" target="__blank" class="btn btn-primary col-lg-12">Visualizar Declara????o</a>
                                        </div>
                                      <?php
                                      else: ?>
                                        <h1 class="h6">Pedido de Declara????o</h1>
                                        <div class="mt-4">
                                          <a href="#" data-toggle="modal" data-target=".modal_declaracao" target="__blank" class="btn btn-primary col-lg-12">Fazer</a>
                                        </div>
                                    <?php
                                      endif; ?>
                                  </div>

                                  <div class="modal fade modal_declaracao" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Efetuar o pedido de declara????o</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                            <form method="POST">
                                              <div class="row">
                                                <div class="col-lg-12 form-group">
                                                  <button type="submit" class="btn btn-primary col-lg-12" name="adicionar_declaracao">Emitir Declara????o</button>

                                                  <?php
                                                    if(isset($_POST['adicionar_declaracao'])):

                                                      $parametros = [
                                                        ":id" => $_SESSION['id'],
                                                        ":idEmpresa" => $idEmpresa,
                                                        ":estado"    => 0
                                                      ];

                                                      $inserir = new Model();
                                                      $inserir->EXE_NON_QUERY("INSERT INTO tb_emissao_declaracao
                                                      (id_aluno, id_empresa, data_emissao, estado_emissao)
                                                      VALUES
                                                      (:id, :idEmpresa, now(), :estado) ", $parametros);

                                                      if($inserir):
                                                        echo '<script>
                                                                swal({
                                                                  title: "Opera????o efetuado com sucesso!",
                                                                  text: "A tua opera????o foi efetuada com sucesso",
                                                                  icon: "success",
                                                                  button: "Fechar!",
                                                                })
                                                              </script>';
                                                        echo '<script>
                                                                setTimeout(function() {
                                                                    window.location.href="meuestagio.php?id=meuestagio";
                                                                }, 2000)
                                                            </script>';
                                                      endif;
                                                    endif;
                                                  ?>
                                                </div>
                                              </div>
                                            </form>
                                          </div>
                                      </div>
                                    </div>
                                  </div>
                                  <!-- Aparecer apenas quando tiver empresa -->
                                <?php
                                endif;?>
                            </div>
                            <!-- Painel de Est??gio -->
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->

        <!-- Modal de declara????o  -->

        <!-- Modal de declara????o  -->
    </div>


<!-- Footer -->
<?php require __DIR__ . "./includes/footer.php" ?>
<!-- Footer -->
