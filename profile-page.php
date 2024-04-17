<?php
session_start();

// Calculate the total cart count
if (isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
    $total = count($cart);
} else {
    $total = 0; // Default to 0 if the cart session variable is not set
}

// Check if the user is not logged in, then redirect to the login page
if (!isset($_SESSION['user_email'])) {
    header("Location: login.php");
    exit();
}

if (isset($_SESSION['profile_update_message'])) {
    $profileUpdateMessage = $_SESSION['profile_update_message'];
    unset($_SESSION['profile_update_message']);
}

// Replace these with your actual database credentials
$servername = "localhost";
$username = "root";
$password = "";
$database = "streetfashion";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch user's information from the database based on the user's email (from the session)
$userEmail = $_SESSION['user_email'];
$sql = "SELECT * FROM userss WHERE email = '$userEmail'"; // Change 'userss' to your actual table name

$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $f_name = $row["f_name"];
    $lastname = $row["lastname"];
    $username = $row["username"];
    $email = $row["email"];
    $phone = $row["phone"];
    $address = $row["address"];
    $password = $row["password"];
} else {
    // Handle no users or redirect to an error page
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <title>Profile Page - Queens & Kings Streetfashion</title>
    <link rel="stylesheet" href="css/profile-page.css">
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

<!----------------------------------------------------------- Profile Section ------------------------------------------------------------------>
<div class="page-wrapper">
        <div style="padding-top: 10px;"></div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="col-lg-12">
                        <div class="card card-outline-primary">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Your Profile</h4>
                            </div>
                            <div class="table-responsive m-t-40">
                                <form action="update_profile.php" method="post">
                                    <table class="table table-bordered table-striped table-hover">
                                        <tr>
                                            <th>First Name</th>
                                            <td><input type="text" name="f_name" value="<?php echo $f_name; ?>"></td>
                                        </tr>
                                        <tr>
                                            <th>Last Name</th>
                                            <td><input type="text" name="lastname" value="<?php echo $lastname; ?>"></td>
                                        </tr>
                                        <tr>
                                            <th>Userame</th>
                                            <td><input type="text" name="username" value="<?php echo $username; ?>"></td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td><input type="text" name="email" value="<?php echo $email; ?>"></td>
                                        </tr>
                                        <tr>
                                            <th>Phone</th>
                                            <td><input type="number" name="phone" value="<?php echo $phone; ?>"></td>
                                        </tr>
                                        <tr>
                                            <th>Address</th>
                                            <td><input type="text" name="address" value="<?php echo $address; ?>"></td>
                                        </tr>
                                        <tr>
                                            <th>Password</th>
                                            <td><input type="text" name="password" value="<?php echo $password; ?>"></td>
                                        </tr>
                                    </table><br>
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </form>
                                <?php
                                if (isset($_GET['message'])) {
                                    $message = $_GET['message'];
                                    if ($message === 'success') {
                                        echo '<div class="profile-update-success" style="color: green;">Profile update successful!</div>';
                                    } elseif ($message === 'failed') {
                                        echo '<div class="profile-update-failed" style="color: red;">Profile update failed.</div>';
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /************************************************************ Profile Page Section **************************************************************/
.page-wrapper {
  margin: 20px;
}

.card-outline-primary {
  border: 1px solid #000000;
  border-radius: 10px;
  margin-bottom: 20px;
}

.card-header {
  background-color: #000000;
  color: white;
  padding: 10px 15px;
}

.table {
  width: 100%;
  border-collapse: collapse;
}

.table th,
.table td {
  padding: 10px;
  border: 1px solid #ccc;
}

.table th {
  background-color: #ffffff;
  text-align: left;
  width: 30%;
}

.table input[type="text"],
.table input[type="number"] {
  width: 100%;
  padding: 8px;
  border: 1px solid #000000;
  border-radius: 5px;
}

.btn-primary {
  background-color: #000000;
  border: none;
  color: white;
  padding: 8px 16px;
  border-radius: 5px;
  margin-left: 1%;
  margin-bottom: 1%;
  cursor: pointer;
}

.btn-primary:hover {
  background-color: #252627;
}

</style>

<script src="https://kit.fontawesome.com/c7cf5c000f.js" crossorigin="anonymous"></script>
</body>
</html>