<?php

include_once('functions-page.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $enteredPassword = $_POST['password'];
    $hashedEnteredPassword = password_hash($enteredPassword, PASSWORD_DEFAULT);


    $query = "SELECT * FROM admins WHERE email = '$email'";
    $result = mysqli_query($conn, $query);
    
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($enteredPassword, $row['password'])) {
            $_SESSION['email'] = $email;
            header('Location: dashboard.php');
        } else {
            $error = "Invalid credentials";
        }
    } else {
        $error = "Invalid credentials";
    }
}    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>
<div class="navbar">
    <div class="logo">
        <a href="shop.php"><img src="../images/logo.jpg" alt=""></a>
    </div>
    
    <div class="nav-links">
        <a href="new-arrivals.php">New Arrivals</a>
        <a href="women.php">Women</a>
        <a href="men.php">Men</a>
        <a href="homeware.php">Homeware</a>
        <a href="sneaker.php">Sneaker Laundry</a>
    </div>
    
    <div class="navbar-right">
        <div class="search-container">
            <input type="text" placeholder="Search...">
        </div>
        <a href="car"><div class="cart-icon">
            <i class="fas fa-shopping-cart"></i></a>
        </div>
        <!-- <a href="login.php">Login</a>
          | -->
        <a href="register.php">Register</a>
    </div>
</div>

<!------------------------------------------------------------ Users Login Section ---------------------------------------------------------------->
<div class="container-login">
    <div class="row">
        <div class="box">
            <div class="col-lg-12">
                <h2 class="intro-text text-center"> Login</h2>
            </div>
            <hr><br>
            <div class="col-md-6">
            <form action="" method="POST">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="resubmit">Login</button>
            </form>
            <div class="login-links">
            <?php if (isset($error)) { echo "<p class='error' style='color: red'>$error</p>"; } ?>
                <p><a href="contact.php">Need Help Logging In?</a></p>
                <p>Don't have an account? <a href="register.php">Sign Up</a></p>
            </div>
        </div>
    </div>
</div>

</body>
</html>