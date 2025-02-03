<?php
require_once("../models/User.php");

class AuthController {

    // Handle login logic
    public function login($username, $password) {
        $userModel = new User();
        $user = $userModel->getUserByUsername($username);
        
        if ($user && password_verify($password, $user['password'])) {
            // Store session variables
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];  // Store the role in session
            $_SESSION['logged_in'] = true;

            // Redirect based on user role
            if ($user['role'] === 'admin') {
                header('Location: ../admin/index.php'); // Admin dashboard
            } else {
                header('Location: ../index.php'); // Frontend for users
            }
            exit();
        } else {
            // Invalid login credentials
            return false;
        }
    }

    // Handle registration logic
    public function register($username, $email, $password) {
        $userModel = new User();
        
        // Check if the username already exists
        if ($userModel->getUserByUsername($username)) {
            return false;  // Username already taken
        }
        
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        // Register the user in the database
        return $userModel->createUser($username, $email, $hashedPassword);
    }

    // Handle logout logic
    public function logout() {
        session_unset();
        session_destroy();
        header('Location: login.php');
        exit();
    }
}
?>
