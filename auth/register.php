<?php
session_start();
require_once('authController.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $authController = new AuthController();
    
    // Call register function from AuthController
    if ($authController->register($username, $email, $password)) {
        echo 'Registration successful!';
        header('Location: login.php');  // Redirect to login page after successful registration
    } else {
        $error = 'Username already taken!';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>

    <h2>Register</h2>
    <?php if (isset($error)) { echo "<p>$error</p>"; } ?>

    <form action="" method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Register</button>
    </form>

    <p>Already have an account? <a href="login.php">Login here</a></p>

</body>
</html>
