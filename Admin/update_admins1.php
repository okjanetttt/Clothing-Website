<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database = "streetfashion";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['admin_upd'])) {
    $admin_id = $_GET['admin_upd'];

    // Use prepared statements to prevent SQL injection
    $select_query = "SELECT * FROM admins WHERE adm_id = ?";
    $stmt = mysqli_prepare($conn, $select_query);
    mysqli_stmt_bind_param($stmt, "i", $admin_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $admin_data = mysqli_fetch_assoc($result);

    if (!$admin_data) {
        echo "Admin not found.";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="css/update_admins.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
<div class="navbar">
    <div class="logo">
        <a href="shop.php"><img src="../images/logo.jpg" alt=""></a>
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
        <li class="active"><a href="admins.php"><i class="fas fa-users"></i> Admins</a></li>
        <li><a href="products.php"><i class="fas fa-box"></i> Products</a></li>
        <li><a href="articles.php"><i class="fas fa-cog"></i> Articles</a></li>
        <li><a href="#"><i class="fas fa-sign-out-alt"></i> Orders</a></li>
    </ul>
</div>
<br>
<!--------------------------------------------------- Admins Form Section ---------------------------------------------------------->
<div class="form-container">
    <h1>Edit Admin</h1>
    <form method="post" action="update_process.php">
        <input type="hidden" name="admin_id" value="<?php echo $admin_data['adm_id']; ?>">
        <label for="f_name">First Name:</label>
        <input type="text" name="f_name" value="<?php echo $admin_data['f_name']; ?>">
        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" value="<?php echo $admin_data['lastname']; ?>">
        <label for="username">Username:</label>
        <input type="text" name="username" value="<?php echo $admin_data['username']; ?>">
        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $admin_data['email']; ?>">
        <label for="phone">Phone:</label>
        <input type="text" name="phone" value="<?php echo $admin_data['phone']; ?>">
        <label for="address">Address:</label>
        <input type="text" name="address" value="<?php echo $admin_data['address']; ?>">
        <button type="submit">Update Admin</button>
    </form>
</div>

</body>
</html>