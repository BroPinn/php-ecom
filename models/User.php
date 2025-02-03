<?php
class User {

    // Database connection
    private function connectDB() {
        $host = 'localhost';
        $db = 'ecommerce';
        $user = 'root';
        $password = '';
        
        return new PDO("mysql:host=$host;dbname=$db", $user, $password);
    }

    // Get a user by username (for login)
    public function getUserByUsername($username) {
        $conn = $this->connectDB();
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        return $stmt->fetch(PDO::FETCH_ASSOC); // Return the user data as an associative array
    }

    // Create a new user (for registration)
    public function createUser($username, $email, $password, $role = 'user') {
        $conn = $this->connectDB();
        $stmt = $conn->prepare("INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$username, $email, $password, $role]); // Insert user data into database
    }
}
?>
