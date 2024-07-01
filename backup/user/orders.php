<?php
include 'inc/db.php';
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Function to update order status
function cancelOrder($order_id) {
    global $conn;

    // Update order status to 'Cancelled' in the database
    $stmt = $conn->prepare("UPDATE orders SET status = 'Cancelled' WHERE id = ?");
    $stmt->bind_param("i", $order_id);

    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders - Pawfect Shoppe</title>
    <link rel="stylesheet" href="css/order.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/nav1.css">
    <link rel="stylesheet" href="css/cancel-card.css"> <!-- New CSS file for cancel card styling -->
    <script src="https://kit.fontawesome.com/249726be58.js" crossorigin="anonymous"></script>
    <script>
        function cancelOrder(order_id) {
            if (confirm("Are you sure you want to cancel this order?")) {
                // AJAX request to cancel order
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "cancel_order.php", true);
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        var response = xhr.responseText;
                        if (response.trim() === 'success') {
                            // Reload the page or update UI as needed
                            alert("Order cancelled successfully.");
                            window.location.reload(); // Example: reload the page
                        } else {
                            alert("Failed to cancel order. Please try again.");
                        }
                    }
                };
                xhr.send("order_id=" + order_id);
            }
        }
    </script>
</head>
<body>
    <!-- Header Section -->
    <header>
        <section class="header">
        <?php include("../inc/nav.php"); ?>     
        <?php include("../inc/nav1.php"); ?>   
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
                        WHERE o.user_id = ?
                    ");
                    $stmt->bind_param("i", $user_id);
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
                                            <button onclick="cancelOrder(' . $order['id'] . ')">Cancel Order</button>
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

</body>
</html>
