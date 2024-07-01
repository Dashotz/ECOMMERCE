<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analytics Dashboard</title>
    <link rel="stylesheet" href="css/analytics.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <h2>Dashboard</h2>
            </div>
            <ul class="sidebar-menu">
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="products.php">Product</a></li>                
                <li><a href="orders.php">Orders</a></li>
                <li><a href="customers.php">Customers</a></li>                
                <li class="active"><a href="analytics.php">Analytics</a></li>
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

            <section class="analytics-dashboard">
                <h2>Analytics Overview</h2>
                <p>Welcome to the analytics dashboard! Here you can view detailed insights into sales performance, user growth, and order statuses. Stay updated with the latest trends and make informed decisions for your business.</p>

                <div class="chart-wrapper">
                    <div class="chart-container">
                        <h3>Sales Performance</h3>
                        <p>Track your sales performance over the past months. Identify trends and peaks in your sales data to strategize effectively.</p>
                        <canvas id="salesChart" height="200"></canvas>
                    </div>

                    <div class="chart-container">
                        <h3>User Growth</h3>
                        <p>Analyze the growth in the number of users over time. Monitor new user registrations and retention rates.</p>
                        <canvas id="userGrowthChart" height="200"></canvas>
                    </div>

                    <div class="chart-container">
                        <h3>Order Status Distribution</h3>
                        <p>Understand the distribution of order statuses to optimize order management processes.</p>
                        <canvas id="orderStatusChart" height="200"></canvas>
                    </div>
                </div>

                <div class="sale-details">
                    <h3>Sale Details</h3>
                    <table class="sale-details-table">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Product</th>
                                <th>SKU</th>
                                <th>Category</th>
                                <th>Stock</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Added</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>#10001</td>
                                <td>Handmade Pouch</td>
                                <td>HP001</td>
                                <td>Accessories</td>
                                <td>50</td>
                                <td>$20.00</td>
                                <td>In Stock</td>
                                <td>02/01/24</td>
                                <td>
                                    <button class="btn-preview">Preview</button>
                                    <button class="btn-edit">Edit</button>
                                    <button class="btn-delete">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td>#10002</td>
                                <td>Smartwatch E2</td>
                                <td>SW002</td>
                                <td>Wearables</td>
                                <td>30</td>
                                <td>$150.00</td>
                                <td>Low Stock</td>
                                <td>01/15/24</td>
                                <td>
                                    <button class="btn-preview">Preview</button>
                                    <button class="btn-edit">Edit</button>
                                    <button class="btn-delete">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="pagination">
                        <a href="#">&laquo;</a>
                        <a href="#">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#">4</a>
                        <a href="#">5</a>
                        <a href="#">6</a>
                        <a href="#">&raquo;</a>
                    </div>
                </div>
            </section>
        </main>
    </div>
    <script src="js/analytics.js"></script>
</body>
</html>
