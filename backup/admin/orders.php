<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Management</title>
    <link rel="stylesheet" href="css/orders.css">
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
                <li class="active"><a href="orders.php">Orders</a></li>
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

            <section class="order-management">
                <h2>Orders</h2>
                <table class="order-table">
                    <thead>
                        <tr>
                            <th><input type="checkbox"></th>
                            <th>Order ID</th>
                            <th>Customer</th>
                            <th>Date</th>
                            <th>Total</th>
                            <th>Payment</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Example rows -->
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>#301901</td>
                            <td>John Bushnell</td>
                            <td>02/15/24</td>
                            <td>$121.00</td>
                            <td>Mastercard</td>
                            <td><span class="status processing">Processing</span></td>
                            <td>
                                <button class="action-button preview">Preview</button>
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
                    <button class="page-button">5</button>
                    <button class="page-button">6</button>
                    <button class="page-button">7</button>
                    <button class="page-button">&raquo;</button>
                </div>
            </section>
        </main>
    </div>
</body>
</html>
