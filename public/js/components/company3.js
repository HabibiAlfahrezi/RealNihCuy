document.addEventListener("DOMContentLoaded", () => {
    if (typeof ApexCharts === 'undefined') {
        console.error('ApexCharts is not loaded.');
        return;
    }

    fetch('/job-application-stats')
        .then(response => response.json())
        .then(data => {
            // Check if data is empty and set default values
            const totalJobs = data.length > 0 ? data.reduce((acc, item) => acc + item.total_jobs, 0) : 0;
            const totalViews = data.length > 0 ? data.reduce((acc, item) => acc + item.total_views, 0) : 0;
            const totalApplicants = data.length > 0 ? data.reduce((acc, item) => acc + item.total_applicants, 0) : 0;

            const chartOptions = {
                series: [totalJobs, totalViews, totalApplicants],
                chart: {
                    type: 'donut',
                    width: 380,
                },
                colors: ["#3C50E0", "#6577F3", "#8FD0EF"],
                labels: ["Total Jobs", "Total Views", "Total Applicants"],
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
                    enabled: false,
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

            const chartSelector = document.querySelector("#chartThree");

            if (chartSelector) {
                const chartThree = new ApexCharts(chartSelector, chartOptions);
                chartThree.render();

                // Optional: Display a message if no data is available
                if (totalJobs === 0 && totalViews === 0 && totalApplicants === 0) {
                    // Clear any existing content in the chart container
                    chartSelector.innerHTML = '';

                    // Create and style the no data message
                    const noDataMessage = document.createElement('p');
                    noDataMessage.textContent = 'No data available.';
                    noDataMessage.style.textAlign = 'center';
                    noDataMessage.style.lineHeight = '400px'; // Center vertically
                    noDataMessage.style.fontSize = '16px';
                    noDataMessage.style.color = '#888'; // Adjust color to suit your design
                    noDataMessage.style.fontWeight = 'bold';
                    noDataMessage.style.position = 'absolute';
                    noDataMessage.style.top = '50%';
                    noDataMessage.style.left = '50%';
                    noDataMessage.style.transform = 'translate(-50%, -50%)';

                    // Append the message to the chart container
                    chartSelector.appendChild(noDataMessage);
                }
            }
        })
        .catch(error => console.error('Error fetching job application stats:', error));
});
