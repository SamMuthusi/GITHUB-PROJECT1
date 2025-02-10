<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "e-waste_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle logout form submission
    if (isset($_POST["email"]) && isset($_POST["password"])) {
        $email = $_POST["email"];
        $password = $_POST["password"];

        // Add any necessary validation and sanitization for email and password here

        // Perform a query to check if the user exists in the database
        $sql = "SELECT * FROM logins WHERE email='$email' AND password='$password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // User exists, perform logout actions here

            // For example, you can redirect the user to another page after logout
            header("Location: logout_success.php");
            exit();
        } else {
            // User not found, handle accordingly (e.g., display an error message)
            echo "Invalid email or password";
        }
    }
}

// Close the database connection
$conn->close();

?>
