<?php
try {
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "php";
    
    $pdo = new PDO(
        "mysql:host=$host;dbname=$database;charset=utf8mb4",
        $username,
        $password,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    );
    
} catch (PDOException $e) {
    error_log("Database connection failed: " . $e->getMessage());
    die("Unable to connect to database");
}
?>