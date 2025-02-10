<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["Email"];
    $password = $_POST["Password"];

    // Hash the password (for security)
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Establish a connection to the database (replace with your database credentials)
    $conn = mysqli_connect("localhost", "root", "", "e-waste_db");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        // Verify the password
        if (password_verify($password, $row["Password"])) {
            // Login successful, set session variable
            $_SESSION['loggedin'] = true;
            $_SESSION['user_id'] = $row['id'];
            header('Location: DASHBOARD.html');
            exit;
        } 
    }
    $stmt->close();
    $conn->close();
}
?>
