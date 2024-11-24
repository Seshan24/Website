<?php
// Connect to the database
$servername = "localhost"; // Change as needed
$username = "root";        // Your MySQL username
$password = "";            // Your MySQL password
$dbname = "horizon_jet";   // Your database name

// Create the connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if connection is successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the form data
$flightName = $_POST['flightName'];
$departure = $_POST['departure'];
$arrival = $_POST['arrival'];
$departureDate = $_POST['departureDate'];
$returnDate = $_POST['returnDate'];
$passengers = $_POST['passengers'];
$price = $_POST['price'];       // New price field
$class = $_POST['class'];       // New class field
$status = $_POST['status'];

// Insert the data into the database
$sql = "INSERT INTO flights (flight_name, departure_city, arrival_city, departure_date, return_date, passengers, price, class, status) 
        VALUES ('$flightName', '$departure', '$arrival', '$departureDate', '$returnDate', '$passengers', '$price', '$class', '$status')";

// Check if the query was successful
if ($conn->query($sql) === TRUE) {
    // Return success message
    echo "success";
} else {
    // Return error message
    echo "Error: " . $conn->error;
}

// Close the database connection
$conn->close();
?>
