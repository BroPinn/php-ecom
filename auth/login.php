<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include '../includes/db.php';
    
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        header("Location: /");
    } else {
        $error = "Invalid credentials";
    }
}
include '../includes/header.php';
?>

<form method="POST">
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Login</button>
</form>

<?php include '../includes/footer.php'; ?>