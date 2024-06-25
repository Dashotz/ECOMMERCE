<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <h2>Dashboard</h2>
            </div>
            <ul class="sidebar-menu">
                <li class="active"><a href="dashboard.php">Dashboard</a></li>
                <li><a href="products.php">Product</a></li>
                <li><a href="orders.php">Orders</a></li>
                <li><a href="customers.php">Customers</a></li>
                <li><a href="analytics.php">Analytics</a></li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <header class="header">
                <div class="search-bar">
                    <input type="text" placeholder="Search...">
                </div>
                <div class="user-info">
                    <span>Moni Roy</span>
                    <span>Admin</span>
                </div>
            </header>
            
            <section class="dashboard-overview">
                <div class="overview-filters">
                    <button class="filter-button active">All Time</button>
                    <button class="filter-button">12 Months</button>
                    <button class="filter-button">30 Days</button>
                    <button class="filter-button">7 Days</button>
                    <button class="filter-button">24 Hour</button>
                </div>
                <div class="metrics">
                    <div class="metric-card">
                        <h3>Total Pending</h3>
                        <p class="metric-value">2040</p>
                        <p class="metric-change up">1.8% Up from yesterday</p>
                    </div>
                    <div class="metric-card">
                        <h3>Total Sales</h3>
                        <p class="metric-value">$89,000</p>
                        <p class="metric-change down">4.3% Down from yesterday</p>
                    </div>
                    <div class="metric-card">
                        <h3>Total Order</h3>
                        <p class="metric-value">10,293</p>
                        <p class="metric-change up">1.3% Up from past week</p>
                    </div>
                    <div class="metric-card">
                        <h3>Total User</h3>
                        <p class="metric-value">40,689</p>
                        <p class="metric-change up">8.5% Up from yesterday</p>
                    </div>
                </div>
            </section>
            
            <section class="sales-details">
                <h2>Sales Details</h2>
                <div class="chart">
                    <!-- Placeholder for the sales chart -->
                    <canvas id="salesChart"></canvas>
                </div>
            </section>
            
            <section class="recent-orders">
                <h2>Recent Orders</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Product</th>
                            <th>Date</th>
                            <th>Customer</th>
                            <th>Total</th>
                            <th>Payment</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Example rows -->
                        <tr>
                            <td>#302012</td>
                            <td>Handmade Pouch +3 other products</td>
                            <td>1 min ago</td>
                            <td>John Bushmill<br>johnb@mail.com</td>
                            <td>$121.00</td>
                            <td>Mastercard</td>
                            <td><span class="status processing">Processing</span></td>
                            <td>
                                <button class="action-button edit">Edit</button>
                                <button class="action-button delete">Delete</button>
                            </td>
                        </tr>
                        <!-- Repeat rows as needed -->
                    </tbody>
                </table>
                <div class="pagination">
                    <button class="page-button">&laquo;</button>
                    <button class="page-button active">1</button>
                    <button class="page-button">2</button>
                    <button class="page-button">3</button>
                    <button class="page-button">4</button>
                    <button class="page-button">&raquo;</button>
                </div>
            </section>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('salesChart').getContext('2d');
        var salesChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                datasets: [{
                    label: 'Sales',
                    data: [12000, 19000, 3000, 5000, 20000, 30000, 45000],
                    borderColor: '#007bff',
                    backgroundColor: 'rgba(0, 123, 255, 0.2)',
                    fill: true
                }]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        beginAtZero: true
                    },
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>
