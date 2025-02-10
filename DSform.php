<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $accountType = $_POST["account_type"];
    $name = $_POST["name"];
    $idNumber = $_POST["id_number"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $postalCode = $_POST["postal_code"];
    $region = $_POST["region"];
    $city = $_POST["city"];
    $county = $_POST["county"];
    $donate_sell = $_POST["donate_sell"]; // If multiple options can be selected
    $amount = $_POST["amount"];

    // Establish a connection to the database (replace with your database credentials)
    $conn = mysqli_connect("localhost", "root", "", "e-waste_db");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO sell_donations (Account_Type, Name, ID_No, Phone_No, Email, Address, Postal_code, Region, City, County, donate_sell, Amount) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssssssi", $account_type, $name, $id_number, $phone, $email, $address, $postal_code, $region, $city, $county, $donate_sell, $amount);
    if ($stmt->execute()) {
        echo 'Form submitted successfully.';
    } else {
        echo 'Error during form submission: ' . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
