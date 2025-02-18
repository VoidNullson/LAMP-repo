<?php
$host = 'localhost';
$user = 'voiduser';
$password = 'feb182025';
$database = 'myvoidbase';

// Create connection
$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>
