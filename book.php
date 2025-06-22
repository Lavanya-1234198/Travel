<?php
session_start();  // Ensure this is at the VERY TOP

if (!isset($_SESSION["username"]) || !isset($_SESSION["name"])) {
    echo "Session variables are not set. Please log in again.";
    exit();
}

// If session exists, proceed with booking
$username = $_SESSION["username"];  // Email
$name = $_SESSION["name"]; // Full Name
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Your Trip</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<!-- Header Section -->
<section class="header">
    <a href="home.php" class="logo">TripNChill <i class="fas fa-plane" style="color: blue;"></i></a>
    <nav class="navbar">
        <a href="home.php">Home</a>
        <a href="about.php">About</a>
        <a href="package.php">Package</a>
        <a href="book.php">Book</a>
        <a href="logout.php">Logout</a>
    </nav>
</section>

<!-- Page Heading -->
<div class="heading">
    <h1>Book Your Trip!</h1>
</div>

<!-- Welcome Text -->
<span class="welcome-text" style="color: green; font-size: 1.2rem; margin-left: 15px;">
    Welcome, <?php echo htmlspecialchars($name); ?>!
</span>

<!-- Booking Form -->
<section class="booking">
    <form name="book" action="booking-store.php" method="post" class="book-form" onsubmit="return validateBooking();">

    <div class="flex">
                <!-- Hidden Fields -->
                <input type="hidden" name="name" value="<?php echo htmlspecialchars($name); ?>">
                <input type="hidden" name="username" value="<?php echo htmlspecialchars($username); ?>">

                <div class="inputBox">
                    <span>Name:</span>
                    <input type="text" value="<?php echo htmlspecialchars($name); ?>" disabled>
                </div>
                <div class="inputBox">
                    <span>Email:</span>
                    <input type="email" value="<?php echo htmlspecialchars($username); ?>" disabled>
                </div>

            <div class="inputBox">
                <span>Phone:</span>
                <input type="number" placeholder="Enter your phone" name="phone" >
            </div>
            <div class="inputBox">
                <span>Address:</span>
                <input type="text" placeholder="Enter your address" name="address" >
            </div>
            <div class="inputBox">
                <span>Where To:</span>
                <input type="text" placeholder="Place you want to visit" name="location">
            </div>
            <div class="inputBox">
                <span>Destination:</span>
                <input type="text" placeholder="Enter your destination" name="destination">
            </div>
            <div class="inputBox">
                <span>Number of Guests:</span>
                <input type="number" placeholder="How many guests" name="guests">
            </div>
            <div class="inputBox">
                <span>Number of Days:</span>
                <input type="number" name="days" placeholder="Total Days">
            </div>
            <div class="inputBox">
                <span>Arrivals:</span>
                <input type="date" name="arrivals" >
            </div>
            <div class="inputBox">
                <span>Leaving:</span>
                <input type="date" name="leaving" >
            </div>
        </div>
        <input type="submit" value="Submit" class="btn" name="send">
    </form>
</section>
<script>
function validateBooking() {
    let phone = document.book.phone.value.trim();
    let address = document.book.address.value.trim();
    let location = document.book.location.value.trim();
    let destination = document.book.destination.value.trim();
    let guests = document.book.guests.value.trim();
    let days = document.book.days.value.trim();
    let arrivals = document.book.arrivals.value.trim();
    let leaving = document.book.leaving.value.trim();

    // Phone number validation: Must be 10 digits
    let phonePattern = /^[0-9]{10}$/;
    if (!phonePattern.test(phone)) {
        alert("Phone number must be exactly 10 digits.");
        return false;
    }

    // Check if all fields are filled
    if (address === "" || location === "" || destination === "" || guests === "" || days === "" || arrivals === "" || leaving === "") {
        alert("All fields are required. Please fill out every field.");
        return false;
    }

    // Validate number of guests and days (positive numbers)
    if (parseInt(guests) <= 0) {
        alert("Number of guests must be at least 1.");
        return false;
    }
    if (parseInt(days) <= 0) {
        alert("Number of days must be at least 1.");
        return false;
    }

    // Validate Arrival and Leaving dates
    let arrivalDate = new Date(arrivals);
    let leavingDate = new Date(leaving);
    let today = new Date();

    if (arrivalDate < today) {
        alert("Arrival date must be in the future.");
        return false;
    }

    if (leavingDate <= arrivalDate) {
        alert("Leaving date must be after the arrival date.");
        return false;
    }

    return true; // If all checks pass, form will submit
}
</script>


<html>
<head>
        <title>book page</title>


        <link
  rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
        <link  rel="stylesheet" href="css/style.css">
    </head>

<!-- footer -->
<section class="footer">
    <div class="box-container">
        <div class="box">
            <h3>quick lines</h3>
                <a href="home1.php"> <i class="fas fa-angle-right"></i>home</a>
                <a href="about.php"> <i class="fas fa-angle-right"></i> about</a>
                <a href="package.php"> <i class="fas fa-angle-right"></i> package</a>
                <a href="book.php"> <i class="fas fa-angle-right"></i> book </a>
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

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
