<?php
include_once 'db.php';
session_start()
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="css/orders.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
<div class="navbar">
    <div class="logo">
        <a href="../shop.php"><img src="../images/logo.jpg" alt=""></a>
    </div>
    
    <div class="nav-links">
        <a href="../new-arrivals.php">New Arrivals</a>
        <a href="../women.php">Women</a>
        <a href="../men.php">Men</a>
        <a href="../homeware.php">Homeware</a>
        <a href="../sneaker.php">Sneaker Laundry</a>
        <a href="../contact.php">Contact Us</a>
    </div>
    
    <div class="navbar-right">
        <div class="search-container">
            <input type="text" placeholder="Search...">
        </div>
        <a href="car"><div class="cart-icon">
            <i class="fas fa-shopping-cart"></i></a>
        </div>
        <?php
        if (isset($_SESSION['email'])) {
            $Email = $_SESSION['email'];
            echo "Welcome Admin, $Email ";
            echo '<a href="profile-page.php"><i class="fa-solid fa-user"></i></a>';
            echo '<a href="logout.php">Logout</a>';
        } else {
            echo '<a href="login.php">Login</a> | ';
            echo '<a href="register.php">Register</a>';
        }
        ?>
    </div>
</div>

<!--------------------------------------------------- Admin Dashoard Section ---------------------------------------------------------->
<div id="sidebar">
    <h2>Admin Dashboard</h2>
    <ul class="nav">
        <li><a href="#"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
        <li><a href="users.php"><i class="fas fa-users"></i> Users</a></li>
        <li><a href="admins.php"><i class="fas fa-users"></i> Admins</a></li>
        <li><a href="products.php"><i class="fas fa-box"></i> Products</a></li>
        <li><a href="articles.php"><i class="fas fa-cog"></i> Articles</a></li>
        <li class="active"><a href="orders.php"><i class="fas fa-sign-out-alt"></i> Orders</a></li>
    </ul>
</div>

<!--------------------------------------------------- Orders Section ---------------------------------------------------------->
<div class="order-text">
    <h2 style="margin-left: 15%;">All Orders</h2>
</div>

<form action="orders.php" method="post">
    <table class='orders-table'>
        <tr>
        <th>User</th>
        <th>Product Item</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Address</th>
        <th>Status</th>
        <th>Reg-Date</th>
        <th>Action</th>
        </tr>
     
    </table>
</form>