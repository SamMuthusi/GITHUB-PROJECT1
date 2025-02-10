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
$Email = $_POST['Email'];
$Password = $_POST['Password'];
// Prepare and execute the SQL query to insert data
$sql = "INSERT INTO logins( Email, Password) VALUES ( ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss",  $Email, $Password);
if ($stmt->execute())
 {
    header('Location: DASHBOARD.html');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
// Close the connection
$stmt->close();
$conn->close();
?>
