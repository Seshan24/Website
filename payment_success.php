<?php
// Start session
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_email'])) {
    header("Location: login.html");
    exit;
}

$user_name = $_SESSION['user_name'];

// Get the price from the URL if available
if (isset($_GET['price'])) {
    $price = $_GET['price'];
} else {
    $price = 0; // Default price in case the parameter is missing
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Success | Horizon Airways</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f9fafb;
            margin: 0;
            padding: 0;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #1c2841;
            padding: 20px 30px;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
        }

        .navbar .logo-container img {
            width: 90px;
            height: auto;
        }

        .navbar .menu {
            display: flex;
            justify-content: center;
            flex-grow: 1;
            list-style-type: none;
        }

        .navbar .menu li {
            margin: 0 20px;
        }

        .navbar .menu a {
            color: white;
            text-decoration: none;
            font-size: 16px;
            font-weight: bold;
        }

        .navbar .logout-btn {
            color: white;
            text-decoration: none;
            font-size: 16px;
            font-weight: bold;
            padding: 5px 10px;
            border: 1px solid white;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .navbar .logout-btn:hover {
            background-color: darkgrey;
        }

        .container {
            margin-top: 120px; /* Adjust for navbar height */
            text-align: center;
        }

        .background-clip {
            position: relative;
            width: 100%;
            height: 500px;
            object-fit: cover;
            z-index: -1;
        }

        .success-message {
            background: #28a745;
            color: white;
            padding: 30px;
            text-align: center;
            margin-top: 50px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .quote {
            font-style: italic;
            color: #f1f1f1;
            margin-top: 20px;
        }

        .go-home-btn {
            background-color: #1c2841;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: bold;
            margin-top: 30px;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .go-home-btn:hover {
            background-color: #34495e;
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <div class="navbar">
        <div class="logo-container">
            <a href="home.php"><img src="Skyport.PNG" alt="Skyport Logo" class="logo"></a>
        </div>
        <ul class="menu">
            <li><a href="booking.php">Booking</a></li>
            <li><a href="contact.html">Contact</a></li>
            <li><a href="about-us.html">About Us</a></li>
            <li><a href="gallery.html">Gallery</a></li>
        </ul>
        <a href="logout.php" class="logout-btn">Logout</a>
    </div>

    

    <!-- Booking Success Message -->
    <div class="success-message">
        <h2 class="text-3xl font-bold mb-4">Booking Successful!</h2>
        <p class="text-xl">Thank you for your booking, <?php echo $user_name; ?>. We are thrilled to have you onboard, and we look forward to seeing you on your journey!</p>
        <div class="quote mt-6">
            <p>"The journey of a thousand miles begins with a single step. We are excited to be part of your adventure!"</p>
        </div>
    </div>

    <div class="text-center">
        <a href="home.php" class="go-home-btn">Go Back to Home</a>
    </div>

    <script>
        // Hide the loading screen after 3 seconds
        window.addEventListener('load', function() {
            setTimeout(function() {
                document.getElementById('loading-screen').style.display = 'none';
            }, 3000); // 3-second delay
        });
    </script>
</body>
</html>
