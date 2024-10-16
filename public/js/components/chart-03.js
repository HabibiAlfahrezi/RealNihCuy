document.addEventListener("DOMContentLoaded", () => {
  if (typeof ApexCharts === 'undefined') {
    console.error('ApexCharts is not loaded.');
    return;
  }

  fetch('/job-application')
    .then(response => response.json())
    .then(data => {
      const chartThreeOptions = {
        series: data.map(item => item.application_count),
        chart: {
          type: "donut",
          width: 380,
        },
        colors: ["#3C50E0", "#6577F3", "#8FD0EF", "#0FADCF", "#25D366"],
        labels: data.map(item => item.title),
        legend: {
          show: true,
          position: "bottom",
        },
        plotOptions: {
          pie: {
            donut: {
              size: "65%",
              background: "transparent",
            },
          },
        },
        dataLabels: {
          enabled: true,
          formatter: function (val, opts) {
            return opts.w.config.series[opts.seriesIndex]
          },
        },
        responsive: [
          {
            breakpoint: 640,
            options: {
              chart: {
                width: 400,
              },
            },
          },
        ],
      };

      const chartSelector = document.querySelectorAll("#chartThree");

      if (chartSelector.length) {
        const chartThree = new ApexCharts(
          document.querySelector("#chartThree"),
          chartThreeOptions
        );
        chartThree.render();
      }
    })
    .catch(error => console.error('Error fetching job application stats:', error));
});