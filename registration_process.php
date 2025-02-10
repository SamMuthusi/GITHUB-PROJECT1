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
$Account_Type = $_POST['Account_Type'];
$Name = $_POST['Name'];
$Email = $_POST['Email'];
$Password = $_POST['Password'];
$Gender = $_POST['Gender'];

// Prepare and execute the SQL query to insert data
$sql = "INSERT INTO users (Account_Type, Name, Email, Password, Gender) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $Account_Type, $Name, $Email, $Password, $Gender);
if ($stmt->execute()) {
    echo "Registration successful!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the connection
$stmt->close();
$conn->close();
?>
