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
    // Prepare the SQL statement outside the loop
    $sql = "INSERT INTO products (category, mark, quantity) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sii", $category, $mark, $quantity); // 'sii' indicates string, integer, integer

    // Loop through each row of the form
    for ($i = 1; $i <= 9; $i++) {
        $category = $_POST["category" . $i] ?? "";
        $mark = isset($_POST["mark" . $i]) ? 1 : 0;
        $quantity = $_POST["quantity" . $i] ?? 0;

        // Execute the prepared statement
        if (!$stmt->execute()) {
            echo "Error: " . $stmt->error;
        }
    }

    echo "E-Waste data submitted successfully!";
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
