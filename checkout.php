<?php
session_start();
include 'inc/db.php';

// Example user ID, replace with actual user ID if you have user authentication
$user_id = 1;

// Retrieve order details from session or JavaScript (if using session, ensure to set the session variables)
// Example: $_SESSION['order_details'] = $_POST['order_details'];
$orders = $_POST['orders'];

// Parse order details (example structure: id, name, size, flavor, quantity, total, payment_method, status)
// Ensure to sanitize and validate data before inserting into the database

// Example insert query
$stmt = $conn->prepare("
    INSERT INTO orders (id, name, size, flavor, quantity, total, payment, status)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?)
");

// Bind parameters
$stmt->bind_param("isssiiss", $user_id, $order_details['name'], $order_details['size'], $order_details['flavor'], $order_details['quantity'], $order_details['total'], $order_details['payment_method'], $order_details['status']);

// Execute query
if ($stmt->execute()) {
    // Insert successful
    echo json_encode(array('success' => true));
} else {
    // Insert failed
    echo json_encode(array('success' => false, 'error' => $stmt->error));
}

$stmt->close();
$conn->close();
?>
