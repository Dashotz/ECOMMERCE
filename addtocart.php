<!-- addtocart.html -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pawfect Shoppe - Cart</title>
    <link rel="stylesheet" href="css/addtocart.css">
    <link rel="stylesheet" href="css/nav.css">    
    <script src="https://www.paypal.com/sdk/js?client-id=AQT4EM_LHM8qCUf3EJqH6iSXqCZz39FFZdzF127CM0MHqLOIPJgxPR_nFeKomKtFzgFTNi8IPxKYtC35"></script>
</head>
<body>
    <!-- Header Section -->
    <header>
    <section class="header">
     <?php include("inc/nav.php"); ?>     
    </section>
    </header>
    
    <!-- Main Content -->
    <main>
    <div class="cart-container">
        <div class="cart-items">
            <h2>Cart Items</h2>
            <div id="cart-item-list"></div>
        </div>
        <div class="order-summary">
            <h3>Order Summary</h3>
            <div id="order-summary-details"></div>
            <!-- Payment Method Selection -->
            <div class="payment-method">
                <label for="payment">Payment Method:</label>
                <select id="payment">
                    <option value="gcash">GCash</option>
                    <option value="paypal">PayPal</option>
                    <option value="mastercard">MasterCard</option>
                    <option value="cod">Cash on Delivery</option>
                </select>
            </div>
            <!-- End Payment Method Selection -->
            <button class="checkout-button">Checkout</button>
        </div>
    </div>
</main>
    
    <script>
        // Retrieve cart details from localStorage
        const cart = JSON.parse(localStorage.getItem('cart'));

        if (cart) {
            // Display cart item
            const cartItemList = document.getElementById('cart-item-list');
            cartItemList.innerHTML = `
                <div class="cart-item">
                    <img src="path/to/product-image.jpg" alt="${cart.name}">
                    <div class="cart-item-details">
                        <h4>${cart.name}</h4>
                        <p>Size: ${cart.size}</p>
                        <p>Flavor: ${cart.flavor}</p>
                        <p>Price: ${cart.price}</p>
                        <p>Quantity: ${cart.quantity}</p>
                    </div>
                </div>
            `;

            // Calculate total price including shipping fee
            const subtotal = cart.price;
            const shippingFee = 10;
            const total = subtotal + shippingFee;

            // Display order summary
            const orderSummaryDetails = document.getElementById('order-summary-details');
            orderSummaryDetails.innerHTML = `
                <p>Subtotal: <span>$${subtotal.toFixed(2)}</span></p>
                <p>Shipping Fee: <span>$${shippingFee.toFixed(2)}</span></p>
                <p>Total: <span>$${total.toFixed(2)}</span></p>
            `;
        } else {
            document.getElementById('cart-item-list').innerText = 'No items in cart.';
            document.getElementById('order-summary-details').innerText = 'No items to summarize.';
        }

        
    </script>   
</body>
</html>
