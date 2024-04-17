<?php
session_start();
// session_unset();
// echo "Session unset";

// Replace these with your actual database credentials
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <title>Document</title>
</head>
<body>
<div class="navbar">
    <div class="logo">
        <a href="shop.php"><img src="images/logo.jpg" alt=""></a>
    </div>
    
    <div class="nav-links">
        <a href="new-arrivals.php">New Arrivals</a>
        <a href="women.php">Women</a>
        <a href="men.php">Men</a>
        <a href="homeware.php">Homeware</a>
        <a href="sneaker.php">Sneaker Laundry</a>
        <a href="contact.php" class="active">Contact Us</a>
    </div>
    
    <div class="navbar-right">
        <div class="search-container">
            <input type="text" placeholder="Search...">
            <i class="fas fa-search"></i>
        </div>
        <a href="cart.php">
            <div class="cart-icon">
                <i class="fas fa-shopping-cart"> <?php echo $total; ?></i>
            </div>
        </a>
        <?php
        if (isset($_SESSION['user_email'])) {
            $userEmail = $_SESSION['user_email'];
            echo "Welcome, $userEmail ";
            echo '<a href="profile-page.php"><i class="fa-solid fa-user"></i></a>';
            echo '<a href="logout.php">Logout</a>';
        } else {
            echo '<a href="login.php">Login</a> | ';
            echo '<a href="register.php">Register</a>';
        }
        ?>
    </div>
</div>
<!------------------------------------------- Facts and Questions -------------------------------------->
  <header>
      <h1>Frequently Asked Questions</h1>
  </header>

  <section class="faq">
      <h2>General Questions</h2>
      <dl>
          <dt>1. What is Street Fashion?</dt>
          <dd>Street fashion is a style of clothing that emerged from the streets, often characterized by its urban, edgy, and unique look.</dd>

          <dt>2. How can I contact customer support?</dt>
          <dd>You can reach our customer support team by emailing queensandkings@streefashion.co.za or by calling 100-400-444.</dd>

          <dt>3. Are the restrictions in terms of delivery addresses?</dt>
          <dd>Louis Vuitton only offers delivery in the country / region where the order has been placed online or by phone. 
              To see in which countries we deliver, we invite you to change your country / region on the top of the web page.</dd>
      </dl>
  </section>

  <section class="faq">
      <h2>Order and Shipping</h2>
      <dl>
          <dt>1. How can I track my order?</dt>
          <dd>You can track your order by logging into your account and visiting the "Order History" section.</dd>

          <dt>2. What is the estimated delivery time?</dt>
          <dd>Our estimated delivery time is 3-5 business days for standard shipping and 1-2 business days for express shipping.</dd>
      </dl>
  </section>

  <section class="faq">
      <h2>Returns and Exchanges</h2>
      <dl>
          <dt>1. How can I return an item?</dt>
          <dd>To return an item, please visit our Returns page for instructions and initiate the return process.</dd>

          <dt>2. Can I exchange an item for a different size or color?</dt>
          <dd>Yes, you can exchange an item for a different size or color. Please follow the instructions on our Returns page for exchanges.</dd>
      </dl>
  </section>
    
<!------------------------------------------------------------ Footer Section  -------------------------------------------------------->
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

<style>
  *{
  margin:0;
  padding:0;
  box-sizing:border-box;
}

body{
  font-family: 'IBM Plex Mono', monospace;
}

.container{
  max-width: 90%;
  margin: 0 auto;
}

a{
  display:inline-block;
  cursor:pointer;
  text-decoration: none;
}

a:hover{
  text-decoration:underline;
}

.img-fluid{
  max-width: 100%;
}

.logo {
    flex: 1;
    display: flex;
    align-items: center;
}

.logo img {
    width: 50px;
    height: 50px;
    margin-right: 10px;
}

.navbar {
    background-color: #ffffff;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 20px;
    position: sticky;
    top: 0;
    z-index: 100;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.navbar a {
    color: rgb(0, 0, 0);
    text-decoration: none;
    padding: 10px 15px;
    transition: background-color 0.3s;
}

.nav-links a.active {
    text-decoration: underline;
}

/* Apply underline on hover */
.nav-links a:hover {
    text-decoration: underline;
}

.navbar-right {
    display: flex;
    align-items: center;
}

.search-container input[type="text"] {
    padding: 8px 2px 10px 40px; /* Adjusted padding for the icon */
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    color: #333;
}

.search-container input[type="text"]::placeholder {
    color: #999;
}

/* Style for the Font Awesome icon */
.search-container::before {
    position: absolute;
    left: 10px;
    top: 50%;
    transform: translateY(-50%);
    color: #666;
}

.cart-icon, .login-icon {
    margin: 0 10px;
    cursor: pointer;
}

  header {
    background-color: #333;
    color: #fff;
    text-align: center;
    padding: 20px 0;
}

h1 {
    font-size: 36px;
}

section.faq {
    background-color: #fff;
    margin: 20px;
    padding: 20px;
    border-radius: 5px;
}

h2 {
    color: #333;
    font-size: 24px;
}

dl {
    list-style: none;
    padding: 0;
}

dt {
    font-weight: bold;
    margin-top: 10px;
    font-size: 18px;
}

dd {
    margin: 5px 0;
    font-size: 16px;
}

    .footer__container {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 2rem;
  padding: 2rem; /* Add padding for spacing around the content */
}

.footer__heading {
  color: var(--text-light);
  font-size: 1rem;
  font-weight: 600;
  padding-bottom: 1rem;
  margin-bottom: 2rem;
  position: relative;
}

.footer__heading::after {
  content: "";
  position: absolute;
  left: 0;
  bottom: 0;
  height: 2px;
  width: 50px;
  background-color: rgb(0, 0, 0);
}

.footer__col p {
  font-size: 0.9rem;
  font-weight: 500;
  margin-bottom: 1rem;
  color: rgb(0, 0, 0);
  cursor: pointer;
  transition: 0.3s;
  margin-right: 0px;
}

.footer__col p:hover {
  color: black;
}

.footer__col p i {
  font-size: 1rem;
  margin-right: 0.5rem;
}

.social-icons {
  display: flex;
  align-items: center;
  gap: 10px;
}

.social-icons a {
  text-decoration: none;
  color: black;
  font-size: 1.2rem;
}

.footer__bar {
  padding: 2rem 1rem;
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  align-items: center;
  gap: 2rem;
}

.copyright {
  font-size: 0.9rem;
  font-weight: 500;
  color: black;
}

.footer__form {
  display: flex;
  align-items: center;
  justify-content: flex-end;
}

.footer__form form {
  width: 100%;
  max-width: 400px;
  display: flex;
  align-items: center;
}

.footer__form input {
  width: 100%;
  padding: 0.75rem 1rem;
  outline: none;
  border: none;
  border-bottom: 1px solid black;
  font-size: 0.8rem;
}

.footer__form .btn {
  background-color: black;
  color: white;
}

/* Adjust the grid layout for larger screens */
@media (min-width: 768px) {
  .footer__container {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
  }

  .footer__col {
    width: auto;
    margin-bottom: 0;
  }
}

/* Further adjustments for even larger screens (e.g., desktop) */
@media (min-width: 1200px) {
  .footer__container {
    grid-template-columns: repeat(4, 1fr);
  }

  .footer__col {
    width: auto;
    margin-bottom: 0;
  }
}

/* Make the social icons responsive */
.social-icons a {
  font-size: 1.5rem; /* Increase font size for better visibility on mobile */
}

/* Adjust the newsletter and copyright layout for larger screens */
@media (min-width: 768px) {
  .footer__bar {
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .newsletter {
    margin-right: 2rem; /* Add some space between the newsletter and copyright */
  }
}

/* Media query for smaller screens */
/* Responsive Styles */
@media screen and (max-width: 768px) {
    /* Navbar */
    .navbar {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 10px;
    }

    .logo {
        margin-bottom: 20px;
    }

    .nav-links {
        display: none;
        flex-direction: column;
        align-items: center;
        width: 100%;
        margin-top: 10px;
    }

    .navbar-right {
        margin-top: 10px;
    }

    .nav-links.active {
        display: flex;
    }

    /* Menu Button */
    .menu-btn {
        display: block;
        cursor: pointer;
    }

    /* Mobile Menu */
    .mobile-menu {
        display: none;
        width: 100%;
        margin-top: 10px;
    }

    .mobile-menu a {
        display: block;
        padding: 10px 0;
        color: white;
        text-align: center;
        text-decoration: none;
        transition: background-color 0.3s;
    }

    .mobile-menu.active {
        display: block;
    }
}

</style>
</body>
</html>