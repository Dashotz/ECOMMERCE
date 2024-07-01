const salesCtx = document.getElementById('salesChart').getContext('2d');
const salesChart = new Chart(salesCtx, {
    type: 'line',
    data: {
        labels: ['January', 'February', 'March', 'April', 'May', 'June'],
        datasets: [{
            label: 'Sales',
            data: [12000, 15000, 10000, 20000, 25000, 22000],
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

const userGrowthCtx = document.getElementById('userGrowthChart').getContext('2d');
const userGrowthChart = new Chart(userGrowthCtx, {
    type: 'bar',
    data: {
        labels: ['January', 'February', 'March', 'April', 'May', 'June'],
        datasets: [{
            label: 'New Users',
            data: [500, 700, 800, 600, 900, 1000],
            backgroundColor: 'rgba(153, 102, 255, 0.2)',
            borderColor: 'rgba(153, 102, 255, 1)',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

const orderStatusCtx = document.getElementById('orderStatusChart').getContext('2d');
const orderStatusChart = new Chart(orderStatusCtx, {
    type: 'pie',
    data: {
        labels: ['Completed', 'Pending', 'Cancelled'],
        datasets: [{
            label: 'Order Status',
            data: [60, 30, 10],
            backgroundColor: [
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(255, 99, 132, 0.2)'
            ],
            borderColor: [
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(255, 99, 132, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true
    }
});