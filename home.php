<?php
session_start();

if (!isset($_SESSION['user_email'])) {
    header("Location: login.html");
    exit;
}

$user_name = $_SESSION['user_name'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Home - Horizon Jet</title>
    <style>
        /* Navigation Bar Styles */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #1c2841;
            padding: 27px;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
        }
        
        .navbar .logo-container img {
            width: 90px; /* Adjust size as needed */
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
            margin-top: 70px; /* Adjust for navbar height */
        }

        .background-clip {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
        }

        .home-message {
            position: relative;
            text-align: center;
            color: #fff;
        }

        .loading-screen {
            display: flex;
            justify-content: center;
            align-items: center;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(10px);
            z-index: 9999;
        }

        .lds-roller {
            display: inline-block;
            position: relative;
            width: 80px;
            height: 80px;
        }
        .lds-roller div {
            animation: lds-roller 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
            transform-origin: 40px 40px;
        }
        .lds-roller div:after {
            content: " ";
            display: block;
            position: absolute;
            width: 7.2px;
            height: 7.2px;
            border-radius: 50%;
            background: grey;
            margin: -3.6px 0 0 -3.6px;
        }
        .lds-roller div:nth-child(1) {
            animation-delay: -0.036s;
        }
        .lds-roller div:nth-child(1):after {
            top: 62.62742px;
            left: 62.62742px;
        }
        .lds-roller div:nth-child(2) {
            animation-delay: -0.072s;
        }
        .lds-roller div:nth-child(2):after {
            top: 67.71281px;
            left: 56px;
        }
        .lds-roller div:nth-child(3) {
            animation-delay: -0.108s;
        }
        .lds-roller div:nth-child(3):after {
            top: 70.90963px;
            left: 48.28221px;
        }
        .lds-roller div:nth-child(4) {
            animation-delay: -0.144s;
        }
        .lds-roller div:nth-child(4):after {
            top: 72px;
            left: 40px;
        }
        .lds-roller div:nth-child(5) {
            animation-delay: -0.18s;
        }
        .lds-roller div:nth-child(5):after {
            top: 70.90963px;
            left: 31.71779px;
        }
        .lds-roller div:nth-child(6) {
            animation-delay: -0.216s;
        }
        .lds-roller div:nth-child(6):after {
            top: 67.71281px;
            left: 24px;
        }
        .lds-roller div:nth-child(7) {
            animation-delay: -0.252s;
        }
        .lds-roller div:nth-child(7):after {
            top: 62.62742px;
            left: 17.37258px;
        }
        .lds-roller div:nth-child(8) {
            animation-delay: -0.288s;
        }
        .lds-roller div:nth-child(8):after {
            top: 56px;
            left: 12.28719px;
        }
        @keyframes lds-roller {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }
    </style>
</head>
<body>
    <!-- Loading Screen -->
    <div id="loading-screen" class="loading-screen">
        <div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
    </div>

    <!-- Navigation Bar navbar -->
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

    <div class="container">
        <!-- Background Video its already mmuted-->
        <video autoplay loop muted playsinline class="background-clip">
            <source src="images2.mp4" type="video/mp4">
        </video>
    </div>

    <div class="home-message">
        <h2>Welcome, <?php echo $user_name; ?>!</h2>
        <p>You're successfully logged in to Horizon Airlines.</p>
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
