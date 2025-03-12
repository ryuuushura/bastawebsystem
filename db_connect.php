<?php
$servername = "localhost"; // Change if your database is hosted elsewhere
$username = "root"; // Default for local servers like XAMPP/MAMP
$password = ""; // Default is empty for local servers
$database = "guitar_store"; // Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
