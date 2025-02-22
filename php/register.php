<?php
session_start();
include "includes/db_connect.php"; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = "Invalid email format.";
        header("Location: register_form.php");
        exit();
    }

    // Validate password length
    if (strlen($password) < 6) {
        $_SESSION['error'] = "Password must be at least 6 characters.";
        header("Location: register_form.php");
        exit();
    }

    // Check if email is already registered
    $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->execute([$email]);
    
    if ($stmt->rowCount() > 0) {
        $_SESSION['error'] = "Email already registered.";
        header("Location: register_form.php");
        exit();
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert new user
    $stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
    
    if ($stmt->execute([$name, $email, $hashed_password])) {
        $_SESSION['success'] = "Account created successfully! Please log in.";
        header("Location: login.php"); 
        exit();
    } else {
        $_SESSION['error'] = "Something went wrong. Please try again.";
        header("Location: register_form.php");
        exit();
    }
}
?>
