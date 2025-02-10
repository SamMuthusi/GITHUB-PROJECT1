document.addEventListener('DOMContentLoaded', function () {
    // Hardcoded data for demonstration
    const data = {
        labels: ["Monitoring & Control", "Electronic Tools", "IT & Telecom", "Automatic Dispensers", "Toys & Sports", "Household Appliances", "Consumer Electronics", "Medical Devices", "Others"],
        datasets: [{
            data: [310, 215, 180, 500, 1200, 200, 100, 47, 813],
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
    };

    const ctx = document.getElementById('E_reportChart').getContext('2d');
    const myPieChart = new Chart(ctx, {
        type: 'pie',
        data: data,
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });
});
