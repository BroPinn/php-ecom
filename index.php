<?php
session_start();
include 'includes/db.php';
include 'includes/header.php';
?>

<main class="container">
    <!-- Hero Section -->
    <section class="hero">
        <h1>Welcome to Our Store</h1>
        <p>Discover Amazing Products at Great Prices</p>
        <a href="/products" class="btn">Shop Now</a>
    </section>

    <!-- Featured Products -->
    <section class="featured-products">
        <h2>Featured Products</h2>
        <div class="product-grid">
            <?php
            try {
                // Get 4 random featured products
                $stmt = $pdo->query("SELECT * FROM products ORDER BY RAND() LIMIT 4");
                while ($product = $stmt->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <div class="product-card">
                <img src="/assets/images/<?= htmlspecialchars($product['image']) ?>" 
                     alt="<?= htmlspecialchars($product['name']) ?>">
                <h3><?= htmlspecialchars($product['name']) ?></h3>
                <p class="price">$<?= number_format($product['price'], 2) ?></p>
                <button class="add-to-cart" 
                        onclick="addToCart(<?= $product['id'] ?>)">
                    Add to Cart
                </button>
                <a href="/products/product.php?id=<?= $product['id'] ?>" 
                   class="view-details">View Details</a>
            </div>
            <?php
                }
            } catch(PDOException $e) {
                echo "<p>Error loading products: " . $e->getMessage() . "</p>";
            }
            ?>
        </div>
    </section>

    <!-- Additional Sections -->
    <section class="benefits">
        <div class="benefit-card">
            <h3>Free Shipping</h3>
            <p>On orders over $50</p>
        </div>
        <div class="benefit-card">
            <h3>24/7 Support</h3>
            <p>Dedicated customer service</p>
        </div>
        <div class="benefit-card">
            <h3>Secure Payments</h3>
            <p>100% secure processing</p>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>