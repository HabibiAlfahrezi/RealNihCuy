document.addEventListener("DOMContentLoaded", () => {
    if (typeof ApexCharts === 'undefined') {
      console.error('ApexCharts is not loaded.');
      return;
    }
  
    fetch('/company-stats')
      .then(response => response.json())
      .then(data => {
        const daysOfWeek = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
        
        // Aggregate data for each day of the week
        const aggregatedData = daysOfWeek.reduce((acc, day) => {
          acc[day] = {
            views: data.reduce((sum, week) => sum + (week.data[day]?.views || 0), 0),
            applicants: data.reduce((sum, week) => sum + (week.data[day]?.applicants || 0), 0)
          };
          return acc;
        }, {});
        
        // Convert aggregated data to format suitable for ApexCharts
        const seriesData = [
          {
            name: "Total Views",
            data: daysOfWeek.map(day => aggregatedData[day].views)
          },
          {
            name: "Total Applied",
            data: daysOfWeek.map(day => aggregatedData[day].applicants)
          }
        ];

        const chartOneOptions = {
          series: seriesData,
          legend: {
            show: true,
            position: "top",
            horizontalAlign: "left",
          },
          colors: ["#3C50E0", "#80CAEE"], // Pastikan ini berisi warna yang berbeda untuk Views dan Applied
          chart: {
            fontFamily: "Satoshi, sans-serif",
            height: 335,
            type: "bar",
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
          plotOptions: {
            bar: {
              horizontal: false,
              columnWidth: '70%', // Adjust width for better visualization
              endingShape: 'rounded',
              stacked: true
            },
          },
          stroke: {
            width: [0, 0],
          },
          xaxis: {
            type: "category",
            categories: daysOfWeek, // Days of the week as labels
            axisBorder: {
              show: false,
            },
            axisTicks: {
              show: false,
            },
            labels: {
              show: true,
            }
          },
          yaxis: {
            show: false, // Hide y-axis
          },
          grid: {
            show: false, // Hide grid lines
          },
          dataLabels: {
            enabled: false,
          },
          tooltip: {
            y: {
              formatter: function (value) {
                return value;
              }
            }
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
