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


                                  // Procurar saber se o número de processo adicionado já existe no banco de dados e é diferente
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
                                        $sms = "Não foi possível fazer o upload";
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
                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                              <div class="card p-4">
                                <h1 class="h6 mb-4">Sobre o meu estágio</h1>

                                <table class="table">
                                  <thead>
                                    <tr>
                                      <th>Id</th>
                                      <th></th>
                                    </tr>
                                  </thead>

                                  <tbody>
                                    <td colspan="12" class="bg-warning p-2 text-white text-center">Não existe</td>
                                  </tbody>
                                </table>
                              </div>

                              <div class="card p-4">
                                <div class="row mb-2">
                                  <div class="col-lg-6">
                                    <h2 class="h6">Meus relatórios</h2>
                                  </div>
                                  <div class="col-lg-6 text-right">
                                    <button class="btn btn-primary btn-sm" >Adicionar relatório</button>
                                  </div>
                                </div>
                                <table class="table">
                                  <thead>
                                    <tr>
                                      <th>Id</th>
                                      <th>Arquivo</th>
                                      <th>Estado</th>
                                      <th>Valor do Relatório</th>
                                      <th>Data</th>
                                      <th>Acções</th>
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
                                          <!-- Trabalhar nesta área -->
                                        </tr>
                                    <?php
                                        endforeach;
                                      else:?>
                                        <tr>
                                          <td colspan="12" class="bg-warning text-center text-white">Não existe nenhum relatório</td>
                                        </tr>
                                    <?php
                                      endif;?>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                              <div class="card p-4">
                                <h1 class="h6 text-center">Perfil do meu estágio</h1>
                                <?php

                                  $parametros = [":id" => $_SESSION['id'], ":estado" => 1];
                                  $buscandoEstagioMedico = new Model();
                                  $buscandoEstagio = $buscandoEstagioMedico->EXE_QUERY("SELECT * FROM tb_candidatura_vaga
                                  INNER JOIN tb_vaga_estagio ON tb_candidatura_vaga.id_vaga_estagio=tb_vaga_estagio.id_vaga_estagio
                                  INNER JOIN tb_empresa ON tb_vaga_estagio.id_empresa=tb_empresa.id_empresa
                                  WHERE id_aluno=:id AND estado_candidatura=:estado", $parametros);
                                  foreach($buscandoEstagio as $mostrar):
                                    $idEmpresa     = $mostrar['id_empresa'];
                                    $minha_empresa = $mostrar['nome_empresa'];
                                  endforeach;
                                ?>

                                <div class="mt-4">
                                   <!-- Selecionar os dados do usuário no banco de dados -->
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
                                        <li class="mb-2">Nº Processo <span class="badge badge-primary"><?= $mostrar['numero_processo'] ?></span></li>
                                        <li class="mb-2">E-mail <span class="badge badge-primary"><?= $mostrar['email'] ?></span></li>
                                        <hr>
                                        <div class="mt-2">Empresa: <strong class="badge badge-primary"><?= $minha_empresa ?></strong> </div>
                                    </ul>
                                    <?php
                                        endforeach;
                                      ?>
                                </div>
                              </div>
                              <div class="card p-4 mt-2">
                                <?php
                                  // Verificar se existe uma declaração com os meus dados
                                  $parametros = [":id" => $_SESSION["id"]];
                                  $buscandoDeclaracao = new Model();
                                  $buscandoMinhaDeclaracao = $buscandoDeclaracao->EXE_QUERY("SELECT * FROM tb_emissao_declaracao WHERE id_aluno=:id", $parametros);
                                  if($buscandoMinhaDeclaracao):?>
                                    <div class="mt-4">
                                      <a href="declaracao.php?id=<?= $_SESSION["id"] ?>" target="__blank" class="btn btn-primary col-lg-12">Visualizar Declaração</a>
                                    </div>
                                  <?php
                                  else: ?>
                                    <h1 class="h6">Pedido de Declaração</h1>
                                    <div class="mt-4">
                                      <a href="#" data-toggle="modal" data-target=".bd-example-modal-xl" target="__blank" class="btn btn-primary col-lg-12">Fazer</a>
                                    </div>
                                <?php
                                  endif; ?>
                              </div>

                              <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Efetuar o pedido de declaração</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <form method="POST">
                                          <div class="row">
                                            <div class="col-lg-12 form-group">
                                              <button type="submit" class="btn btn-primary col-lg-12" name="adicionar_declaracao">Emitir Declaração</button>

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
                                                              title: "Operação efetuado com sucesso!",
                                                              text: "A tua operação foi efetuada com sucesso",
                                                              icon: "success",
                                                              button: "Fechar!",
                                                            })
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
