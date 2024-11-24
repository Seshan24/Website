<?php
include 'db_connect.php'; // Include the database connection

// Handle deletion request
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $delete_sql = "DELETE FROM users WHERE id = $delete_id";

    if ($conn->query($delete_sql) === TRUE) {
        echo "<script>alert('User deleted successfully!'); window.location.href='manage-users.php';</script>";
    } else {
        echo "<script>alert('Error deleting user: " . $conn->error . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
    <style>
        /* General Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            display: flex;
        }

        /* Sidebar Styles */
        .sidebar {
            width: 250px;
            background-color: #2c3e50;
            color: #fff;
            padding: 20px;
            position: fixed;
            height: 100vh;
        }

        .sidebar .sidebar-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .sidebar .sidebar-header .logo {
            width: 80px;
            height: auto; /* Maintain aspect ratio */
            margin-bottom: 10px;
            display: block;
            margin-left: auto;
            margin-right: auto;
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

        /* Main Content Styles */
        .main-content {
            margin-left: 250px;
            padding: 20px;
            width: calc(100% - 250px);
        }

        .main-content h1 {
            margin-bottom: 20px;
        }

        /* Table Styles */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th, table td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        table th {
            background-color: #3498db;
            color: white;
        }

        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .delete-btn {
            background-color: #e74c3c;
            color: white;
            padding: 5px 10px;
            border: none;
            cursor: pointer;
        }

        .delete-btn:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body>

<!-- Sidebar Navigation -->
<div class="sidebar">
    <div class="sidebar-header">
        <img src="skyport.png" alt="Skyport Logo" class="logo">
        <h2>Admin Dashboard</h2>
    </div>
    <ul class="nav-list">
        <li><a href="admin-login.php">Manage Flights</a></li>
        <li><a href="manage-users.php">Manage Users</a></li>
        <li><a href="admin-dashboard.html">Logout</a></li>
    </ul>
</div>


<!-- Main Content -->
<div class="main-content">
    <h1>Manage Users</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Fetch all users from the database
            $sql = "SELECT id, full_name, email FROM users";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output each user as a table row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>" . $row['id'] . "</td>
                        <td>" . $row['full_name'] . "</td>
                        <td>" . $row['email'] . "</td>
                        <td>
                            <a href='manage-users.php?delete_id=" . $row['id'] . "' onclick='return confirm(\"Are you sure you want to delete this user?\");'>
                                <button class='delete-btn'>Delete</button>
                            </a>
                        </td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No users found.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>
