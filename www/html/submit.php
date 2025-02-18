<?php
// Database credentials
$host = 'localhost';
$user = 'voiduser'; // Replace with your database username
$password = 'feb182025'; // Replace with your database password
$database = 'myvoidbase'; // Replace with your database name

// Create connection
$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['name'];
$message = $_POST['message'];

// Prepare and bind SQL statement
$stmt = $conn->prepare("INSERT INTO submissions (name, message) VALUES (?, ?)");
$stmt->bind_param("ss", $name, $message);

// Execute the statement
if ($stmt->execute()) {
    echo "New record created successfully!";
} else {
    echo "Error: " . $stmt->error;
}

// Close connections
$stmt->close();
$conn->close();
?>
