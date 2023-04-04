<?php
// Database credentials
$dbHost = 'db';
$dbUsername = 'thuy';
$dbPassword = 'thuy@123';
$dbName = 'assignment2_autoshop';

// Create a database connection
$conn = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);

// Check for connection errors
if (mysqli_connect_errno()) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}

?>