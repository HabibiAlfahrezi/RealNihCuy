document.addEventListener("DOMContentLoaded", () => {
  if (typeof ApexCharts === 'undefined') {
    console.error('ApexCharts is not loaded.');
    return;
  }

  fetch('/allcompany')
    .then(response => response.json())
    .then(data => {
      const chartOneOptions = {
        series: [
          {
            name: "Total Companies",
            data: data.map(item => item.totalCompanies),
          },
          {
            name: "Premium Companies",
            data: data.map(item => item.premiumCompanies),
          },
        ],
        legend: {
          show: true,
          position: "top",
          horizontalAlign: "left",
        },
        colors: ["#3C50E0", "#80CAEE"],
        chart: {
          fontFamily: "Satoshi, sans-serif",
          height: 335,
          type: "area",
          dropShadow: {
            enabled: true,
            color: "#623CEA14",
            top: 10,
            blur: 4,
            left: 0,
            opacity: 0.1,
          },
          toolbar: {
            show: false,
          },
        },
        responsive: [
          {
            breakpoint: 1024,
            options: {
              chart: {
                height: 300,
              },
            },
          },
          {
            breakpoint: 1366,
            options: {
              chart: {
                height: 350,
              },
            },
          },
        ],
        stroke: {
          width: [2, 2],
          curve: "smooth",
        },
        markers: {
          size: 0,
        },
        labels: {
          show: false,
          position: "top",
        },
        grid: {
          xaxis: {
            lines: {
              show: true,
            },
          },
          yaxis: {
            lines: {
              show: true,
            },
          },
        },
        dataLabels: {
          enabled: false,
        },
        markers: {
          size: 4,
          colors: "#fff",
          strokeColors: ["#3056D3", "#80CAEE"],
          strokeWidth: 3,
          strokeOpacity: 0.9,
          strokeDashArray: 0,
          fillOpacity: 1,
          discrete: [],
          hover: {
            size: undefined,
            sizeOffset: 5,
          },
        },
        xaxis: {
          type: "category",
          categories: data.map(item => item.week),
          axisBorder: {
            show: false,
          },
          axisTicks: {
            show: false,
          },
        },
        yaxis: {
          title: {
            style: {
              fontSize: "0px",
            },
          },
          min: 0,
          max: Math.max(...data.map(item => item.totalCompanies)) + 10,
        },
      };

      const chartOne = new ApexCharts(
        document.querySelector("#chartOne"),
        chartOneOptions
      );
      chartOne.render();
    })
    .catch(error => console.error('Error fetching company stats:', error));
});