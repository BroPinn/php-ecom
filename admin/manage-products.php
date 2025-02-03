<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');  // Redirect to login if not logged in
    exit();
}

// Logic to add/edit products using your models (Product.php)
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Products</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

    <h2>Manage Products</h2>
    <a href="index.php">Back to Dashboard</a>
    
    <!-- Add Product Form -->
    <h3>Add Product</h3>
    <form action="add-product.php" method="POST">
        <input type="text" name="name" placeholder="Product Name" required>
        <textarea name="description" placeholder="Product Description" required></textarea>
        <input type="number" name="price" placeholder="Price" required>
        <input type="number" name="stock" placeholder="Stock Quantity" required>
        <button type="submit">Add Product</button>
    </form>

    <h3>Existing Products</h3>
    <!-- Display existing products -->
    <!-- Use a loop to show all products from the database -->
    <?php
    // Example of how to fetch and display products (use your models to interact with the database)
    // Example: $products = $productModel->getAllProducts();
    ?>
    <ul>
        <li>Product 1</li>
        <li>Product 2</li>
        <!-- Loop through products here -->
    </ul>

</body>
</html>
