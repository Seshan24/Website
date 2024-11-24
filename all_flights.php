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

// SQL query to get all available flights
$sql = "SELECT * FROM flights WHERE status = 'active'"; // Only active flights

// Execute query
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Available Flights</title>
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
        <h1 class="text-3xl font-bold text-gray-800 mb-6">All Available Flights</h1>

        <?php if ($result->num_rows > 0): ?>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <?php while ($row = $result->fetch_assoc()): ?>
                    <?php 
                    // Generate random departure time
                    $random_hour = rand(1, 23);
                    $random_minute = rand(0, 59);
                    $departure_time = sprintf("%02d:%02d", $random_hour, $random_minute);
                    ?>

                    <div class="bg-white shadow-md rounded p-4">
                        <h3 class="text-xl font-bold text-gray-800"><?php echo $row['flight_name']; ?></h3>
                        <p class="text-gray-600">From: <?php echo $row['departure_city']; ?></p>
                        <p class="text-gray-600">To: <?php echo $row['arrival_city']; ?></p>
                        <p class="text-gray-600">Departure Date: <?php echo $row['departure_date']; ?> at <?php echo $departure_time; ?></p>
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
                <p class="font-semibold">Sorry, no flights are currently available. Please check again later.</p>
            </div>
        <?php endif; ?>

        <?php
        // Close connection
        $conn->close();
        ?>
    </section>

    <style>
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
