<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $security_answer = $_POST['security_answer'];

    // Sanitize input to prevent SQL injection
    $email = $conn->real_escape_string($email);
    $security_answer = $conn->real_escape_string($security_answer);

    // Check if the email and security answer match
    $sql = "SELECT * FROM users WHERE email = '$email' AND security_answer = '$security_answer'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Email and security answer match, generate a temporary password
        $temp_password = bin2hex(random_bytes(4)); // Generates a random 8-character password

        // Update the user's password in the database (storing as plain text)
        $update_sql = "UPDATE users SET password = '$temp_password' WHERE email = '$email'";
        if ($conn->query($update_sql) === TRUE) {
            // Redirect to retrieve.php with email and temp_password
            header("Location: retrieve.php?email=$email&temp_password=$temp_password");
            exit;
        } else {
            echo "Error updating password: " . $conn->error;
        }
    } else {
        echo "Email or security answer is incorrect. Please try again.";
    }

    $conn->close();
}
?>
