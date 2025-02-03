<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: auth/login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Frontend</title>
</head>
<body>

    <h2>Welcome to the User Frontend</h2>
    <p>Hello, <?php echo $_SESSION['username']; ?>!</p>

    <a href="auth/logout.php">Logout</a>

</body>
</html>
