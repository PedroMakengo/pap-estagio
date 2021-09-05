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
        data: [10, 20, 40, 10, 30, 10, 20, 30, 60, 20, 10, 20],
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
