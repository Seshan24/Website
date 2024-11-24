<?php
// Retrieve the flight price from the URL parameter
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
    <title>Payment | Horizon Airways</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f9fafb;
        }
        .credit-card {
            background: linear-gradient(135deg, #1c2841, #3b4c7a);
            border-radius: 10px;
            color: white;
            padding: 20px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <div class="min-h-screen flex items-center justify-center">
        <div class="max-w-lg w-full bg-white shadow-lg rounded-lg p-6">
            <h1 class="text-2xl font-bold text-gray-800 mb-4">Payment Information</h1>

          <!-- Credit Card UI -->

<div class="credit-card mb-6 p-6 bg-gradient-to-r from-blue-500 to-blue-700 rounded-lg text-white shadow-lg" style="width: 350px; height: 200px;">
    <h2 class="text-2xl font-bold">Credit Card/ Debit Card</h2>
    <img src="mastercard2.jpg" alt="Visa Logo" class="h-8 my-2">
    <p class="text-xl font-mono">**** **** **** 1234</p>
    <div class="mt-4 flex justify-between text-sm">
        <p>Card Holder: <span class="font-semibold">Sample</span></p>
        <p>Expiry: <span class="font-semibold">12/27</span></p>
    </div>
</div>


            <!-- Payment Form -->
            <form action="process_payment.php" method="POST" class="space-y-4">
                <div>
                    <label for="cardNumber" class="block text-gray-700 font-medium">Card Number</label>
                    <input type="text" id="cardNumber" name="cardNumber" maxlength="16"
                        class="w-full border border-gray-300 rounded px-4 py-2 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                        placeholder="1234 5678 9012 3456" required>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="expiryDate" class="block text-gray-700 font-medium">Expiry Date</label>
                        <input type="text" id="expiryDate" name="expiryDate" maxlength="5"
                            class="w-full border border-gray-300 rounded px-4 py-2 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                            placeholder="MM/YY" required>
                    </div>
                    <div>
                        <label for="cvv" class="block text-gray-700 font-medium">CVV</label>
                        <input type="password" id="cvv" name="cvv" maxlength="3"
                            class="w-full border border-gray-300 rounded px-4 py-2 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                            placeholder="123" required>
                    </div>
                </div>
                <div>
                    <label for="cardholderName" class="block text-gray-700 font-medium">Cardholder Name</label>
                    <input type="text" id="cardholderName" name="cardholderName"
                        class="w-full border border-gray-300 rounded px-4 py-2 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                        placeholder="Name" required>
                </div>
                <div class="flex items-center justify-between mt-6">
                    <p class="text-gray-600">Total: <span class="font-bold text-gray-900">$<?php echo number_format($price, 2); ?></span></p>
                    <button type="submit" 
                        class="bg-blue-600 text-white px-6 py-2 rounded shadow hover:bg-blue-700 focus:ring-2 focus:ring-blue-500">
                        Pay Securely
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
