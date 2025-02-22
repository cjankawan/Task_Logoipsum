<?php
session_start();
// Destroy the session
session_unset();
session_destroy();

// Start a new session to store the message
session_start();
$_SESSION['success'] = "You have been logged out successfully.";

// Redirect to index.php
header("Location: index.php");
exit();
?>