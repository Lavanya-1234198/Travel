<?php
session_start();


$conn = mysqli_connect("localhost", "root", "", "travel");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
 // Assuming email is stored in session
 $email = $_SESSION["username"];
// Fetch booking details
$sql = "SELECT * FROM booking WHERE email=?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$booking = mysqli_fetch_assoc($result);

if (!$booking) {
    echo "<script>alert('No booking found!'); window.location.href='home.php';</script>";
    exit();
}

mysqli_stmt_close($stmt);

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $location = $_POST['location'];
    $destination = $_POST['destination'];
    $guests = $_POST['guests'];
    $days = $_POST['days'];
    $arrivals = $_POST['arrivals'];
    $leaving = $_POST['leaving'];

    $update_sql = "UPDATE booking SET phone=?, address=?, location=?, destination=?, guests=?, days=?, arrivals=?, leaving=? WHERE email=?";
    $stmt = mysqli_prepare($conn, $update_sql);
    mysqli_stmt_bind_param($stmt, "sssssssss", $phone, $address, $location, $destination, $guests, $days, $arrivals, $leaving, $email);

    if (mysqli_stmt_execute($stmt)) {
        echo "<script>
    alert('Booking updated successfully!');
    window.location.href = 'view-update-details.php?email=" . urlencode($email) . "';
</script>";

        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
    mysqli_stmt_close($stmt);
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Booking</title>
    <link
  rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
        <link  rel="stylesheet" href="css/style.css">
</head>
<body>

<section class="header">
    <a href="home.php" class="logo">TripNChill</a>
    <nav class="navbar">
        <a href="home.php">Home</a>
        <a href="about.php">About</a>
        <a href="package.php">Package</a>
        <a href="book.php">Book</a>
        <a href="logout.php">Logout</a>
    </nav>
</section>

<div class="edit-booking-container">
    <h2>Edit Your Booking</h2>
    <form method="post" class="edit-booking-form">
        <input type="hidden" name="email" value="<?php echo htmlspecialchars($email); ?>">

        <div class="form-group">
            <label>Phone:</label>
            <input type="number" name="phone" value="<?php echo htmlspecialchars($booking['phone']); ?>" required>
        </div>

        <div class="form-group">
            <label>Address:</label>
            <input type="text" name="address" value="<?php echo htmlspecialchars($booking['address']); ?>" required>
        </div>

        <div class="form-group">
            <label>Where To:</label>
            <input type="text" name="location" value="<?php echo htmlspecialchars($booking['location']); ?>" required>
        </div>

        <div class="form-group">
            <label>Destination:</label>
            <input type="text" name="destination" value="<?php echo htmlspecialchars($booking['destination']); ?>" required>
        </div>

        <div class="form-group">
            <label>Number of Guests:</label>
            <input type="number" name="guests" value="<?php echo htmlspecialchars($booking['guests']); ?>" required>
        </div>

        <div class="form-group">
            <label>Number of Days:</label>
            <input type="number" name="days" value="<?php echo htmlspecialchars($booking['days']); ?>" required>
        </div>

        <div class="form-group">
            <label>Arrival Date:</label>
            <input type="date" name="arrivals" value="<?php echo htmlspecialchars($booking['arrivals']); ?>" required>
        </div>

        <div class="form-group">
            <label>Leaving Date:</label>
            <input type="date" name="leaving" value="<?php echo htmlspecialchars($booking['leaving']); ?>" required>
        </div>

        <button type="submit" class="update-btn">Update Booking</button>
    </form>
</div>

</html>
