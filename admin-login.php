<?php
// Include database connection
include('db_connect.php'); // Ensure this file contains your database connection

// Handle flight deletion if a POST request is received
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['flightId'])) {
    $flightId = intval($_POST['flightId']); // Sanitize input

    // Prepare and execute the DELETE query
    $stmt = $conn->prepare("DELETE FROM flights WHERE id = ?");
    $stmt->bind_param("i", $flightId);

    if ($stmt->execute()) {
        $message = "Flight deleted successfully.";
    } else {
        $message = "Failed to delete flight.";
    }

    $stmt->close();
}

// Fetch the flight records
$sql = "SELECT * FROM flights";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Flight Management</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            display: flex;
        }

        .sidebar {
            width: 250px;
            background-color: #2c3e50;
            color: #fff;
            padding: 20px;
            position: fixed;
            height: 100vh;
        }

        .sidebar .sidebar-header {
            font-size: 24px;
            text-align: center;
            margin-bottom: 20px;
        }

        .sidebar .nav-list {
            list-style-type: none;
        }

        .sidebar .nav-list li {
            margin: 15px 0;
        }

        .sidebar .nav-list li a {
            color: #fff;
            text-decoration: none;
            font-size: 18px;
        }

        .sidebar .nav-list li a:hover {
            color: #3498db;
        }

        .main-content {
            margin-left: 250px;
            padding: 20px;
            width: 100%;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .header h1 {
            font-size: 32px;
        }

        .header .add-btn {
            padding: 10px 20px;
            background-color: #3498db;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        .header .add-btn:hover {
            background-color: #2980b9;
        }

        .flight-table {
            width: 100%;
            overflow-x: auto;
        }

        .flight-table table {
            width: 100%;
            border-collapse: collapse;
        }

        .flight-table table th, .flight-table table td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        .flight-table table th {
            background-color: #3498db;
            color: white;
        }

        .flight-table table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .flight-table .btn {
            padding: 5px 10px;
            cursor: pointer;
            border: none;
        }

        .flight-table .btn.edit-btn {
            background-color: #f39c12;
        }

        .flight-table .btn.delete-btn {
            background-color: #e74c3c;
        }

        .flight-table .btn:hover {
            opacity: 0.8;
        }

        .message {
            margin-bottom: 15px;
            font-weight: bold;
            color: green;
        }
    </style>
</head>
<body>

<!-- Sidebar Navigation -->
<div class="sidebar">
    <div class="sidebar-header">
        <h2>Admin Dashboard</h2>
    </div>
    <ul class="nav-list">
        <li><a href="#">Dashboard</a></li>
        <li><a href="#">Manage Flights</a></li>
        <li><a href="manage-users.php">Manage Users</a></li>
        <li><a href="admin-dashboard.html">Logout</a></li>
    </ul>
</div>

<!-- Main Content -->
<div class="main-content">
    <div class="header">
        <h1>Flight Management</h1>
        <button class="btn add-btn" onclick="window.location.href='add-flight.html'">Add New Flight</button>
    </div>

    <!-- Display Message -->
    <?php if (!empty($message)): ?>
        <div class="message"><?= htmlspecialchars($message) ?></div>
    <?php endif; ?>

    <!-- Flight Table -->
    <div class="flight-table">
        <table>
            <thead>
                <tr>
                    <th>Flight ID</th>
                    <th>Flight Name</th>
                    <th>Departure</th>
                    <th>Arrival</th>
                    <th>Departure Date</th>
                    <th>Return Date</th>
                    <th>Passengers</th>
                    <th>Price (USD)</th>
                    <th>Class</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Check if there are any flights and display them
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['flight_name'] . "</td>";
                        echo "<td>" . $row['departure_city'] . "</td>";
                        echo "<td>" . $row['arrival_city'] . "</td>";
                        echo "<td>" . $row['departure_date'] . "</td>";
                        echo "<td>" . $row['return_date'] . "</td>";
                        echo "<td>" . $row['passengers'] . "</td>";
                        echo "<td>$" . number_format($row['price'], 2) . "</td>";
                        echo "<td>" . ucfirst($row['class']) . "</td>";
                        echo "<td>" . ucfirst($row['status']) . "</td>";
                        echo "<td>
                               
                                <form method='POST' style='display:inline;'>
                                    <input type='hidden' name='flightId' value='" . $row['id'] . "'>
                                    <button type='submit' class='btn delete-btn'>Delete</button>
                                </form>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='11'>No flights found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    function editFlight(flightId) {
        alert('Edit flight ID: ' + flightId);
        // Implement the edit logic here
    }
</script>

</body>
</html>
