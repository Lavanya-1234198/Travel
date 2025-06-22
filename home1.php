<?php
session_start();
$email = $_SESSION["username"]; // Start the session
?>
<html>
    <head>
        <title>home1 page</title>


        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />


        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

        <link  rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <!--heder section -->
        <section class ="header">
            <a href="home1.php" class="logo">TripNChill <i class="fas fa-plane" style="color: blue;"></i></a>
            <nav class="navbar">
                <a href="#">home</a>
                <a href="about.php">about</a>
                <a href="package.php">package</a>
                <a href="book.php">book </a>
                <a href="logout.php">logout </a>
           </nav>
           <div id="menu-btn" class="fas fa-bars"></div>
        </section>


        <!-- home section  -->
        <section class="home">
        <div class="swiper home-slider">
                <div class="swiper-wrapper">
                <div class="swiper-slide" style="background:url('images/home3.jpg') no-repeat; background-size: cover;">
                        <div class="content">
                            <span>Explore the Beauty, Embrace the Journey, Experience the World</span>
                            <h3> Embark on a New Adventure </h3>
                            <a href="package.php" class="btn">Start Your Journey</a>
                        </div>
                    </div>

                    <div class="swiper-slide" style="background:url('images/home2.jpg') no-repeat; background-size: cover;">
                        <div class="content">
                        <span>Explore the Beauty, Embrace the Journey, Experience the World</span>
                            <h3> Embark on a New Adventure </h3>
                            <a href="package.php" class="btn">Start Your Journey</a>
                        </div>
                    </div>

                    <div class="swiper-slide" style="background:url('images/home1.jpeg') no-repeat; background-size: cover;">
                        <div class="content">
                        <span>Explore the Beauty, Embrace the Journey, Experience the World</span>
                            <h3> Embark on a New Adventure </h3>
                            <a href="package.php" class="btn">Start Your Journey</a>
                        </div>
                    </div>
                    
                </div>
                <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
            </div>
        </section>



        <!-- Services section -->
        <section class="services">
    <h1 class="heading-title">our services</h1>
    <div class="box-container">
        <div class="box">
            <img src="images/adventure1.png" alt="">
            <h3>adventures</h3>
        </div>
        <div class="box">
            <img src="images/tour-guide.png" alt="">
            <h3>tour guide</h3>
        </div>
        <div class="box">
            <img src="images/trekking.png" alt="">
            <h3>trekking</h3>
        </div>
        <div class="box">
            <img src="images/campfire.png" alt="">
            <h3>camp fire</h3>
        </div>
        <div class="box">
            <img src="images/direction.png" alt="">
            <h3>off road</h3>
        </div>
        <div class="box">
            <img src="images/camping.png" alt="">
            <h3>camping</h3>
        </div>
    </div>
</section>



<!-- home about section -->
 <section class="home-about">
    <div class="image">
        <img src="images/about-us-1.webp" alt ="">
    </div>

    <div class="content">
        <h3>about us</h3>
        <p>"Welcome to our travel website, 
            your ultimate gateway to unforgettable journeys! We are passionate explorers dedicated to making your travel dreams a reality by offering personalized experiences, 
            expert recommendations, and seamless planning. Whether you're looking for breathtaking destinations, hidden gems, 
            or adventure-filled getaways, we provide all the resources you need to embark on the perfect trip. Join us in discovering the world, 
            one destination at a time!"</p>
        <a href="about.php" class="btn">read more</a>
    </div>
</section>


<!-- home package section -->
 <section class="home-packages">
    <h1 class="heading-title">our Packages</h1>
    <div class="box-container">
        <div class="box">
            <div class="image">
                <img src="images\p-adven.jpg" alt="">
            </div>
            <div class="content">
                <h3>adventure & tours</h3>
                <p>Thrill-packed experiences like trekking, rafting, and skydiving for adrenaline seekers.</p>
                <a href="book.php" class="btn">book now</a>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="images\p-family.avif" alt="">
            </div>
            <div class="content">
                <h3>Family Tours</h3>
                <p>Fun and relaxing vacations with kid-friendly attractions, theme parks, and sightseeing for all ages.</p>
                <a href="book.php" class="btn">book now</a>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="images\p-culture.webp" alt="">
            </div>
            <div class="content">
                <h3>Cultural & Heritage Tours</h3>
                <p>Explore the rich history, traditions, and iconic landmarks of ancient civilizations and local cultures.</p>
                <a href="book.php" class="btn">book now</a>
            </div>
        </div>
   
    </div>
   
</section>

































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