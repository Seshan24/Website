<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horizon Airlines</title>
    <script src="https://cdn.tailwindcss.com"></script>
   
    
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f5f5f5;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color:  #1c2841;
            padding: 19px;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
        }

        .logo-container img {
            width: 90px;
            height: auto;
        }

        .menu-container {
            flex-grow: 1;
            display: flex;
            justify-content: center;
        }

        .menu {
            display: flex;
            list-style-type: none;
        }

        .menu li {
            margin: 0 20px;
        }

        .menu a {
            color: white;
            text-decoration: none;
            font-size: 16px;
            font-weight: bold;
        }

        .logout-btn {
            color: white;
            text-decoration: none;
            font-size: 16px;
            font-weight: bold;
            padding: 5px 10px;
            border: 1px solid white;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .logout-btn:hover {
            background-color: darkgrey;
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <div class="navbar">
        <div class="logo-container">
            <a href="home.php"><img src="Skyport.PNG" alt="Skyport Logo" class="logo"></a>
        </div>
        <div class="menu-container">
            <ul class="menu">
                <li><a href="booking.php">Booking</a></li>
                <li><a href="contact.html">Contact</a></li>
                <li><a href="about-us.html">About Us</a></li>
                <li><a href="Gallery.html">Gallery</a></li>
            </ul>
        </div>
        <a href="logout.php" class="logout-btn">Logout</a>
    </div>

    <!-- bg pic middle -->
    <section class="bg-cover bg-center h-35" style="background-image: url('cmb1.jpg');">
        <div class="container mx-auto h-full flex items-center justify-center">
            <div class="text-center text-white">
                <h1 class="text-4xl font-bold mb-4">Welcome to Horizon Airways</h1>
                <p class="text-lg mb-8">Fly with us and experience the best in class service</p>
            </div>
        </div>
    </section>

    <!-- Booking Form Section -->
<section class="container mx-auto px-5 py-20 bg-white shadow-md rounded-lg -mt-20 relative z-10">
    <form action="search_flights.php" method="POST" class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div>
            <label class="block text-gray-700" for="from">From</label>
            <input class="w-full border border-gray-300 rounded py-2 px-3 mt-1" id="from" name="from" placeholder="Enter departure city" type="text" required>
        </div>
        <div>
            <label class="block text-gray-700" for="to">To</label>
            <input class="w-full border border-gray-300 rounded py-2 px-3 mt-1" id="to" name="to" placeholder="Enter destination city" type="text" required>
        </div>
        <div>
            <label class="block text-gray-700" for="departure">Departure</label>
            <input class="w-full border border-gray-300 rounded py-2 px-3 mt-1" id="departure" name="departure" type="date" required>
        </div>
        <div>
            <label class="block text-gray-700" for="return">Return</label>
            <input class="w-full border border-gray-300 rounded py-2 px-3 mt-1" id="return" name="return" type="date">
        </div>
        <div>
            <label class="block text-gray-700" for="passengers">Passengers</label>
            <input class="w-full border border-gray-300 rounded py-2 px-3 mt-1" id="passengers" name="passengers" placeholder="1" type="number" required>
        </div>
        <div class="flex items-end">
            <button class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded" type="submit">Search Flights</button>
        </div>
    </form>

    <!-- Search Flights" button w-->
    <div class="flex items-end mt-4">
        <a href="all_flights.php" class="w-full bg-blue-600 hover:bg-grey-700 text-white py-2 px-4 rounded text-center">
            Show All Flights Available
        </a>
    </div>

    </section>

    <!-- Featured Destinations -->
    <section class="container mx-auto px-4 py-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Featured Destinations</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <img alt="A beautiful view of Paris with the Eiffel Tower in the background" class="w-full h-48 object-cover" height="300" src="paris.jpg" width="400"/>
                <div class="p-4">
                    <h3 class="text-xl font-bold text-gray-800">Paris</h3>
                    <p class="text-gray-600">Experience the city of love and lights.</p>
                </div>
            </div>
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <img alt="A stunning view of New York City skyline with skyscrapers" class="w-full h-48 object-cover" height="300" src="cmb.jpg" width="400"/>
                <div class="p-4">
                    <h3 class="text-xl font-bold text-gray-800">Colombo</h3>
                    <p class="text-gray-600">Discover the city that never sleeps.</p>
                </div>
            </div>
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <img alt="A scenic view of the beaches in Maldives with clear blue water" class="w-full h-48 object-cover" height="300" src="maldives.jpg" width="400"/>
                <div class="p-4">
                    <h3 class="text-xl font-bold text-gray-800">Maldives</h3>
                    <p class="text-gray-600">Relax in the tropical paradise.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- News Section -->
    <section class="container mx-auto px-4 py-8 bg-gray-100">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Latest News</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <img alt="An image showing the new aircraft fleet of Etihad Airways" class="w-full h-48 object-cover" height="300" src="news1.jpg" width="400"/>
                <div class="p-4">
                    <h3 class="text-xl font-bold text-gray-800">Bleed-air switches on the 737 (G-TAWD) had wrongly been left in the ‘off’ </h3>
                    <p class="text-gray-600">   Safety Bleed-air switch lapse preceded TUI 737 cabin-altitude incident </p>
                </div>
            </div>
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <img alt="An image showing the new in-flight dining experience" class="w-full h-48 object-cover" height="300" src="https://storage.googleapis.com/a1aa/image/OZYoDQ6rdL7JBhM7H3uNygR2k4rn5ETaSS3GHlgvZUgqde4JA.jpg" width="400"/>
                <div class="p-4">
                    <h3 class="text-xl font-bold text-gray-800">In-Flight Dining</h3>
                    <p class="text-gray-600">Enjoy our new in-flight dining experience.</p>
                </div>
            </div>
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <img alt="An image showing the new travel destinations added by Etihad Airways" class="w-full h-48 object-cover" height="300" src="island.jpg" width="400"/>
                <div class="p-4">
                    <h3 class="text-xl font-bold text-gray-800">
                    <h3 class="text-xl font-bold text-gray-800">New Destinations</h3>
                    <p class="text-gray-600">Explore our new travel destinations.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer at last page-->
    <footer class="bg-white shadow mt-10">
        <div class="container mx-auto px-4 py-6 flex justify-between items-center">
            <p class="text-gray-600">&copy; 2024 Horizon Airlines. All rights reserved.</p>
            <nav class="space-x-4">
                <a href="#" class="text-gray-600 hover:text-gray-800">Privacy Policy</a>
                <a href="#" class="text-gray-600 hover:text-gray-800">Terms of Service</a>
            </nav>
        </div>
    </footer>
</body>
</html>
