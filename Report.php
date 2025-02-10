<?php
$servername = "localhost"; // Change to your MySQL server hostname
$username = "root"; // Change to your MySQL username
$password = ""; // Change to your MySQL password
$dbname = "e-waste_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Form submission handling
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    for ($i = 1; $i <= 9; $i++) {
        // Check if the array key exists before accessing it
        $categoryKey = "category" . $i;
        $quantityKey = "quantity" . $i;
        $markKey = "mark" . $i;

        if (isset($_POST[$categoryKey], $_POST[$quantityKey], $_POST[$markKey])) {
            $category = $_POST[$categoryKey];
            $quantity = $_POST[$quantityKey];
            $mark = isset($_POST[$markKey]) ? 1 : 0;

            // Insert data into the database
            $sql = "INSERT INTO report_data (category, mark, quantity) VALUES ('$category', $mark, $quantity)";

            if ($conn->query($sql) !== TRUE) {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }

    // Calculate percentages and send them to the JavaScript
    $result = $conn->query("SELECT category, SUM(quantity) AS total FROM report_data GROUP BY category");
    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[$row['category']] = $row['total'];
    }

    echo '<script>';
    echo 'var eWasteData = ' . json_encode($data) . ';';
    echo '</script>';
}

$conn->close();
?>
