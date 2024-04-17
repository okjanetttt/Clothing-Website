<?php
session_start();

// Check if the user is not logged in, then redirect to the login page
if (!isset($_SESSION['email'])) {
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
$Email = $_SESSION['email'];
$sql = "SELECT * FROM admins WHERE email = '$Email'"; // Change 'userss' to your actual table name

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
    <title>Document</title>
    <link rel="stylesheet" href="css/profile-page.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>
<div class="navbar">
    <div class="logo">
        <a href="dashboard.php"><img src="../images/logo.jpg" alt=""></a>
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
        <a href="cart.php"><div class="cart-icon">
            <i class="fas fa-shopping-cart"></i></a>
        </div>
        <?php
        if (isset($_SESSION['email'])) {
            $userEmail = $_SESSION['email'];
            echo "Welcome Admin, $Email ";
            echo '<a href="logout.php">Logout</a>';
        } else {
            echo '<a href="login.php">Login</a> | ';
            echo '<a href="register.php">Register</a>';
        }
        ?>
    </div>
</div>

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
</body>
</html>