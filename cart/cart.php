<?php
session_start();
include '../includes/header.php';
?>

<div class="cart-container">
    <?php if(isset($_SESSION['cart']) && count($_SESSION['cart']) > 0): ?>
        <?php foreach($_SESSION['cart'] as $item): ?>
            <div class="cart-item">
                <h4><?= $item['name'] ?></h4>
                <p>Quantity: <?= $item['quantity'] ?></p>
                <p>Price: $<?= $item['price'] ?></p>
            </div>
        <?php endforeach; ?>
        <a href="checkout.php" class="checkout-btn">Proceed to Checkout</a>
    <?php else: ?>
        <p>Your cart is empty</p>
    <?php endif; ?>
</div>

<?php include '../includes/footer.php'; ?>