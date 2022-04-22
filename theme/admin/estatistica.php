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
                          <div class="col-lg-6">
                            <div class="card p-4">
                              <div class="row">
                                <div class="col-lg-6">
                                  <h5>Gráfico de Candidatura</h2>
                                </div>
                                <div class="col-lg-6 text-right">
                                  <a href="relatorio-pdf.php?id=candidatura" target="_blank">Relatório</a>
                                </div>

                                <div class="col-lg-12">
                                  <hr>
                                  <div>
                                    <canvas id="graficoCandidatura" style="height: 230px"></canvas>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="col-lg-6">
                            <div class="card p-4">
                              <div class="row">
                                <div class="col-lg-6">
                                  <h5>Estudantes por Sexo</h2>
                                </div>
                                <div class="col-lg-6 text-right">
                                  <a href="relatorio-pdf.php?id=estudantes" target="_blank">Relatório</a>
                                </div>

                                <div class="col-lg-12">
                                  <hr>
                                  <div>
                                    <canvas id="graficoEstudanteSexo" style="height: 230px"></canvas>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="col-lg-6">
                            <div class="card p-4">
                              <div class="row">
                                <div class="col-lg-6">
                                  <h5>Gráfico de Vagas</h2>
                                </div>
                                <div class="col-lg-6 text-right">
                                  <a href="relatorio-pdf.php?id=vagas" target="_blank">Relatório</a>
                                </div>

                                <div class="col-lg-12">
                                  <hr>
                                  <div>
                                    <canvas id="graficoVaga" style="height: 230px"></canvas>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="col-lg-6">
                            <div class="card p-4">
                            <div class="row">
                                <div class="col-lg-6">
                                  <h5>Emissão de Declaração</h2>
                                </div>
                                <div class="col-lg-6 text-right">
                                  <a href="relatorio-pdf.php?id=declaracoes" target="_blank">Relatório</a>
                                </div>

                                <div class="col-lg-12">
                                  <hr>
                                  <div>
                                    <canvas id="graficoDeclaracao" style="height: 230px"></canvas>
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
    <?php require __DIR__ . "./includes/footer.php" ?>
    <!-- Footer -->
    <?php require 'includes/grafico-estatistica.php' ?>

    <script>
        $(function() {
          var graficoCandidatura = document.getElementById("graficoCandidatura").getContext("2d");
          var candidatura = new Chart(graficoCandidatura, {
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
                  label: "Empresas registadas",
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
                  data: <?=  json_encode($candidaturas) ?>,
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

          var graficoEstudanteSexo = document.getElementById("graficoEstudanteSexo").getContext("2d");
          var estudanteSexo = new Chart(graficoEstudanteSexo, {
          type: "pie",
          data: {
              labels: [
              "Masculino",
              "Femenino",
              ],
              datasets: [
              {
                  label: "Empresas registadas",
                  borderColor: "#fff",
                  pointBorderColor: "#fff",
                  pointBackgroundColor: "#fff",
                  pointBorderWidth: 2,
                  pointHoverRadius: 4,
                  pointHoverBorderWidth: 1,
                  pointRadius: 4,
                  backgroundColor: ["#1f6feb", "#EE558E"],
                  fill: true,
                  borderWidth: 2,
                  data: <?= json_encode($dataSexo) ?>,
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

          var graficoVaga = document.getElementById("graficoVaga").getContext("2d");
          var vaga = new Chart(graficoVaga, {
          type: "line",
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
                  label: "Empresas registadas",
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
                  data: <?=  json_encode($dataVaga) ?>,
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

          var graficoDeclaracao = document.getElementById("graficoDeclaracao").getContext("2d");
          var declaracao = new Chart(graficoDeclaracao, {
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
                  label: "Empresas registadas",
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
                  data: <?=  json_encode($dataDeclaracao) ?>,
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
