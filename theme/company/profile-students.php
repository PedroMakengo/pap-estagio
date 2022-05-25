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
                        <?php
                          $id = $_GET['id'];
                          $parametros = [":id" => $id];
                          $buscarProfileEstudante = new Model();
                          $buscando = $buscarProfileEstudante->EXE_QUERY("SELECT * FROM tb_aluno WHERE id_aluno=:id", $parametros);
                          foreach($buscando as $mostrar):
                            $nome = $mostrar['nome'];
                            $foto = $mostrar['foto'];
                            $genero = $mostrar['sexo'] === 'M' ? "Masculino": "Femenino";
                            $contacto = $mostrar['contacto'];
                            $email = $mostrar['email'];
                          endforeach;
                        ?>

                        <div class="row mb-4">
                            <div class="col-xl-12 col-lg-12">
                                <div class="bg-white border p-4">
                                    <div class="row pt-1">
                                        <div class="col-lg-6 text-left">
                                            <h1 class="h6">
                                              <a href="accepted.php?id=aceite">
                                                <i class="fas fa-arrow-circle-left"></i> Voltar
                                              </a>
                                            </h1>
                                        </div>
                                        <div class="col-lg-6 text-right">
                                            <h1 class="h6">Informações sobre o Estagiário: <strong><?= $nome ?></strong></h1>
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
                                        <p>Todas as informações relacionadas ao estudante <strong><?= $nome ?></strong> encontras nesta sessão.</p>
                                    </div>
                                </div>

                                <div class="card">
                                  <form method="POST">
                                    <?php

                                      $parametros = [
                                        ":idAluno"  => $_GET['id'],
                                        ":idCandidatura" => $_GET['candidatura']
                                      ];
                                      $candidatura = new Model();
                                      $candidaturaAceite = $candidatura->EXE_QUERY("SELECT * FROM tb_candidatura_vaga
                                      WHERE id_aluno=:idAluno AND id_candidatura=:idCandidatura AND estado_candidatura=1", $parametros);
                                      if($candidaturaAceite): ?>
                                      <button class="col-lg-12 btn btn-info" disabled>
                                        Estagiário
                                      </button>
                                     <?php
                                     else:?>
                                      <button name="atualizar_candidatura" class="col-lg-12 btn btn-primary">
                                        Aceitar a candidatura
                                      </button>
                                    <?php
                                      endif;
                                    ?>
                                    <?php

                                      if(isset($_POST['atualizar_candidatura'])):
                                        $idAluno = $_GET['id'];
                                        $id      = $_GET['candidatura'];

                                        $parametros = [
                                          ":id" => $id,
                                          ":estado" => 1
                                        ];

                                        $aceitarCandidatura = new Model();
                                        $aceitarCandidatura->EXE_NON_QUERY("UPDATE tb_candidatura_vaga SET
                                         estado_candidatura=:estado WHERE id_candidatura=:id", $parametros);

                                         if($aceitarCandidatura):
                                          echo "<script>location.href='profile-students.php?id=${idAluno}&candidatura=${id}'</script>";
                                         endif;
                                      endif;
                                    ?>
                                  </form>
                                </div>

                                <!-- Mostrar apenas quando o aluno inserir a declaração -->
                                <?php

                                  $parametros = [":id" => $_GET['id']];
                                  $buscandoDadosDeclaracao = new Model();
                                  $buscandoDeclaracao = $buscandoDadosDeclaracao->EXE_QUERY("SELECT * FROM tb_emissao_declaracao WHERE
                                  id_aluno=:id", $parametros);

                                  if($buscandoDeclaracao):?>
                                    <div class="card">
                                      <h5 class="card-header"><strong>Declaração de Estágio</strong></h5>
                                      <div class="card-body p-4">
                                          <p>Para visualizar a declaração de efeito de estágio <a href="../study/declaracao.php?id=<?= $_GET['id']?>" target="_blank" class="text-primary">clique aqui</a></p>
                                      </div>
                                    </div>
                                  <?php
                                  else:?>

                                  <?php
                                  endif;?>
                                <!-- Mostrar apenas quando o aluno inserir a declaração -->
                            </div>

                            <div class="col-xl-8 col-lg-8 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header"><strong>Informações do estudante</strong></h5>
                                    <div class="card-body p-4">
                                      <div class="row">
                                        <div class="col-lg-4">
                                          <img src="../assets/storage/study/<?= $foto ?>" alt="<?= $nome ?>" class="col-lg-12">
                                        </div>
                                        <div class="col-lg-8">
                                          <div class="row">
                                            <div class="col-lg-12">
                                              <h5>Nome completo: <strong><?= $nome ?></strong></h5><hr />
                                            </div>
                                            <div class="col-lg-6">
                                              <h5>Genero: <strong><?= $genero ?></strong></h5>
                                            </div>
                                            <div class="col-lg-6">
                                              <h5>Contacto: <strong><?= $contacto ?></strong></h5>
                                            </div>
                                            <div class="col-lg-12">
                                              <hr>
                                              <h5>E-mail: <strong><?= $email ?></strong></h5>
                                            </div>

                                            <div class="col-lg-12">
                                              <hr>
                                              <?php
                                                  $parametros = [":id" => $_GET['id']];
                                                  $buscandoCurriculo = $buscarProfileEstudante->EXE_QUERY("SELECT * FROM tb_candidatura_vaga WHERE id_aluno=:id", $parametros);
                                                  if($buscandoCurriculo):
                                                    foreach($buscandoCurriculo as $mostrar):
                                                      $curriculo = $mostrar['curriculo'];
                                                    endforeach;
                                                    ?>
                                                      <h5>Curriculo: <a href="../assets/storage/curriculo/<?= $curriculo ?>">Abrir curriculo</a></h5>
                                                    <?php
                                                  else:

                                                  endif;
                                                ?>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <h5 class="card-header"><strong>Gráfico de atividades</strong></h5>
                                    <div class="card-body p-4">
                                        <div>
                                          <canvas id="alunoChart" style="height: 200px"></canvas>
                                       </div>
                                    </div>
                                </div>
                            </div>
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
    <?php require "includes/grafico-atividades.php" ?>

    <script>
        $(function() {
          var lineChart = document.getElementById("alunoChart").getContext("2d");
          var myLineChart = new Chart(lineChart, {
          type: "pie",
          data: {
              labels: [
              "Tarefas Aprovadas",
              "Tarefas Em Processo",
              "Relatórios Submetidos",
              ],
              datasets: [
              {
                  label: "Atividades registradas",
                  borderColor: "#fff",
                  pointBorderColor: "#fff",
                  pointBackgroundColor: "#fff",
                  pointBorderWidth: 2,
                  pointHoverRadius: 4,
                  pointHoverBorderWidth: 1,
                  pointRadius: 4,
                  backgroundColor: ["#1f6fe", "#000", "red"],
                  fill: true,
                  borderWidth: 2,
                  data: <?= json_encode($dataAtividade) ?>,
              },
              ],
          },
          options: {
              responsive: true,
              maintainAspectRatio: false,
              legend: {
              position: "bottom",
              labels: {
                  padding: 10,
                  fontColor: "#1f6feb",
              },
              },
              tooltips: {
              bodySpacing: 4,
              mode: "nearest",
              intersect: 0,
              position: "nearest",
              xPadding: 10,
              yPadding: 10,
              caretPadding: 10,
              },
              layout: {
              padding: { left: 15, right: 15, top: 15, bottom: 15 },
              },
          },
          });
        })
    </script>
