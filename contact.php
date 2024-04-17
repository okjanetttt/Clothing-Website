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
    <title>Contact Us - Queens & Kings Streetfashion</title>
    <link rel="stylesheet" href="css/contact.css">
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
            <li><a href="sneaker.php">Sneaker Laundry</a></li>
            <li><a href="contact.php" class="active">Contact Us</a></li>
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

<!------------------------------------------------------------ Contact Us Section ---------------------------------------------------------------->
<div class="containers">
    <div class="content">
        <div class="left-side">
            <div class="address details">
                <i class="fas fa-map-marker-alt"></i>
                <div class="topic">Address</div>
                <div class="text-one">The Zone @ Rosebank, Shop 106</div>
                <div class="text-two">Upper Level - Johannesburg</div>
            </div>
            
            <div class="phone details">
                <i class="fas fa-phone-alt"></i>
                <div class="topic">Phone</div>
                <div class="text-one">+0098 9893 5647</div>
            </div>
            
            <div class="email details">
                <i class="fas fa-envelope"></i>
                <div class="topic">Email</div>
                <div class="text-one">queensandkings0002@gmail.com</div>
            </div>
        </div>
        
        <div class="right-side">
            <div class="topic-text">Send us a message</div>
            <p>Customer service support, inquiries related to: prices and currency, order and preorder payment, order status, shipment info, return and exchange.</p>
            <form action="contact.php" method="post">
                <div class="input-box">
                    <input type="text" name="f_name" placeholder="First name (optional)" required>
                </div>
                <div class="input-box">
                    <input type="text" name="l_name" placeholder="Last name (optional)" required>
                </div>
                <div class="input-box">
                    <input type="number" name="p_number" placeholder="Phone number (optional)" required>
                </div>
                <div class="input-box">
                    <input type="text" name="email" placeholder="Enter your email." required>
                </div>
                <div class="input-box">
                    <input type="text" name="message" placeholder="Your message." required>
                </div>
                <div class="button">
                    <input type="submit" value="Send Now" >
                </div>
            </form>
            
        </div>
    </div>
</div>
<br>

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

<script src="https://kit.fontawesome.com/c7cf5c000f.js" crossorigin="anonymous"></script>
</body>
</html>
