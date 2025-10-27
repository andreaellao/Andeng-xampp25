<?php
$servername = "localhost";
$username = "root";  // default username in XAMPP
$password = "";      // leave blank if no password
$database = "simple";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
