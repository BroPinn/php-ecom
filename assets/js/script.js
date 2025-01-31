// Add to Cart Functionality
function addToCart(productId) {
    fetch('/cart/add_to_cart.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ productId: productId })
    })
    .then(response => response.json())
    .then(data => {
        if(data.success) {
            updateCartCount(data.cartCount);
        }
    });
}

// Update Cart Counter
function updateCartCount(count) {
    document.getElementById('cart-count').textContent = count;
}