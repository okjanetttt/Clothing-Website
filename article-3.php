<?php
include_once("functions-page.php");

// Function to retrieve the cart contents
function getCart()
{
    if (isset($_SESSION['cart'])) {
        return $_SESSION['cart'];
    } else {
        return array();
    }
}


// Function to remove an item from the cart
function removeFromCart($ID)
{
    if (isset($_SESSION['cart'][$ID])) {
        unset($_SESSION['cart'][$ID]);
    }
}

// Function to update the quantity of an item in the cart
function updateCartItemQuantity($ID, $quantity)
{
    if (isset($_SESSION['cart'][$ID])) {
        $_SESSION['cart'][$ID] = $quantity;
    }
}

// Get the cart contents
$cart = getCart();
// Handle remove item action
if (isset($_GET['action']) && $_GET['action'] === 'remove' && isset($_GET['product_id'])) {
    $ID = $_GET['product_id'];
    removeFromCart($ID);
    header('Location: cart.php');
    exit;
}

// Handle remove item action
if (isset($_GET['action']) && $_GET['action'] === 'remove' && isset($_GET['product_id'])) {
    $ID = $_GET['product_id'];
    removeFromCart($ID);
    header('Location: cart.php');
    exit;
}

// Handle update quantity action
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($_POST['quantity'] as $ID => $quantity) {
        updateCartItemQuantity($ID, $quantity);
    }
    header('Location: cart.php');
    exit;
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
    <title>Article - Queens & Kings Streetfashion</title>
    <link rel="stylesheet" href="css/article3.css">
</head>
<body>
<header class="navbar">
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
            <li><a href="homeware.php" class="active">Homeware</a></li>
            <li><a href="sneaker.php">Sneaker Laundry</a></li>
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

<!------------------------------------------------------------ The Top Heading ----------------------------------------------------------------->
<br>
<div class="container-article">
  <header>
  <h1 class="heading-1">Urban Majesty</h1>
    <div class="sub-heading">
      <p>Monday, <span>August 14, 2023</span></p>
      <p>by Farah Khalfe</p>
    </div>
</header>

<div class="main">
  <div class="home">
    <div class="left">
      <img src="my-imgs/glamour.jpg" class="home-img" alt="Paper photo">
      <p>Image: @thestylishnayo/Instagram</p><br>
      <p style="font-size: 18px; margin-left: 7%;">It was a fashionable South African Menswear Week both on and off the runway. Many dressed up for the occasion 
        in bright green, pink, tinted sunglasses, streetwear and bright statement suits. From Stefania Morland, Ruff Tung to Redbat Posse, there
        were lots of fashion shows to see and get inspired by.</p><br>
      </div>
      
      <div class="right">
        <h3 class="heading-3">latest news</h3>
        <div class="lists">
          <div class="list">
            <a href="article-4.php"><img src="my-imgs/ora.jpg" alt="photo 2" style="height: 189px; width: 200px;"></a>
            <p>Orapeleng Modutle Haute Couture extraordinaire</p>
          </div>
          
          <div class="list">
            <a href="article-2.php"><img src="my-imgs/riri.jpg" alt="photo 1" style="height: 150px; width: 200px;"></a>
            <p>Rihanna and ASAP Rocky welcome baby number 2!</p>
          </div>
          
          <div class="list">
            <a href="article1.php"><img src="my-imgs/bonang.jpg" alt="photo 1" style="height: 200px; width: 200px;"></a>
            <p>Bonang Matheba returned to her rightful place on the Miss SA stage as the MC for the evening.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <article>
    <p style="margin-left: 4.6%;">Here we have a look at the best street style looks from celebrities, models, actors, influencers, editors, stylists, fashion directors and more.</p>
  </article>
</div>
</div>
<p style="font-weight: bold; font-size: 20px; margin-left: 15%;">Scroll through our best street style from South African Menswear Week Spring/Summer 2023 below.</p><br>

<!----------------------------------------------------- IMAGES FOR THE ARTICLE ----------------------------------------------------------------->
<div class="fashion-imgs1">
  <img src="my-imgs/Image khanyisileqha Instagram.jpg" alt="">
  <img src="my-imgs/Image Tamar Hayden.jpg" alt="">
</div>
<div class="fashion-imgs1">
  <p>Image: @khanyisileqha/Instagram</p>
  <p>Image: @khanyisileqha/Instagram</p>
</div>
<br>
<div class="fashion-imgs2">
  <img src="my-imgs/2Image Simon Deiner SDR Photo.jpg" alt="">
  <img src="my-imgs/glamour.jpg" alt="">
</div>
<div class="fashion-imgs2">
  <p>Image: Tamar Hayden</p>
  <p>Image: @khanyisileqha/Instagram</p>
</div>
<br>
<div class="fashion-imgs3">
  <img src="my-imgs/Image Simon Deiner SDR Photo.jpg" alt="">
  <img src="my-imgs/liyema merlin siphosoi Instagram.jpg" alt="">
</div>
<div class="fashion-imgs3">
  <p>Image: Tamar Hayden</p>
  <p>Image: @khanyisileqha/Instagram</p>
</div>
<br>
<div class="fashion-imgs4">
  <img src="my-imgs/Image jaimecette Instagram.jpg " alt="">
  <img src="my-imgs/Image margielcandy Instagram.jpg" alt="">
</div>
<div class="fashion-imgs4">
  <p>Image: Tamar Hayden</p>
  <p>Image: @khanyisileqha/Instagram</p>
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