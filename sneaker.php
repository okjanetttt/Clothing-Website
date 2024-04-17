<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$database = "streetfashion";

// Create a connection to the database
$conn = mysqli_connect($servername, $username, $password, $database);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Calculate the total cart count
if (isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
    $total = count($cart);
} else {
    $total = 0; // Default to 0 if the cart session variable is not set
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <title>Sneaker Laundry - Queens & Kings Streetfashion</title>
    <link rel="stylesheet" href="css/sneaker.css">
</head>
<body>
<header>
    <div class="logo">
        <a href="shop.php"><img src="images/logo.jpg" alt="Logo"></a>
    </div>
    <div id="menu-toggle" class="menu-icon">
        <div id="menu-icon-top"></div>
        <div id="menu-icon-middle"></div>
        <div id="menu-icon-bottom"></div>
    </div>        
    <nav>
        <ul>
            <li><a href="new-arrivals.php">New Arrivals</a></li>
            <li><a href="women.php">Women</a></li>
            <li><a href="men.php">Men</a></li>
            <li><a href="homeware.php">Homeware</a></li>
            <li><a href="sneaker.php" class="active">Sneaker Laundry</a></li>
            <li><a href="contact.php">Contact Us</a></li>
        </ul>
    </nav>
    <div class="search-bar">
        <input type="text" placeholder="Search...">
        <button type="submit">Search</button>
    </div>
    <div class="user-actions">
        <?php        
        if (isset($_SESSION['user_email'])) {
            $userEmail = $_SESSION['user_email'];
            echo "Welcome, $userEmail ";
            echo '<a href="profile-page.php"><i class="fa-solid fa-user"></i></a>';
            echo '<a href="cart.php"><div class="cart-icon"><i class="fas fa-shopping-cart"> ' . $total . '</i></div></a>';
            echo '<a href="logout.php">Logout</a>';
        } else {
            echo '<a href="cart.php"><div class="cart-icon"><i class="fas fa-shopping-cart"> ' . $total . '</i></div></a>';
            echo '<a href="login.php">Login</a>';
            echo '<a href="register.php">Register</a>';
        }
        ?>
    </div>
</header>
</header>

<!------------------------------------------------------------ Slideshow Nyana Section ---------------------------------------------------------------->
<div class="header-logo">
    <div class="header">
        Sneaker Laundry
    </div>
    
    <div class="sneaker-image">
    <img src="my-imgs/Sneaker_laundry.jpg" alt="">
    </div>

    <div class="cleaning-details">
        <p>When your sneakers enter our laundry, we start by removing the insoles, laces, and any debris from the<br>outsoles (dirt, gum, and stones). Your sneakers are then cleaned entirely by hand using a variety of <br>brushes and techniques depending on the material. They're then air-dried before extra treatments are applied.<br>Our clean includes insoles, laces, uppers, midsoles, and undersoles.</p>
        <a href="contact.php"><br><button class="view-button">Visit Our Store</button></a>
        <h2>Getting your footwear cleaned has never been so easy. Here's how it works.</h2>
    </div>

    <div class="cleaning-steps">
        <div class="step">
            <img src="my-imgs/clock_460x-0.jpg" alt="">
            <h1>Schedule your clean</h1>
            <p>Plan your day, choose your clean, add your extras, fill in your delivery details and preferred pick-up date...then checkout!</p>
            <div class="price">$29.99</div>
        </div>

        <div class="step">
            <img src="my-imgs/home_460x-31.jpg" alt="">
            <h1>Hand in your sneakers</h1>
            <p>We'll come collect your sneakers on your doorstep on the date you've selected. We'll take them back to our stores for cleaning.</p>
        </div>

        <div class="step">
            <img src="my-imgs/shipping_460x-0.jpg" alt="">
            <h1>Receive your refreshed pair</h1>
            <p>Notification will be sent, and your shoes will be ready to be delivered. Track your shoes as they make their way to you!</p>
        </div>
    </div>
    <br>

    <div class="text-containers">
        <h2>How We Deep Clean:</h2>
        <div class="images-row">
            <img src="my-imgs/step1.jpg" alt="">
            <img src="my-imgs/step2.jpg" alt="">
            <img src="my-imgs/step3.jpg" alt="">
        </div>
        <h2>EXTRA TREATMENTS:</h2>
        <div class="images-row">
            <img src="my-imgs/step7.jpg" alt="">
            <img src="my-imgs/step5.jpg" alt="">
            <img src="my-imgs/step4.jpg" alt="">
        </div><br>
        <div class="images-row">
            <img src="my-imgs/step8.jpg" alt="">
            <img src="my-imgs/step10.jpg" alt="">
            <img src="my-imgs/step12.jpg" alt="">
        </div><br>
        <div class="images-row">
            <img src="my-imgs/step11.jpg" alt="">
            <img src="my-imgs/step6.jpg" alt="">
        </div>
    </div><br>
</div>

<!------------------------------------------------------- Footer ------------------------------------------------------>
<hr/>
<footer class="section__container footer__container">
  <div class="footer__col">
    <h4 class="footer__heading">CONTACT INFO</h4>
    <p><i class="ri-map-pin-2-fill"></i>The Zone @ Rosebank, Shop 106</p>
    <p><i class="ri-mail-fill"></i> queensandkings@streefashion.co.za</p>
    <p><i class="ri-phone-fill"></i> (+012) 3456 789</p>
  </div>
  <div class="footer__col">
    <h4 class="footer__heading">COMPANY</h4>
    <p>Home</p>
    <p>About Us</p>
    <!-- <p>Work With Us</p> -->
    <p>Our Blog</p>
    <p>Terms & Conditions</p>
  </div>
  <div class="footer__col">
    <h4 class="footer__heading">USEFUL LINK</h4>
    <p>New Arrivals</p>
    <p>Women</p>
    <p>Men</p>
    <p>Homeware</p>
    <p>Sneaker Laundry</p>
  </div>
  <div class="footer__col">
    <h4 class="footer__heading">Social Links</h4>
    <div class="instagram__grid">
        <a><i class="fa fa-google-plus" aria-hidden="true"></i></a>
        <a><i class="fa fa-twitter" aria-hidden="true"></i></a>
        <a><i class="fa fa-facebook" aria-hidden="true"></i></a>
        <a><i class="fa fa-instagram" aria-hidden="true"></i></a>
    </div>
    <div class="payment_img">
        <img src="my-imgs/pay.png" alt="" style="margin-top: 8%; width: 70%;">
    </div>
  </div>
</footer>
<hr/>
<div class="section__container footer__bar">
  <div class="copyright">
    Copyright © 2023 Queens & Kings Streetfashion. All rights reserved.
  </div>
  <div class="footer__form">
    <form>
      <input type="text" placeholder="ENTER YOUR EMAIL" />
      <button class="btn" type="submit">SUBSCRIBE</button>
    </form>
  </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const menuToggle = document.querySelector('.menu-icon');
        const nav = document.querySelector('nav ul');

        menuToggle.addEventListener('click', function() {
            nav.classList.toggle('show-menu');
        });
    });
</script>

<script src="https://kit.fontawesome.com/c7cf5c000f.js" crossorigin="anonymous"></script></body>
</html>
