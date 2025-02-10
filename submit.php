<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "e-waste_db";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$name = $_POST['name'];
$address = $_POST['address'];
$postal_code = $_POST['postal_code'];
$city = $_POST['city'];

// Prepare and execute the SQL query to insert data
$sql = "INSERT INTO e_pickups (name, address, postal_code, city) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $name, $address, $postal_code, $city);

if ($stmt->execute()) {
    echo "Data inserted successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the connection
$stmt->close();
$conn->close();
?>
