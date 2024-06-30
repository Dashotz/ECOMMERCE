<?php
include 'inc/db.php';
session_Start();
$user_id = 1;  // Example user ID, replace with actual user ID if you have user authentication
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders - Pawfect Shoppe</title>
    <link rel="stylesheet" href="css/order.css">
    <link rel="stylesheet" href="css/nav.css">
</head>
<body>
    <!-- Header Section -->
    <header>
        <section class="header">
        <?php include("../inc/nav.php"); ?>     
        </section>
    </header>
    
    <!-- Main Content -->
    <main>
        <div class="account-container">
            <aside>
                <h2>Manage My Account</h2>
                <ul>
                    <li><a href="profile.php">My Profile</a></li>
                    <li><a href="address.php">Address Book</a></li>
                    <li><a href="payments.php">My Payment Options</a></li>
                </ul>
                <h2>My Orders</h2>
                <ul>
                    <li><a href="orders.php" class="active">My Orders</a></li>                   
                </ul>
            </aside>
            <section class="account-details">
                <h2>My Orders</h2>
                <nav class="order-nav">
                    <ul>
                        <li><a href="#" onclick="filterOrders('All')">All</a></li>
                        <li><a href="#" onclick="filterOrders('To Pay')">To Pay</a></li>
                        <li><a href="#" onclick="filterOrders('To Ship')">To Ship</a></li>
                        <li><a href="#" onclick="filterOrders('To Receive')">To Receive</a></li>
                        <li><a href="#" onclick="filterOrders('Completed')">Completed</a></li>
                        <li><a href="#" onclick="filterOrders('Cancelled')">Cancelled</a></li>
                        <li><a href="#" onclick="filterOrders('Refund')">Refund</a></li>
                    </ul>
                </nav>
                <div class="search-bar">
                    <input type="text" id="search-input" placeholder="Search orders..." onkeyup="searchOrders()">
                </div>
                <div class="orders-table" id="orders-table">
                    <?php
                    $stmt = $conn->prepare("
                        SELECT o.*, p.img 
                        FROM orders o
                        JOIN products p ON o.name = p.name
                    ");
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        while ($order = $result->fetch_assoc()) {
                            echo '
                            <div class="order-item" data-status="' . htmlspecialchars($order['status']) . '" data-name="' . htmlspecialchars($order['name']) . '">
                                <div class="order-header">
                                    <div class="order-status">' . htmlspecialchars($order['status']) . '</div>
                                </div>
                                <div class="order-details">
                                    <div class="order-image">
                                        <img src="productimg/' . htmlspecialchars($order['img']) . '" alt="' . htmlspecialchars($order['name']) . '">
                                    </div>
                                    <div class="order-info">
                                        <h3>' . htmlspecialchars($order['name']) . '</h3>
                                        <p>Size: ' . htmlspecialchars($order['size']) . '</p>
                                        <p>Flavor: ' . htmlspecialchars($order['flavor']) . '</p>
                                        <p>Quantity: ' . htmlspecialchars($order['quantity']) . '</p>
                                    </div>
                                    <div class="order-pricing-actions">
                                        <div class="order-pricing">
                                            <p>Price: $' . htmlspecialchars($order['total']) . '</p>
                                            <p>Delivery Fee: $10</p>
                                            <p>Order Price: $' . htmlspecialchars($order['total'] + 10) . '</p>
                                        </div>
                                        <div class="order-actions">
                                            <button>Order Details</button>
                                            <button>Buy Again</button>
                                        </div>
                                    </div>
                                </div>
                            </div>';
                        }
                    } else {
                        echo 'No orders found.';
                    }

                    $stmt->close();
                    ?>
                </div>
            </section>
        </div>
    </main>

    <script src="js/orders.js"></script>
</body>
</html>
