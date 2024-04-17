<?php
include_once('functions-page.php');

// signup
if(isset($_POST['submit'])){
  $f_name = $_POST['fullname']; // Change to 'fullname'
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $username = $_POST['username'];
  $type = "user";
  $address = $_POST['address'];
  $password = $_POST['Password']; // Change to 'Password'
  $pswdHash = password_hash($password, PASSWORD_DEFAULT);

  // Fix the query placeholders and values
  $query = "INSERT INTO `admins`(`f_name`, `lastname`, `email`, `phone`, `address`, `username`, `password`) 
            VALUES ('$f_name', '$lastname', '$email', '$phone', '$address', '$username', '$pswdHash')";
  
  // Execute the query using your database connection ($conn)
  mysqli_query($conn, $query);
}

// login thingy over here//
if (isset($_POST['resubmit'])) {
  $User = $_POST["email"];
  $pswd = $_POST["password"];
  
  loginUser($conn, $User, $pswdHash);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Queen's & King's - Register</title>
    <link rel="stylesheet" href="css/yaa.css">
    <link rel="icon" href="https://img.icons8.com/windows/32/000000/diamond.png" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
</head>
<body>
<!------------------------------------------------------------ Navigation Section ---------------------------------------------------------------->
<header>
    <div class="row">
        <div class="col">
            <a class="logo" href="shop.php"><i class="fa fa-diamond"></i></a>
        </div>
        <div class="navbar">
            <a href="newshop.php">New Arrivals</a>
            <a href="women.php">Women</a>
            <a href="men.php">Men</a>
            <a href="homeware.php">Homeware</a>
            <a href="sneaker.php">Sneaker Laundry</a>
            <a href="contact.php">Contact Us</a>
        </div>
        <div class="col">
            <a href="login.php">Login</a>
            <a href="#" class="account"><i class="fa fa-user" aria-hidden="true"></i> Account</a>
            <a href="cart.php" class="cart"><i class="fa fa-cart-plus" aria-hidden="true"></i> Cart</a>
        </div>
    </div>
</header>

<!------------------------------------------------------------ Login Section ---------------------------------------------------------------->
<div class="container">
    <div class="row">
        <div class="col-md-6">
        <h2 class="intro-text text-center">Register</h2>
        <form action="register.php" method="post">
            <div class="form-group">
                <label for="fullname">Full name:</label>
                <input type="text" name="fullname" class="form-control" id="fullname" placeholder="Full name" required>
            </div>

            <div class="form-group">
                <label for="lastname">Last name:</label>
                <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Last name" required>
            </div>

            <div class="form-group">
                <label for="Username">Username:</label>
                <input type="text" name="username" class="form-control" id="Username" placeholder="Enter Username" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" name="email" class="form-control" id="email" placeholder="Email" required>
            </div>

            <div class="form-group">
                <label for="email">Phone:</label>
                <input type="number" name="phone" class="form-control" id="phone" placeholder="Phone" required>
            </div>
            
            <div class="form-group">
                <label for="email">Address:</label>
                <input type="text" name="address" class="form-control" id="address" placeholder="Address" required>
            </div>

            <div class="form-group">
                <label for="Password">Password:</label>
                <input type="password" name="Password" class="form-control" id="Password" placeholder="Enter password" required>
            </div>
            
            <button type="submit" name="submit" class="btn btn-default">Submit</button>
        </form>
        <div class="login-links">
            <p><a href="#">Need Help Signing Up?</a></p>
            <p>Have an account? <a href="login.php?ActionType=Register">Login</a></p>
        </div>
    </div>
</div>
</div> 

</body>
</html>