<?php
session_start();
include 'inc/db.php';
$user_id = 1;  // Example user ID, replace with actual user ID if you have user authentication

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $payment_method = $_POST['payment_method'];
    $total_amount = floatval($_POST['total_amount']);
    $order_status = 'Pending';

    foreach ($_POST['items'] as $item_id) {
        $stmt = $conn->prepare("
            SELECT ci.*, p.name, p.price, p.img 
            FROM cart_items ci
            JOIN products p ON ci.product_id = p.id
            WHERE ci.id = ? AND ci.user_id = ?
        ");
        $stmt->bind_param("ii", $item_id, $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $item = $result->fetch_assoc();

            $stmt_insert = $conn->prepare("
                INSERT INTO orders (user_id, name, size, flavor, quantity, total, payment, status, product_id)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
            ");
            $stmt_insert->bind_param("isssidssi", $user_id, $item['name'], $item['size'], $item['flavor'], $item['quantity'], $total_amount, $payment_method, $order_status, $item['product_id']);
            $stmt_insert->execute();
            $stmt_insert->close();

            // Optionally, remove the item from the cart
            $stmt_delete = $conn->prepare("DELETE FROM cart_items WHERE id = ? AND user_id = ?");
            $stmt_delete->bind_param("ii", $item_id, $user_id);
            $stmt_delete->execute();
            $stmt_delete->close();
        }
        $stmt->close();
    }

    $conn->close();

    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid request method.']);
}
?>
