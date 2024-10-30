<?php
// error_db.php

// Set the content type to HTML
header("Content-Type: text/html; charset=UTF-8");

// Display a user-friendly message
echo "<h1>Database Error</h1>";
echo "<p>Sorry, we're experiencing some technical difficulties. Please try again later.</p>";

// Log the error details for debugging (you can modify the log file path as needed)
error_log("Database Error: " . $_SERVER['REQUEST_URI'] . " - " . print_r(error_get_last(), true), 3, 'D:\xampp\htdocs\ruet-hamid-hall\application\logs\error.log');

// Optionally, you can include a back link or other helpful information
echo '<p><a href="/">Return to Home</a></p>';
?>
