<?php
session_start();
if (!isset($_SESSION['email'])) {
    echo "<script>alert('Unauthorized access. Please verify your email first.'); window.location.href='home.php';</script>";
    exit();
}

$email = $_SESSION['email'];

// DB Connection
$conn = mysqli_connect("localhost", "root", "", "travel");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM booking WHERE email = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Details</title>
    <link rel="stylesheet" href="css/style.css"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>
<body>

<!-- Header -->
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

<!-- Booking Details -->
<div class="details-container">
    <h2>Booking Confirmation</h2>

    <?php if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result); ?>

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
            <a href="update.php?email=<?php echo urlencode($row['email']); ?>&name=<?php echo urlencode($row['name']); ?>"
               class="btn" style="background-color: blue; color: white; padding: 10px 15px; text-decoration: none; border-radius: 5px;">
                Edit Booking
            </a>
        </div>

    <?php } else { ?>
        <p class='error-message'>No booking details found for email: <?php echo htmlspecialchars($email); ?></p>
    <?php } ?>
</div>

<!-- Footer -->
<section class="footer">
    <div class="box-container">
        <div class="box">
            <h3>Quick Links</h3>
            <a href="home1.php"> <i class="fas fa-angle-right"></i> Home</a>
            <a href="about.php"> <i class="fas fa-angle-right"></i> About</a>
            <a href="package.php"> <i class="fas fa-angle-right"></i> Package</a>
            <a href="book.php"> <i class="fas fa-angle-right"></i> Book</a>
        </div>

        <div class="box">
            <h3>Contact Info</h3>
            <a href="#"> <i class="fas fa-phone"></i> +91 7780260259</a>  
            <a href="#"> <i class="fas fa-user"></i> Lavanya</a>  
            <a href="#"> <i class="fas fa-envelope"></i> Lavanya@gmail.com</a>
            <a href="#"> <i class="fas fa-map-marker-alt"></i> India</a>  
        </div>

        <div class="box">
            <h3>Follow Us</h3>
            <a href="#"> <i class="fab fa-facebook"></i> Facebook</a>
            <a href="#"> <i class="fab fa-twitter"></i> Twitter</a>
            <a href="#"> <i class="fab fa-instagram"></i> Instagram</a>
            <a href="#"> <i class="fab fa-linkedin"></i> LinkedIn</a>
        </div>
    </div>
</section>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="js/script.js"></script>

</body>
</html>

<?php
mysqli_close($conn);
?>
