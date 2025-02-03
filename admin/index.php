<?php
session_start();

// Check if the user is logged in and has admin role
if (!isset($_SESSION['logged_in']) || $_SESSION['role'] !== 'admin') {
    header('Location: ../auth/login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body>

    <h2>Welcome Admin</h2>
    <p>Welcome, <?php echo $_SESSION['username']; ?>!</p>

    <a href="../auth/logout.php">Logout</a>

</body>
</html>
