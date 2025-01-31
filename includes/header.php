<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce Site</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <header>
        <nav>
            <a href="/">Home</a>
            <a href="/products">Products</a>
            <a href="/cart/cart.php" class="cart-link">
                Cart (<span id="cart-count"><?= $_SESSION['cart'] ? count($_SESSION['cart']) : 0 ?></span>)
            </a>
        </nav>
    </header>
    <div class="search-bar">
    <form action="/products" method="GET">
        <input type="text" name="search" placeholder="Search products...">
        <button type="submit">Search</button>
    </form>
</div>
    <script src="/assets/js/script.js"></script>
</body>
</html>