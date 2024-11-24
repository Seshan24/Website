<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $password = $_POST['password']; // No encryption for debugging
    $security_answer = $_POST['security_answer'];

    // Insert the user data into the database
    $sql = "INSERT INTO users (full_name, email, password, security_answer) VALUES ('$full_name', '$email', '$password', '$security_answer')";

    if ($conn->query($sql) === TRUE) {
        echo "Sign-up successful! You can now <a href='login.html'>login</a>.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the connection
    $conn->close();
}
?>
