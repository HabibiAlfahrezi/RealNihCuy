document.addEventListener("DOMContentLoaded", () => {
    fetch('/weekly-company-data')
        .then(response => response.json())
        .then(data => {
            const jobCountData = data.map(item => item.job_count);
            const applicantsCountData = data.map(item => item.applicants_count);
            const notAppliedCountData = data.map(item => item.not_applied_count);
            const categoriesData = data.map(item => item.company_name);
  
            const chartOptions = {
                series: [
                    {
                        name: "Jobs Created",
                        data: jobCountData,
                    },
                    {
                        name: "Applicants Applied",
                        data: applicantsCountData,
                    },
                    {
                        name: "Not Applied",
                        data: notAppliedCountData,
                    },
                ],
                colors: ["#3056D3", "#FF5733", "#C70039"],
                chart: {
                    type: "bar",
                    height: 335,
                    toolbar: {
                        show: false,
                    },
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        borderRadius: 0,
                        columnWidth: "25%",
                        dataLabels: {
                            position: 'top',
                        },
                        stacked: true
                    },
                },
                dataLabels: {
                    enabled: false,
                },
                xaxis: {
                    categories: categoriesData,
                },
                legend: {
                    position: "top",
                    horizontalAlign: "left",
                },
                fill: {
                    opacity: 1,
                },
            };
  
            const chartElement = document.querySelector("#chartTwo");
  
            if (chartElement) {
                const chart = new ApexCharts(chartElement, chartOptions);
                chart.render();
            }
        })
        .catch(error => console.error('Error fetching weekly company data:', error));
  });