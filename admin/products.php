<?php include '../includes/header.php'; ?>
<?php include '../includes/db.php'; ?>

<div class="product-grid">
    <?php
    $stmt = $pdo->query("SELECT * FROM products");
    while ($product = $stmt->fetch(PDO::FETCH_ASSOC)) {
    ?>
    <div class="product-card">
        <img src="/assets/images/<?= $product['image'] ?>" alt="<?= $product['name'] ?>">
        <h3><?= $product['name'] ?></h3>
        <p>$<?= $product['price'] ?></p>
        <button onclick="addToCart(<?= $product['id'] ?>)">Add to Cart</button>
    </div>
    <?php } ?>
</div>

<?php include '../includes/footer.php'; ?>