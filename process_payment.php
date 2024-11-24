<?php
session_start();

// Simulate payment success (In a real-world case, you'll handle actual payment processing logic here)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Here, you would process the payment (e.g., API call to payment gateway)
    // For this example, we'll assume the payment is always successful.

    // Redirect to success page with a success parameter
    header("Location: payment_success.php?success=true&price=" . $_POST['price']);
    exit();
}
?>
