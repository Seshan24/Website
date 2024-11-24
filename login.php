<?php
session_start();
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve email and password from the form
    $email = $_POST['email'];
    $password = $_POST['password']; // Plain text password

    // Fetch the user from the database
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Compare the plain text password directly
        if ($password === $row['password']) {
            // Login successful
            $_SESSION['user_email'] = $email;
            $_SESSION['user_name'] = $row['full_name'];
            header("Location: home.php");
            exit;
            
        } else {
            // Incorrect password
            echo "Invalid password.";
        }
    } else {
        // No user found with the given email
        echo "Invalid email or user does not exist.";
    }

    $conn->close();
}
?>
