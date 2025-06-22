<?php
session_start();

// Database Connection
$server = "localhost";
$username = "root";
$password = "";
$dbase = "travel"; 

$conn = mysqli_connect($server, $username, $password, $dbase);
if (!$conn) {
    die("❌ Connection failed: " . mysqli_connect_error());
}

// Check if email is provided in GET request
if (isset($_GET['email'])) {
    $email = trim($_GET['email']);
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    // Fetch updated booking details using email
    $sql = "SELECT * FROM booking WHERE email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "<script>alert('No booking details found for this email.'); window.location.href='home.php';</script>";
        exit();
    }

} else {
    echo "<script>alert('No email provided! Please submit the form correctly.'); window.location.href='home.php';</script>";
    exit();
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Details</title>
    <link rel="stylesheet" href="css/style.css"> 
</head>
<body>

<section class="header">
    <a href="home1.php" class="logo">TripNChill <i class="fas fa-plane"></i></a>
    <nav class="navbar">
        <a href="home.php">Home</a>
        <a href="about.php">About</a>
        <a href="package.php">Package</a>
        <a href="book.php">Book</a>
        <a href="logout.php">Logout</a>
    </nav>
</section>

<div class="details-container">
    <h2>Booking Confirmation</h2>

    <table class="booking-table">
        <tr><th>Name</th><td><?php echo htmlspecialchars($row['name']); ?></td></tr>
        <tr><th>Email</th><td><?php echo htmlspecialchars($row['email']); ?></td></tr>
        <tr><th>Phone</th><td><?php echo htmlspecialchars($row['phone']); ?></td></tr>
        <tr><th>Address</th><td><?php echo htmlspecialchars($row['address']); ?></td></tr>
        <tr><th>Where to</th><td><?php echo htmlspecialchars($row['location']); ?></td></tr>
        <tr><th>Destination</th><td><?php echo htmlspecialchars($row['destination']); ?></td></tr>
        <tr><th>Number of Guests</th><td><?php echo htmlspecialchars($row['guests']); ?></td></tr>
        <tr><th>Number of Days</th><td><?php echo htmlspecialchars($row['days']); ?></td></tr>
        <tr><th>Arrivals</th><td><?php echo htmlspecialchars($row['arrivals']); ?></td></tr>
        <tr><th>Leaving</th><td><?php echo htmlspecialchars($row['leaving']); ?></td></tr>
    </table>

    <div style="text-align: center; margin-top: 20px;">
        <a href="update.php" class="btn">Edit Again</a>
    </div>
</div>

</body>
</html>
