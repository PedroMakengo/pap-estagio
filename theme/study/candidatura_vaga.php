
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

                <!-- Selecionar dados relacionado a vaga -->
                <?php
                  $parametros = [":id" => $_GET['id']];
                  $dadosEstagio = new Model();
                  $buscandoDadosDoEstagio = $dadosEstagio->EXE_QUERY("SELECT * FROM tb_vaga_estagio
                  INNER JOIN tb_empresa ON tb_vaga_estagio.id_empresa=tb_empresa.id_empresa
                  WHERE tb_vaga_estagio.id_vaga_estagio=:id",
                  $parametros);

                  if(count($buscandoDadosDoEstagio)):
                    foreach($buscandoDadosDoEstagio as $dados):
                      $empresa = $dados["nome_empresa"];
                      $area = $dados['area_atuacao_vaga'];
                      $candidaturaDisponivel = $dados['numero_restante_candidatura'];
                      $candidatosInscritos = $dados['numero_candidatura'] - count($buscandoDadosDoEstagio);
                      $estadoVaga = $dados['estado_vaga'] == 0 ? "Aberto" : "Fechado";

                      $competencias = $dados["competencias"];
                      $linguas      = $dados["linguas"];
                      $ensino       = $dados["ensino"];
                      $atividades   = $dados["atividades_por_realizar"];
                    endforeach;
                  endif;

                ?>

                 <div class="ecommerce-widget">
                    <div class="row mb-4">
                        <div class="col-xl-12 col-lg-12">
                            <div class="bg-white border rounded p-4">
                                <div class="row pt-1">
                                    <div class="col-lg-6">
                                        <h1 class="h6">
                                          <a href="home.php?id=home">
                                            <i class="fas fa-arrow-left"></i>
                                          </a>
                                        </h1>
                                    </div>
                                    <div class="col-lg-6 text-right">
                                        <h1 class="h6">Candidatura de Estágio</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-8 col-sm-12 col-12">
                          <div class="card p-4 rounded">
                            <h1 class="h5 border-bottom pb-2">Dados da Vaga</h1>

                            <div class="mt-2">
                              <ul>
                                <li class="mb-2">Empresa <span class="float-right badge badge-primary"><?= $empresa?></span></li>
                                <li class="mb-2">Área <span class="float-right badge badge-primary"><?= $area?></span></li>
                                <li class="mb-2">Nº Candidatura Disponível <span class="float-right badge badge-primary"><?= $candidaturaDisponivel?></span></li>
                                <li class="mb-2">Nº Candidatos <span class="float-right badge badge-primary"><?= $candidatosInscritos?></span></li>
                                <li class="mb-2">Estado Vaga <span class="float-right badge badge-primary"><?= $estadoVaga?></span></li>
                              </ul>
                            </div>

                            <div class="mt-3">
                              <h2 class="h5 border-bottom pb-2">Ensino</h2>
                              <div class="p-2">
                                <p><?= $ensino ?></p>
                              </div>
                            </div>

                            <div class="mt-3">
                              <h2 class="h5 border-bottom pb-2">Competências</h2>
                              <div class="p-2">
                                <p><?= $competencias ?></p>
                              </div>
                            </div>

                            <div class="mt-3">
                              <h2 class="h5 border-bottom pb-2">Atividades  por realizar</h2>
                              <div class="p-2">
                                <p><?= $atividades ?></p>
                              </div>
                            </div>

                            <div class="mt-3">
                              <h2 class="h5 border-bottom pb-2">Línguas</h2>
                              <div class="p-2">
                                <p><?= $linguas ?></p>
                              </div>
                            </div>

                          </div>
                        </div>
                        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                            <?php
                                $parametros = [":id"  => $_SESSION['id'], ":idVaga" => $_GET['id']];
                                $verificarMinhaCandidatura = new Model();
                                $resultadoVerificarMinhaCandidatura = $verificarMinhaCandidatura->EXE_QUERY("SELECT * FROM tb_candidatura_vaga WHERE id_aluno=:id AND id_vaga_estagio=:idVaga"
                                , $parametros);

                                if(count($resultadoVerificarMinhaCandidatura)):
                            ?>
                              <div class="card rounded p-4">
                                  <div class="row">
                                    <div class="col-lg-12">
                                      <div class="bg-success text-center rounded p-3 text-white">
                                        <p>A tua candidatura foi enviada com sucesso</p>
                                      </div>
                                    </div>
                                  </div>
                              </div>
                            <?php
                              else:
                            ?>
                                <div class="card rounded p-4">
                                  <?php

                                    $parametros = [":id" => $_SESSION['id']];
                                    $buscandoDadosUsuario = new Model();
                                    $buscandoDados = $buscandoDadosUsuario->EXE_QUERY("SELECT * FROM tb_aluno WHERE id_aluno=:id", $parametros);
                                    foreach($buscandoDados as $mostrar):
                                      $nomeUsuario = $mostrar['nome'];
                                      $sexoUsuario = $mostrar['sexo'] === "M" ? 'Masculino': 'Femenino';
                                      $emailUsuario = $mostrar['email'];
                                      $contactoUsuario = $mostrar['contacto'];
                                    endforeach;

                                  ?>
                                  <form method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                      <div class="col-lg-6 form-group">
                                          <label for="">Nome Completo</label>
                                          <input type="text" class="form-control form-control-lg" disabled value="<?= $nomeUsuario ?>" />
                                      </div>
                                      <div class="col-lg-6 form-group">
                                          <label for="">Genero</label>
                                          <input type="text" class="form-control form-control-lg" disabled value="<?= $sexoUsuario ?>" />
                                      </div>
                                      <div class="col-lg-6 form-group">
                                          <label for="">E-mail</label>
                                          <input type="text" class="form-control form-control-lg" disabled value="<?= $emailUsuario ?>" />
                                      </div>
                                      <div class="col-lg-6 form-group">
                                          <label for="">Contacto</label>
                                          <input type="text" class="form-control form-control-lg" disabled value="<?= $contactoUsuario ?>" />
                                      </div>
                                      <div class="col-lg-12 form-group">
                                          <label for="">Currículo</label>
                                          <input type="file" class="form-control form-control-lg" name="foto"  />
                                      </div>
                                      <div class="col-lg-12 form-group">
                                        <label for="">Solicitação da Candidatura</label>
                                        <textarea name="message" class="form-control form-control-lg"></textarea>
                                      </div>

                                      <div class="col-lg-4">
                                        <input type="submit" name="candidatura_vaga" value="Solicitar de Vaga" class="btn btn-primary form-control form-control-lg">
                                      </div>
                                    </div>
                                    <?php
                                      if(isset($_POST['candidatura_vaga'])):
                                        $idEstagioSelecionado = $_GET['id'];

                                        // BuscandoOnumeroDeVagasDisponiveis
                                        $parametros = [":id" => $idEstagioSelecionado];
                                        $buscandoNumeroDeVagasDisponiveis = new Model();
                                        $buscandoNumero = $buscandoNumeroDeVagasDisponiveis->EXE_QUERY("SELECT * FROM tb_vaga_estagio WHERE id_vaga_estagio=:id", $parametros);

                                        foreach ($buscandoNumero as $mostrar):
                                          $numeroRestante = $mostrar['numero_restante_candidatura'];
                                        endforeach;

                                        if((int)$numeroRestante > 0):


                                          // echo (int)$numeroRestante - 1;
                                          // Atualizar o campo
                                          $numero_disponivel = (int)$numeroRestante - 1;
                                          $parametros = [
                                            ":id"   => $_GET['id'],
                                            ":numero" => $numero_disponivel
                                          ];

                                          $atualizarCampo = new Model();
                                          $atualizarCampo->EXE_NON_QUERY("UPDATE tb_vaga_estagio SET
                                          numero_restante_candidatura=:numero
                                          WHERE id_vaga_estagio=:id", $parametros);
                                          // Atualizar o campo


                                          // INSERIR A MINHA CANDIDATURA
                                          $target        = "../assets/storage/curriculo/" . basename($_FILES['foto']['name']);
                                          $curriculo     = $_FILES['foto']['name'];

                                          $parametros = [
                                            ":idAluno"    => $_SESSION['id'],
                                            ":idEstagio"  => $idEstagioSelecionado,
                                            ":mensagem"   => $_POST['message'],
                                            ":curriculo"  => $curriculo
                                          ];

                                          $candidaturaInserir = new Model();
                                          $candidaturaInserir->EXE_NON_QUERY("INSERT INTO tb_candidatura_vaga
                                          (id_aluno, id_vaga_estagio, data_registro_candidatura, estado_candidatura, motivacao_candidatura, curriculo)
                                          VALUES (:idAluno, :idEstagio, now(), 0, :mensagem, :curriculo) ", $parametros);

                                          if($candidaturaInserir):
                                            if (move_uploaded_file($_FILES['foto']['tmp_name'], $target)):
                                                $sms = "Uploaded feito com sucesso";
                                            else:
                                                $sms = "Não foi possível fazer o upload";
                                            endif;
                                            echo '<script>
                                                    swal({
                                                      title: "Operação efetuado com sucesso!",
                                                      text: "A tua operação foi efetuada com sucesso",
                                                      icon: "success",
                                                      button: "Fechar!",
                                                    })
                                                  </script>';
                                            echo "<script>location.href=`candidatura_vaga.php?id=$idEstagioSelecionado`</script>";
                                          endif;

                                          // INSERIR A MINHA CANDIDATURA
                                        else:
                                          echo '<script>
                                                  swal({
                                                    title: "Opps",
                                                    text: "Essa vaga foi fechada",
                                                    icon: "success",
                                                    button: "Fechar!",
                                                  })
                                                </script>';
                                        endif;


                                      endif;
                                    ?>
                                  </form>
                                </div>
                            <?php
                              endif;
                            ?>
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
