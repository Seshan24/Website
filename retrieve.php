<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Retrieve Password - Horizon Jet</title>
</head>
<body>
    <div class="container">
        <!-- Background Video -->
        <video autoplay loop muted playsinline class="background-clip">
            <source src="images.mp4" type="video/mp4">
        </video>
    </div>

    <!-- Retrieve Password Box -->
    <div class="login-box">
        <div class="welcome-message">
          
            <div class="centered-logo-container">
               
            </div>
        </div>

        <div class="login-header">
            <header>Retrieve Password</header>
        </div>

        <!-- Display retrieved email and password -->
        <div class="input-box">
            <input type="text" class="input-field" value="<?php echo htmlspecialchars($_GET['email']); ?>" readonly>
        </div>
        <div class="input-box">
            <input type="text" id="tempPassword" class="input-field" value="<?php echo htmlspecialchars($_GET['temp_password']); ?>" readonly>
        </div>
        <button class="submit-btn" onclick="copyPassword()">Copy Password</button>
        <button class="submit-btn" onclick="redirectToLogin()">Back to Login</button>

        <!-- Back to Login Link -->
        <div class="sign-up-link">
          
        </div>
    </div>

    <script>
        function copyPassword() {
            var copyText = document.getElementById("tempPassword");
            copyText.select();
            copyText.setSelectionRange(0, 99999);
            document.execCommand("copy");
            alert("Password copied to clipboard");
        }

        function redirectToLogin() {
            window.location.href = 'login.html';
        }
    </script>
</body>
</html>
