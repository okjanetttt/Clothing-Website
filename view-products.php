<?php
// Start the session
session_start();

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$database = "streetfashion";

// Establish the database connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check the database connection
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

// Initialize variables
$product = null;
$id = isset($_GET['id']) ? $_GET['id'] : null;
$name = $description = $price = $images = $images2 = $images3 = '';

// Fetch product data from the database
if ($id !== null) {
    $query = "SELECT * FROM `products` WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $id);
        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);
            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);
                $images = $row['images'];
                $name = $row['name'];
                $description = $row['description'];
                $price = $row['price'];
                $images2 = $row['images2'];
                $images3 = $row['images3'];
            } else {
                $productNotFound = true;
            }
        }
    }
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <title>View Products - Queens & Kings Streetfashion</title>
    <link rel="stylesheet" href="css/view-page.css">
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

<!--------------------------------------------------------- View Page Begins ---------------------------------------------------------------->
<div class="flex-box">
    <div class="left">
        <div class="big-img">
            <img src="my-imgs/<?php echo $images; ?>">
        </div>
        <!-- Small images are now under the right section -->
    </div>
    
    <div class="right">
        <div class="pname"><?php echo $name; ?></div>
        <div class="pdesc"><?php echo $description; ?></div>
        <!-- <div class="ratings">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
        </div> -->
        <div class="price">R<?php echo $price; ?></div>
        <!-- <div class="size">
            <p>Size :</p>
            <div class="psize active">M</div>
            <div class="psize">L</div>
            <div class="psize">XL</div>
            <div class="psize">XXL</div>
        </div> -->
        <div class="quantity" >
            <p>Quantity:</p>
        </div>
        <div class="btn-box">
            <?php
                echo "
                <form action='add-to-cart.php' method='post'>
                    <input type='hidden' name='id' value='$id'>
                    <input type='number' name='quantity' value='1' style='width:10%'>
                ";
                if (isset($_SESSION["p$id"])) {
                    echo "
                        <button name='remove_from_cart' class='btn' type='submit'>Remove from Cart</button>
                    ";
                } else {
                    echo "
                        <button name='add_to_cart' class='btn' type='submit'>Add to Cart</button>
                    ";
                }
                echo "</form>";
            ?>
        </div>

        <!-- Small images are moved here -->
        <div class="image-container" style="margin-right: 87%;">
            <img src="my-imgs/<?php echo $images2; ?>" onclick="showImg(this.src)" class="small-img">
            <img src="my-imgs/<?php echo $images3; ?>" onclick="showImg(this.src)" class="small-img">
            <a href="javascript:history.back();" class="go-back-btn">Back</a>
        </div>
    </div>
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

<script>
    let bigImg = document.querySelector('.big-img img');
    function showImg(pic){
        bigImg.src = pic;
    }
</script>

<script src="https://kit.fontawesome.com/c7cf5c000f.js" crossorigin="anonymous"></script>
</body>
</html>
