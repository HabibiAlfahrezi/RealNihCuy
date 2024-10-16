document.addEventListener("DOMContentLoaded", () => {
    if (typeof ApexCharts === 'undefined') {
        console.error('ApexCharts is not loaded.');
        return;
    }

    fetch('/applied-stats')
        .then(response => response.json())
        .then(data => {
            // Initialize status variables
            let inReview = 0, approved = 0, rejected = 0, hired = 0;

            // Map data to corresponding statuses
            data.forEach(item => {
                switch(item.stage) {
                    case 'inreview':
                        inReview = item.count;
                        break;
                    case 'approved':
                        approved = item.count;
                        break;
                    case 'rejected':
                        rejected = item.count;
                        break;
                    case 'hired':
                        hired = item.count;
                        break;
                }
            });

            // Calculate total applied
            const totalApplied = inReview + approved + rejected + hired;

            const chartOptions = {
                series: [inReview, approved, rejected, hired],
                chart: {
                    type: 'donut',
                    width: 380,
                },
                colors: ["#CA8A04", "#A3E635", "#F87171", "#76D4BB"],
                labels: ["In Review", "Approved", "Rejected", "Hired"],
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
                if (totalApplied === 0) {
                    chartSelector.innerHTML = ''; // Clear any existing content in the chart container

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

                    chartSelector.appendChild(noDataMessage);
                }
            }
        })
        .catch(error => console.error('Error fetching applicant stats:', error));
});
