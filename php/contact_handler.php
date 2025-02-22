<?php
// contact_handler.php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Start output buffering to catch any unwanted output
ob_start();

session_start();
require_once 'includes/db_connect.php';

// Ensure we're sending JSON response
header('Content-Type: application/json');

// Check if it's a POST request
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
    exit;
}

// Check database connection
if (!isset($pdo)) {
    error_log('Database connection failed');
    echo json_encode(['status' => 'error', 'message' => 'Database connection failed']);
    exit;
}

// Validate and sanitize inputs
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
$business = filter_input(INPUT_POST, 'business', FILTER_SANITIZE_STRING);
$errors = [];

// Name validation
if (empty($name)) {
    $errors[] = 'Name is required';
}

// Email validation
if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Valid email is required';
}

// Phone validation
if (empty($phone)) {
    $errors[] = 'Phone number is required';
} else {
    $cleanPhone = preg_replace('/[^0-9]/', '', $phone);
    if (strlen($cleanPhone) < 10) {
        $errors[] = 'Phone number must have at least 10 digits';
    }
    if (strlen($cleanPhone) > 15) {
        $errors[] = 'Phone number is too long';
    }
}

// If there are validation errors, return them
if (!empty($errors)) {
    echo json_encode(['status' => 'error', 'message' => implode(', ', $errors)]);
    exit;
}

try {
    // Insert into database
    $stmt = $pdo->prepare("INSERT INTO contact_submissions (name, email, phone, business_name) VALUES (?, ?, ?, ?)");
    $stmt->execute([$name, $email, $phone, $business]);
    
    // Email configuration
    $to = "Cjankawan@gmail.com";
    $subject = "New Contact Form Submission";
    $message = "New contact form submission:\n\n"
             . "Name: $name\n"
             . "Email: $email\n"
             . "Phone: $phone\n"
             . "Business: $business\n";
    
    // Proper email headers
    $headers = "MIME-Version: 1.0\r\n"
             . "Content-type: text/plain; charset=UTF-8\r\n"
             . "From: $email\r\n"
             . "Reply-To: $email\r\n"
             . "X-Mailer: PHP/" . phpversion();

    // Send email
    if (!mail($to, $subject, $message, $headers)) {
        error_log("Failed to send email for contact submission from: " . $email);
    }

    // Clear any buffered output
    ob_clean();

    // Send success response
    echo json_encode([
        'status' => 'success',
        'message' => 'Thank you for your message. We will contact you soon!'
    ]);

} catch (PDOException $e) {
    error_log("Database error in contact submission: " . $e->getMessage());
    
    // Clear any buffered output
    ob_clean();
    
    echo json_encode([
        'status' => 'error',
        'message' => 'An error occurred while saving your message. Please try again later.'
    ]);
}

// End output buffering
ob_end_flush();