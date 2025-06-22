<?php
session_start();
$email = $_SESSION["username"];
$_SESSION["username"] = $email;
$servername = "localhost";
$db_username = "root";
$db_password = "";
$dbase = "travel";

$conn = mysqli_connect($servername, $db_username, $db_password, $dbase);
if (!$conn) {
    die("❌ Connection Failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["username"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $location = $_POST["location"];
    $destination = $_POST["destination"];
    $guests = $_POST["guests"];
    $days = $_POST["days"];
    $arrivals = $_POST["arrivals"];
    $leaving = $_POST["leaving"];

    $sql = "INSERT INTO booking (name, email, phone, address, location, destination, guests, days, arrivals, leaving) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssssssssss", $name, $email, $phone, $address, $location, $destination, $guests, $days, $arrivals, $leaving);

    if (mysqli_stmt_execute($stmt)) {
        echo "<script>
             alert('Your Booking is successful!');
             window.location.href = 'retrive-email.php';
        </script>";
    } else {
        echo "❌ Error: " . mysqli_error($conn);
    }
    mysqli_stmt_close($stmt);
}
mysqli_close($conn);
?>
<html>
<head>
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
