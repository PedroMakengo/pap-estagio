    <!-- jquery 3.3.1 -->
   <script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstap bundle js -->
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js -->
    <script src="../assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <!-- main js -->
    <script src="../assets/libs/js/main-js.js"></script>
    <script src="../assets/libs/js/dashboard-ecommerce.js"></script>

    <script src="../assets/scripts/data-table.js"></script>
    <script src="../assets/scripts/jquery.dataTables.js"></script>
    <script src="../assets/scripts/dataTables.bootstrap4.js"></script>

    <script src="../assets/scripts/Chart.min.js"></script>

    <?php
        include 'grafico-estagio.php';
    ?>
    <script>
         $(document).ready(function () {

            $('#dataTableEstagio').dataTable();
            $('#dataTableEstagioAceite').dataTable();
            $("#dataTableEstagioAceiteCandidato").dataTable();

            var lineChart = document.getElementById("mycompra-chart").getContext("2d");
            var myLineChart = new Chart(lineChart, {
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
                    label: "Candidaturas registadas",
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
                    data: <?=  json_encode($estagioMensal) ?>,
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
</body>

</html>


