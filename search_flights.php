<?php
// Database connection
$servername = "localhost";
$username = "root"; // Replace with your DB username
$password = "";     // Replace with your DB password
$dbname = "horizon_jet"; // Your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve user inputs
$departure_city = $_POST['from'];
$arrival_city = $_POST['to'];
$departure_date = $_POST['departure'];
$return_date = $_POST['return'];
$passengers = $_POST['passengers'];

// SQL query to search flights in the database
$sql = "SELECT * FROM flights 
        WHERE departure_city = ? 
        AND arrival_city = ? 
        AND departure_date = ? 
        AND status = 'active'";  // Ensure the flight is active

// Prepare and execute query
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $departure_city, $arrival_city, $departure_date);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flight Search Results</title>
    <script src="https://cdn.tailwindcss.com"></script>
   
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <div class="navbar bg-blue-900 text-white p-4 fixed top-0 w-full z-10">
        <div class="container mx-auto flex justify-between items-center">
            <div class="flex items-center">
                <!-- Logo Image -->
                <a href="home.php">
                    <img src="Skyport.PNG" alt="Horizon Airways Logo" class="h-16 mr-4">
                </a>
                <a href="home.php" class="text-xl font-bold">Horizon Airways</a>
            </div>
            <nav class="space-x-4">
                <!-- redirecting pages -->
                <a href="home.php" class="hover:text-gray-300">Home</a>
                <a href="booking.php" class="hover:text-gray-300">Booking</a>
                <a href="contact.html" class="hover:text-gray-300">Contact</a>
                <a href="about-us.html" class="hover:text-gray-300">About Us</a>
                <a href="Gallery.html" class="hover:text-gray-300">Gallery</a>
            </nav>
        </div>
    </div>

    <!-- Flight Search Results -->
    <section class="container mx-auto px-4 py-24">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Search Results</h1>

        <?php if ($result->num_rows > 0): ?>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="bg-white shadow-md rounded p-4">
                        <h3 class="text-xl font-bold text-gray-800"><?php echo $row['flight_name']; ?></h3>
                        <p class="text-gray-600">From: <?php echo $row['departure_city']; ?></p>
                        <p class="text-gray-600">To: <?php echo $row['arrival_city']; ?></p>
                        <p class="text-gray-600">Departure Date: <?php echo $row['departure_date']; ?></p>
                        <p class="text-gray-600">Return Date: <?php echo $row['return_date'] ?: 'N/A'; ?></p>
                        <p class="text-gray-600">Available Passengers: <?php echo $row['passengers']; ?></p>
                        <p class="text-gray-600">Class: <?php echo ucfirst($row['class']); ?></p>
                        <p class="text-gray-600">Price: $<?php echo number_format($row['price'], 2); ?></p>
                        <a href="payment.php?flight_id=<?php echo $row['id']; ?>&price=<?php echo $row['price']; ?>" 
                           class="inline-block mt-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                            Book Now
                        </a>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php else: ?>
            <!-- No flights found message -->
            <div class="bg-red-100 border border-red-400 text-red-700 p-4 rounded-md">
                <p class="font-semibold">Sorry, no flights were found matching your criteria. Please try again with different details.</p>
            </div>
        <?php endif; ?>

        <?php
        // Close connection
        $stmt->close();
        $conn->close();
        ?>
    </section>

    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f5f5f5;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        footer {
            margin-top: 100px;
            background-color: #fff;
            box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px 0;
        }

        footer .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
        }

        footer nav a {
            color: #4b5563;
            text-decoration: none;
            padding: 0 10px;
            transition: color 0.3s;
        }

        footer nav a:hover {
            color: #1e40af;
        }
    </style>

    <!-- Footer -->
    <footer class="bg-white shadow mt-10">
        <div class="container mx-auto px-4 py-6 flex justify-between items-bottom">
            <p class="text-gray-600">&copy; 2024 Horizon Airlines. All rights reserved.</p>
            <nav class="space-x-4">
                <a href="#" class="text-gray-600 hover:text-gray-800">Privacy Policy</a>
                <a href="#" class="text-gray-600 hover:text-gray-800">Terms of Service</a>
            </nav>
        </div>
    </footer>
</body>
</html>
