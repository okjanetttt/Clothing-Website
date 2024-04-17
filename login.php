<?php
include_once('functions-page.php');

$loginError = ""; // Initialize the error message

// Check if the form has been submitted
if (isset($_POST['resubmit'])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    if (loginUser($conn, $email, $password)) {
        $_SESSION['user_email'] = $email; // Store user's email in session
        header("Location: shop.php"); // Redirect to shop.php
        exit();
    } else {
        $loginError = "Invalid email or password. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <title>Homeware - Queens & Kings Streetfashion</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
<header>
    <div class="logo">
        <img src="images/logo.jpg" alt="Logo">
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

<!------------------------------------------------------------ Users Login Section ---------------------------------------------------------------->
<div class="container-login">
    <div class="row">
        <div class="box">
            <div class="col-lg-12">
                <h2 class="intro-text text-center"> Login</h2>
            </div>
            <hr><br>
            <div class="col-md-6">
            <form action="login.php" method="POST">
                <div class="form-group">
                    <label for="Email">Email:</label>
                    <input type="text" name="email" class="form-control" id="email" placeholder="Enter email" required>
                </div>
                        
                <div class="form-group">
                    <label for="Password">Password:</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Enter password" required>
                </div>
                <button type="submit" name="resubmit" class="btn btn-default">Login</button>
            </form>

            <div class="login-links">
                <?php
                if (isset($loginError)) {
                    echo '<p class="error-message" style="color: red;">' . $loginError . '</p>';
                }
                ?>
                <p><a href="contact.php">Need Help Logging In?</a></p>
                <p>Don't have an account? <a href="register.php">Sign Up</a></p>
            </div>
        </div>
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
</body>
</html>
