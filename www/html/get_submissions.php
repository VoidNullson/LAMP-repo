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

// Fetch submissions from the database
$sql = "SELECT name,  message, submission_date FROM submissions ORDER BY submission_date DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>Name</th><th>Message</th><th>Date</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
        echo "<td>" . htmlspecialchars($row['message']) . "</td>";
        echo "<td>" . htmlspecialchars($row['submission_date']) . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No submissions found.";
}

// Close connection
$conn->close();
?>
