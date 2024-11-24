<?php
// Include database connection
include('db_connect.php'); 

// Get the flightId from the URL query string
if (isset($_GET['id'])) {
    $flightId = $_GET['id'];
    
    // Fetch the flight details based on the flightId
    $sql = "SELECT * FROM flights WHERE id = $flightId";
    $result = mysqli_query($conn, $sql);
    
    // Fetch the flight record
    $flight = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Flight</title>
    <style>
        /* Add your styles here */
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
        <h1>Edit Flight</h1>
    </div>
    
    <!-- Edit Flight Form -->
    <form action="update-flight.php" method="POST">
        <input type="hidden" name="flight_id" value="<?php echo $flight['id']; ?>">
        <div>
            <label>Flight Name</label>
            <input type="text" name="flight_name" value="<?php echo $flight['flight_name']; ?>" required>
        </div>
        <div>
            <label>Departure City</label>
            <input type="text" name="departure_city" value="<?php echo $flight['departure_city']; ?>" required>
        </div>
        <div>
            <label>Arrival City</label>
            <input type="text" name="arrival_city" value="<?php echo $flight['arrival_city']; ?>" required>
        </div>
        <div>
            <label>Status</label>
            <select name="status" required>
                <option value="active" <?php if($flight['status'] == 'active') echo 'selected'; ?>>Active</option>
                <option value="inactive" <?php if($flight['status'] == 'inactive') echo 'selected'; ?>>Inactive</option>
            </select>
        </div>
        <div>
            <button type="submit">Update Flight</button>
        </div>
    </form>
</div>

</body>
</html>
