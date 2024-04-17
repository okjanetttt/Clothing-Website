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
    <title>Men - Queens & Kings Streetfashion</title>
    <link rel="stylesheet" href="css/men.css">
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
            <li><a href="men.php" class="active">Men</a></li>
            <li><a href="homeware.php">Homeware</a></li>
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
</header>

<!-------------------------------------------------------- Product Section---------------------------------------------------------------->
<div class="product-grid">
    <?php
    // $query = "SELECT * FROM `products` WHERE status = 'Men' ORDER BY RAND() LIMIT 4";
    $query = "SELECT * FROM `products` WHERE status = 'Men' LIMIT 4";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $name = $row['name'];
            $description = $row['description'];
            $price = $row['price'];
            $images = $row['images'];
            ?>
            
            <div class="product-card">
                <a href="view-products.php?id=<?php echo $id; ?>" class="product-link">
                <img class="product-image" src="my-imgs/<?php echo $images; ?>" alt="<?php echo $name; ?>">
                <h2 class="product-title"><?php echo $name; ?></h2>
                <p class="product-desc"><?php echo $description; ?></p>
                <p class="product-price">R<?php echo $price; ?></p>
            </a>
        </div>
        <?php
        }
    } else {
        echo "<p>No products found.</p>";
    }
    ?>
</div>

<div class="product-grid">
    <?php
    // $query = "SELECT * FROM `products` WHERE status = 'Mens' ORDER BY RAND() LIMIT 4";
    $query = "SELECT * FROM `products` WHERE status = 'Mens' LIMIT 4";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $name = $row['name'];
            $description = $row['description'];
            $price = $row['price'];
            $images = $row['images'];
            ?>
            
            <div class="product-card">
                <a href="view-products.php?id=<?php echo $id; ?>" class="product-link">
                <img class="product-image" src="my-imgs/<?php echo $images; ?>" alt="<?php echo $name; ?>">
                <h2 class="product-title"><?php echo $name; ?></h2>
                <p class="product-desc"><?php echo $description; ?></p>
                <p class="product-price">R<?php echo $price; ?></p>
            </a>
        </div>
        <?php
        }
    } else {
        echo "<p>No products found.</p>";
    }
    ?>
</div>

<div class="product-grid">
    <?php
    // $query = "SELECT * FROM `products` WHERE status = 'Ens' ORDER BY RAND() LIMIT 4";
    $query = "SELECT * FROM `products` WHERE status = 'Ens' LIMIT 4";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $name = $row['name'];
            $description = $row['description'];
            $price = $row['price'];
            $images = $row['images'];
            ?>
            
            <div class="product-card">
                <a href="view-products.php?id=<?php echo $id; ?>" class="product-link">
                <img class="product-image" src="my-imgs/<?php echo $images; ?>" alt="<?php echo $name; ?>">
                <h2 class="product-title"><?php echo $name; ?></h2>
                <p class="product-desc"><?php echo $description; ?></p>
                <p class="product-price">R<?php echo $price; ?></p>
            </a>
        </div>
        <?php
        }
    } else {
        echo "<p>No products found.</p>";
    }
    ?>
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

<script src="https://kit.fontawesome.com/c7cf5c000f.js" crossorigin="anonymous"></script>
</body>
</html>
