function calculateTotal() {
    const checkboxes = document.querySelectorAll('.cart-item-checkbox');
    let subtotal = 0;
    checkboxes.forEach(checkbox => {
        if (checkbox.checked) {
            const price = parseFloat(checkbox.getAttribute('data-price'));
            const quantity = parseInt(checkbox.getAttribute('data-quantity'));
            subtotal += price * quantity;
        }
    });
    const shippingFee = 10;
    const total = subtotal + shippingFee;
    document.getElementById('subtotal').textContent = `$${subtotal.toFixed(2)}`;
    document.getElementById('total').textContent = `$${total.toFixed(2)}`;
}

function updateQuantity(id, delta) {
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'update_cart.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function () {
        if (xhr.status === 200) {
            location.reload(); // Reload the page after updating
        }
    };
    xhr.send('id=' + id + '&delta=' + delta);
}

function deleteCartItem(id) {
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'delete_cart_item.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function () {
        if (xhr.status === 200) {
            location.reload(); // Reload the page after deleting
        }
    };
    xhr.send('id=' + id);
}

function checkout() {
    const paymentMethod = document.getElementById('payment').value;
    const totalAmount = document.getElementById('total').textContent.replace('$', '');

    const orderDetails = {
        name: 'Product Name', // Replace with actual product name
        size: 'Product Size', // Replace with actual product size
        flavor: 'Product Flavor', // Replace with actual product flavor
        quantity: 1, // Replace with actual quantity
        total: parseFloat(totalAmount), // Replace with actual total amount
        payment_method: paymentMethod,
        status: 'Pending' // Replace with initial status
    };

    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'checkout.php', true);
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.onload = function () {
        if (xhr.status === 200) {
            const response = JSON.parse(xhr.responseText);
            if (response.success) {
                alert('Order placed successfully!');
                location.reload(); // Reload page or redirect to order confirmation
            } else {
                alert('Failed to place order: ' + response.error);
            }
        } else {
            alert('Failed to connect to server.');
        }
    };
    xhr.send(JSON.stringify({ order_details: orderDetails }));
}

document.addEventListener('DOMContentLoaded', function () {
    calculateTotal(); // Calculate total on page load
});

// Example: Add event listener for checkout button
const checkoutButton = document.querySelector('.checkout-button');
if (checkoutButton) {
    checkoutButton.addEventListener('click', checkout);
}
