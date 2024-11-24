<?php
include 'db_connect.php'; // Include the database connection

// Handle deletion request
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $delete_sql = "DELETE FROM users WHERE id = $delete_id";

    if ($conn->query($delete_sql) === TRUE) {
        echo "<script>alert('User deleted successfully!');</script>";
        // Redirect back to the manage-users.php page
        header("Location: manage-users.php");
        exit(); // Ensure no further code is executed
    } else {
        echo "Error deleting user: " . $conn->error;
    }
}
?>
