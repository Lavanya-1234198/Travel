<?php
session_start();
$servername = "localhost";
$db_username = "root";
$db_password = "";
$dbase = "travel";

// Check if admin is logged in
if (!isset($_SESSION["admin"])) {
    header("Location: login.html");
    exit();
}

// Create connection
$conn = mysqli_connect($servername, $db_username, $db_password, $dbase);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM booking";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booked Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            text-align: center;
        }
        .container {
            width: 90%;
            margin: 50px auto;
            background: white;
            padding: 20px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
        }
        h2 {
            color: #2c3e50;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background: #3498db;
            color: white;
        }
        tr:nth-child(even) {
            background: #f2f2f2;
        }
        .delete-btn {
            background: #e74c3c;
            color: white;
            border: none;
            padding: 6px 12px;
            cursor: pointer;
            border-radius: 5px;
        }
        .delete-btn:hover {
            background: #c0392b;
        }
        .accept-btn {
            background: #2ecc71;
            color: white;
            border: none;
            padding: 6px 12px;
            cursor: pointer;
            border-radius: 5px;
        }
        .accept-btn:hover {
            background: #27ae60;
        }
        .accepted-text {
            color: green;
            font-weight: bold;
            margin-top: 7px;
        }
        td .action-buttons {
            display: flex;
            gap: 10px;
            align-items: center;
        }
        .logout-btn {
            background: #e74c3c;
            color: white;
            border: none;
            padding: 8px 15px;
            cursor: pointer;
            border-radius: 5px;
            text-decoration: none;
        }
        .logout-btn:hover {
            background: #c0392b;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Booked Travel Details</h2>
    <a href="admin-logout.php" class="logout-btn">Logout</a>
    <table>
        <tr>
            <th>Customer Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Location</th>
            <th>Destination</th>
            <th>Guests</th>
            <th>Days</th>
            <th>Arrivals</th>
            <th>Leaving</th>
            <th>Action</th>
        </tr>
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>{$row['name']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['phone']}</td>
                        <td>{$row['address']}</td>
                        <td>{$row['location']}</td>
                        <td>{$row['destination']}</td>
                        <td>{$row['guests']}</td>
                        <td>{$row['days']}</td>
                        <td>{$row['arrivals']}</td>
                        <td>{$row['leaving']}</td>
                        <td>
                            <div class='action-buttons'>";

                echo "
                    <form method='POST' action='admin_delete.php'>
                        <input type='hidden' name='name' value='{$row['name']}'>
                        <button type='submit' class='delete-btn' onclick='return confirm(\"Are you sure you want to delete this booking?\");'>Delete</button>
                    </form>";






                if ($row['accepted'] == 0) {
                     echo "
<form method='POST' action='admin_accept.php' onsubmit=\"return confirm('Are you sure you want to accept this booking and send a confirmation email?');\" style='display:inline;'>
    <input type='hidden' name='name' value='{$row['name']}'>
    <button type='submit' class='accept-btn'>Accept</button>
</form>
";
                } else {
                    echo "<span class='accepted-text'>Accepted</span>";
                }

                echo "</div>
                        </td>
                    </tr>";
            }
        } else {
            echo "<tr><td colspan='11'>No bookings found.</td></tr>";
        }
        ?>
    </table>
</div>

</body>
</html>

<?php
mysqli_close($conn);
?>
