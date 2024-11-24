<?php
include 'db_connect.php';  // Include the database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = $_POST['email'];
    $password = $_POST['password'];  // Password entered by the user

    // Sanitize input to prevent SQL injection
    $email = $conn->real_escape_string($email);
    $password = $conn->real_escape_string($password);

    // Check if the email and password match in the 'admin' table
    $sql = "SELECT * FROM admin WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Email and password match, login successful
        echo "Login successful!";
        // Here you can start a session or redirect to the admin dashboard.
    } else {
        echo "Invalid email or password. Please try again.";
    }

    $conn->close();
}
?>
