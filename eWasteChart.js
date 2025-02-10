document.addEventListener('DOMContentLoaded', function () {
    const ctx = document.getElementById('eWasteChart').getContext('2d');
    const myPieChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: Object.keys(report_data),
            datasets: [{
                data: Object.values(report_data),
                backgroundColor: [
                    "#FF6384",
                    "#36A2EB",
                    "#FFCE56",
                    "#4CAF50",
                    "#9C27B0",
                    "#FF9800",
                    "#795548",
                    "#607D8B",
                    "#FF5722"
                ]
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });
});
