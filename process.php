<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "port";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect form data
$name = $_POST['name'];
$email = $_POST['email'];
$service = $_POST['service'];

// Insert data into the database
$sql = "INSERT INTO freelance (name, email, service) VALUES ('$name', '$email', '$service')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully. <a href='index.html'>Go to homepage</a>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
