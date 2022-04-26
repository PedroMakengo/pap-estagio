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
                    <div class="ecommerce-widget">
                        <div class="row mb-4">
                            <div class="col-xl-12 col-lg-12">
                                <div class="bg-white border p-4">
                                    <div class="row pt-1">
                                        <div class="col-lg-6">
                                            <h1 class="h6">Nome da Empresa: <strong><?= $_SESSION['nome'] ?></strong></h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                              <div class="card p-4">
                                <div class="row">
                                  <div class="col-lg-6">
                                    <h5>Gráfico de Vagas</h2>
                                  </div>
                                  <div class="col-lg-6 text-right">
                                    <a href="relatorio-pdf.php?ver=vagasEmpresa&id=<?= $_SESSION['id']?>" target="_blank">Relatório</a>
                                  </div>

                                  <div class="col-lg-12">
                                    <hr>
                                    <div>
                                      <canvas id="graficoVagas" style="height: 230px"></canvas>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                              <div class="card p-4">
                                <div class="row">
                                  <div class="col-lg-6">
                                    <h5>Gráfico de Estagiários</h2>
                                  </div>
                                  <div class="col-lg-6 text-right">
                                    <a href="relatorio-pdf.php?ver=estagiarios&id=<?= $_SESSION['id']?>" target="_blank">Relatório</a>
                                  </div>

                                  <div class="col-lg-12">
                                    <hr>
                                    <div>
                                      <canvas id="graficoEstagios" style="height: 230px"></canvas>
                                    </div>
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
    <?php require "includes/footer.php" ?>
    <!-- Footer -->

    <?php require 'includes/grafico-estatistica.php' ?>

    <script>
      $(function() {
          var graficoVagas = document.getElementById("graficoVagas").getContext("2d");
          var vagas = new Chart(graficoVagas, {
          type: "bar",
          data: {
              labels: [
              "Jan",
              "Feb",
              "Mar",
              "Apr",
              "May",
              "Jun",
              "Jul",
              "Aug",
              "Sep",
              "Oct",
              "Nov",
              "Dec",
              ],
              datasets: [
              {
                  label: "Vagas da Minha Empresa",
                  borderColor: "#1f6feb",
                  pointBorderColor: "#1f6feb",
                  pointBackgroundColor: "#1f6feb",
                  pointBorderWidth: 2,
                  pointHoverRadius: 4,
                  pointHoverBorderWidth: 1,
                  pointRadius: 4,
                  backgroundColor: "transparent",
                  fill: true,
                  borderWidth: 2,
                  data: <?= json_encode($candidaturas) ?>,
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

          var graficoEstagios = document.getElementById("graficoEstagios").getContext("2d");
          var estagiarios = new Chart(graficoEstagios, {
          type: "bar",
          data: {
              labels: [
              "Jan",
              "Feb",
              "Mar",
              "Apr",
              "May",
              "Jun",
              "Jul",
              "Aug",
              "Sep",
              "Oct",
              "Nov",
              "Dec",
              ],
              datasets: [
              {
                  label: "Estagiários registadas",
                  borderColor: "#1f6feb",
                  pointBorderColor: "#1f6feb",
                  pointBackgroundColor: "#1f6feb",
                  pointBorderWidth: 2,
                  pointHoverRadius: 4,
                  pointHoverBorderWidth: 1,
                  pointRadius: 4,
                  backgroundColor: "transparent",
                  fill: true,
                  borderWidth: 2,
                  data: <?= json_encode($dataEstagiario)?>,
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
      });
    </script>
