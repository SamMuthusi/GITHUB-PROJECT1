<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $accountType = $_POST["Account_Type"];
    $name = $_POST["Name"];
    $email = $_POST["Email"];
    $password = $_POST["Password"];
    $gender = $_POST["Gender"];

    // Hash the password (for security)
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Establish a connection to the database (replace with your database credentials)
    $conn = mysqli_connect("localhost", "root", "", "your_database_name");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO users (account_type, name, email, password, gender) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $accountType, $name, $email, $hashed_password, $gender);

    if ($stmt->execute()) {
        echo 'Registration successful. <a href="HOME.html">Login here</a>';
    } else {
        echo 'Error during registration: ' . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
