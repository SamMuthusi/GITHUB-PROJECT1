<?php
// Database connection
$servername = "localhost"; // Change to your MySQL server hostname
$username = "root"; // Change to your MySQL username
$password = ""; // Change to your MySQL password
$dbname = "e-waste_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Form submission handling
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $comment = $_POST["comment"];
    $rating = $_POST["rating"];

    // Insert data into the database
    $sql = "INSERT INTO feedback (comment, rating) VALUES ('$comment', $rating)";

    if ($conn->query($sql) === TRUE) {
        echo "Feedback submitted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
