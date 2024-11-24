<?php
// Include the database connection
include('db_connect.php');

// Initialize message variable
$message = "";

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if the password and confirm password match
    if ($password != $confirm_password) {
        $message = "Passwords do not match!";
    } else {
        // Check if the email already exists in the database
        $sql_check_email = "SELECT * FROM admin WHERE email = ?";
        $stmt = $conn->prepare($sql_check_email);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $message = "This email is already registered.";
        } else {
            // Insert the new admin account into the database
            $sql_insert = "INSERT INTO admin (username, email, password) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql_insert);
            $stmt->bind_param("sss", $username, $email, $password);

            if ($stmt->execute()) {
                $message = "Admin account created successfully!";
            } else {
                $message = "Error: " . $stmt->error;
            }
        }
        // Close the database connection
        $stmt->close();
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Horizon Jet Admin Signup</title>
    <style>
        /* Basic styling for modal */
        .popup-modal {
            display: none; /* Initially hidden */
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* Transparent background */
            z-index: 9999;
            justify-content: center;
            align-items: center;
        }

        .popup-content {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            max-width: 400px;
            width: 100%;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

     
        

        .popup-content.error {
            border-left: 5px solid red;
        }

        .close-btn {
            background-color: red;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        /* Admin button styling */
        .admin-btn {
            position: fixed; /* Ensure the button stays in place */
            top: 20px;
            right: 20px;
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
            z-index: 1000; /* Ensure the button stays on top */
        }

        .admin-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <!-- Admin Button -->
    <button class="admin-btn" onclick="window.location.href='admin-dashboard.html'">Admin Dashboard</button>

    <div class="container">
        <!-- Background Video -->
        <video autoplay loop muted playsinline class="background-clip">
            <source src="images.mp4" type="video/mp4">
        </video>
    </div>

    <!-- Logo and Welcome Message -->
    <div class="logo-container">
        <img src="Skyport.PNG" alt="Skyport Logo" class="logo">
        <h1>Horizon Jet</h1>
    </div>

    <!-- Welcome Message -->
    <div class="welcome-message">
        <h2>Welcome to Horizon Airlines - Admin Signup</h2>
    </div>

    <!-- Signup Box -->
    <div class="login-box">
        <div class="login-header">
            <header>Create Admin Account</header>
        </div>
        
        <!-- Signup Form -->
        <form action="admin-signup.php" method="POST">
            <!-- Username Input -->
            <div class="input-box">
                <input type="text" name="username" class="input-field" placeholder="Username" autocomplete="off" required>
            </div>

            <!-- Email Input -->
            <div class="input-box">
                <input type="email" name="email" class="input-field" placeholder="Admin Email" autocomplete="off" required>
            </div>

            <!-- Password Input -->
            <div class="input-box">
                <input type="password" name="password" class="input-field" placeholder="Password" autocomplete="off" required>
            </div>

            <!-- Confirm Password Input -->
            <div class="input-box">
                <input type="password" name="confirm_password" class="input-field" placeholder="Confirm Password" autocomplete="off" required>
            </div>

            <!-- Signup Button -->
            <button type="submit" class="submit-btn">Create Admin Account</button>
        </form>

        <!-- Sign-In Link -->
        <div class="sign-up-link">
            <p>Already an Admin? <a href="admin-login.html">Login Now!</a></p>
        </div>
    </div>

    <!-- Popup  Errors if have? -->
    <?php if ($message): ?>
    <div class="popup-modal" id="popupModal">
        <div class="popup-content <?php echo strpos($message, 'successfully') !== false ? 'success' : 'error'; ?>">
            <p><?php echo $message; ?></p>
            <button class="close-btn" onclick="closePopup()">Close</button>
        </div>
    </div>
    <?php endif; ?>

    <script>
        // Show the popup modal
        window.onload = function() {
            var message = "<?php echo $message; ?>";
            if (message) {
                document.getElementById('popupModal').style.display = 'flex';
            }
        };

        // Close the popup modal
        function closePopup() {
            document.getElementById('popupModal').style.display = 'none';
        }
    </script>
</body>
</html>
