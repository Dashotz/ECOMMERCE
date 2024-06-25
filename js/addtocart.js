// Retrieve cart details from localStorage
const cart = JSON.parse(localStorage.getItem('cart'));

if (cart) {
    // Display cart item
    const cartItemsContainer = document.querySelector('.cart-items');
    const subtotalElement = document.getElementById('subtotal');
    const discountElement = document.getElementById('discount');
    const totalElement = document.getElementById('total');
    const paymentSelect = document.getElementById('payment');

    // Define delivery fee
    const deliveryFee = 10;

    function updateCart() {
        cartItemsContainer.innerHTML = '';
        let subtotal = 0;

        cart.forEach((item, index) => {
            const cartItem = document.createElement('div');
            cartItem.classList.add('cart-item');

            cartItem.innerHTML = `
                <input type="checkbox" checked>
                <img src="${item.image}" alt="${item.name}">
                <div class="cart-item-details">
                    <h4>${item.name}</h4>
                    <p>Size: ${item.size}</p>
                    <p>Color: ${item.color}</p>
                    <p>$${item.price}</p>
                </div>
                <div class="cart-item-controls">
                    <button onclick="decreaseQuantity(${index})">-</button>
                    <input type="text" value="${item.quantity}" readonly>
                    <button onclick="increaseQuantity(${index})">+</button>
                    <button onclick="removeFromCart(${index})">🗑️</button>
                </div>
            `;

            cartItemsContainer.appendChild(cartItem);
            subtotal += item.price * item.quantity;
        });

        const discount = subtotal * 0.2;
        const total = subtotal - discount + deliveryFee;

        subtotalElement.innerText = `$${subtotal.toFixed(2)}`;
        discountElement.innerText = `-$${discount.toFixed(2)}`;
        totalElement.innerText = `$${total.toFixed(2)}`;
    }

    function decreaseQuantity(index) {
        if (cart[index].quantity > 1) {
            cart[index].quantity--;
            updateCart();
        }
    }

    function increaseQuantity(index) {
        cart[index].quantity++;
        updateCart();
    }

    function removeFromCart(index) {
        cart.splice(index, 1);
        updateCart();
    }

    updateCart();

    // Handle checkout button click
    const checkoutButton = document.querySelector('.checkout-button');
    checkoutButton.addEventListener('click', function() {
        const selectedPaymentMethod = paymentSelect.value;
        // Process payment based on selected method
        processPayment(selectedPaymentMethod);
    });

} else {
    document.getElementById('cart-item-list').innerText = 'No items in cart.';
    document.getElementById('order-summary-details').innerText = 'No items to summarize.';
}

// Function to process payment
function processPayment(paymentMethod) {
    // Implement payment processing logic here
    alert(`Payment method selected: ${paymentMethod}`);
}
