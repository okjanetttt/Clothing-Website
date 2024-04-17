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


$cartCount = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <title>Cart - Queens & Kings Streetfashion</title>
    <link rel="stylesheet" href="css/cart.css">
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
            echo '<a href="logout.php">Logout</a>';
        } else {
            echo '<a href="login.php">Login</a>';
            echo '<a href="register.php">Register</a>';
        }
        ?>
    </div>
</header>

<!------------------------------------------------------------- Cart Section --------------------------------------------------------->
<?php if (empty($cart)) : ?>
    <p class="empty-message">Your cart is empty!</p>
    <a href="shop.php" class="error-back-button"><span>Continue shopping</span></a>
    
    <?php else : ?>
        <form action="cart.php" method="post">
            <table class='cart-table'>
                <tr>
                    <th>Item</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
                
                <?php
                $cartTotal = 0;
                foreach ($cart as $ID => $quantity) :
                    $query = "SELECT * FROM products WHERE id = ?";
                    if ($stmt = mysqli_prepare($conn, $query)) {
                        mysqli_stmt_bind_param($stmt, "i", $ID);
                        if (mysqli_stmt_execute($stmt)) {
                            $result = mysqli_stmt_get_result($stmt);
                            if ($row = mysqli_fetch_assoc($result)) {
                                $name = $row["name"];
                                $description = $row["description"];
                                $price = $row["price"];
                                $images = $row["images"];
                                $subtotal = $price * $quantity;
                                // Increment the cart total by the subtotal for this item
                                $cartTotal += $subtotal;
                                ?>
                                <tr>
                                    <td>
                                        <img src="my-imgs/<?php echo $images; ?>" style="width: 100px; height: 100px;"><br>
                                        <?php echo $name;?><br><?php echo $description?>
                                    </td>
                                    <td><input type="number" name="quantity[<?php echo $ID; ?>]" value="<?php echo $quantity; ?>" min="1"></td>
                                    <td>R<?php echo $price; ?></td>
                                    <td>
                                        <a href="cart.php?action=remove&product_id=<?php echo $ID; ?>" class='remove_button'>Remove</a>
                                        <button class="update-button" type="submit" name="update_product_<?php echo $ID; ?>">Update</button>
                                    </td>
                                </tr>
                                
                                <?php
                                }
                            }
                        }
                    endforeach;
                    ?>
            </table>
        </div>
                    <br>
                </form>
                <p class="cart-total">Cart Total: R<?php echo $cartTotal; ?></p>
                <div class="cart-actions">
            <a href="shop.php" class="continue-shopping-button" style="background: black; color: white;"><span>Continue shopping</span></a>
            <?php if (isset($_SESSION['user_email'])) : ?>
                <a href="check.php?action=checkout" class="checkout-button">Checkout</a>
            <?php else : ?>
                <a href="login.php" class="checkout-button">Login to Checkout</a>
            <?php endif; ?>
        </div>
    </form>
<?php endif; ?>
<style>
.continue-shopping-button {
  background-color: #000000;
  border: none;
  color: white;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 4px;
  padding: 10px 20px;
}
</style>
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
