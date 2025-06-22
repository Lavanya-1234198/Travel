<?php
session_start();
$email = $_SESSION["username"]; // Start the session
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page | TripNChill</title>

    <!-- External CSS & Fonts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <!-- Header Section -->
    <section class="header">
        <a href="home1.php" class="logo">TripNChill <i class="fas fa-plane"></i></a>
        <nav class="navbar">
            <a href="home.php">Home</a>
            <a href="about.php">About</a>
            <a href="package.php">Package</a>
            <a href="book.php">Book</a>
            <a href="logout.php">logout </a>
        </nav>
    </section>

    <!-- Form Section -->
    <div class="form-container">
        <h2>Check Your Booking</h2>
        <form action="verify-email.php" method="POST">
            <input type="email" name="email" placeholder="Enter your email" required>
            <button type="submit">View Booking</button>
        </form>
    </div>

    <!-- Footer -->
    <section class="footer">
        <div class="box-container">
            <div class="box">
                <h3>Quick Links</h3>
                <a href="home.php"> <i class="fas fa-angle-right"></i> Home</a>
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

</body>
</html>
