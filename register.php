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
  $password = $_POST['password']; // Change to 'Password'
  $pswdHash = password_hash($password, PASSWORD_DEFAULT);

  // Fix the query placeholders and values
  $query = "INSERT INTO `userss`(`f_name`, `lastname`, `email`, `phone`, `address`, `username`, `password`, `c_password`) 
            VALUES ('$f_name', '$lastname', '$email', '$phone', '$address', '$username', '$pswdHash', '$pswdHash')";
  
  // Execute the query using your database connection ($conn)
  mysqli_query($conn, $query);
}

// login thingy over here//
if (isset($_POST['resubmit'])) {
  $User = $_POST["email"];
  $pswd = $_POST["password"];
  
  loginUser($conn, $User, $pswd);
}

// Register things
if (isset($_POST['submit'])) {
    $f_name = $_POST['fullname']; // Change to 'fullname'
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $username = $_POST['username'];
    $type = "admin";
    $address = $_POST['address'];
    $password = $_POST['password']; // Change to 'Password'
    $pswdHash = password_hash($password, PASSWORD_DEFAULT);
    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert admin data into the 'admins' table
    $query = "INSERT INTO `admins`(`f_name`, `lastname`, `username`, `email`, `phone`, `address`, `password`)
    VALUES ('$f_name','$lastname','$username','$email','$phone','$address','$password')";

    $stmt = mysqli_prepare($conn, $query);

    if (mysqli_stmt_execute($stmt)) {
        // Admin registration successful
        header("Location: login.php"); // Redirect to admin login page
        exit();
    } else {
        $registrationError = "Registration failed. Please try again.";
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
    <link rel="stylesheet" href="css/register.css">
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

<!------------------------------------------------------------ Register Section ---------------------------------------------------------------->
<div class="container-login">
    <div class="row">
        <div class="box">
            <div class="col-lg-12">
                <h2 class="intro-text text-center"> Register</h2>
            </div>
            <hr><br>
            <div class="col-md-6">
            <form action="register.php" method="POST">
                <div class="form-group">
                    <label for="f_name">Full Name:</label>
                    <input type="text" name="f_name" class="form-control" id="f_name" placeholder="Enter full name" required>
                </div>

                <div class="form-group">
                    <label for="lastname">Last Name:</label>
                    <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Enter last name" required>
                </div>

                <div class="form-group">
                    <label for="Username">Username:</label>
                    <input type="text" name="username" class="form-control" id="Username" placeholder="Enter Username" required>
                </div>

                <div class="form-group">
                    <label for="Email">Email:</label>
                    <input type="text" name="email" class="form-control" id="email" placeholder="Enter email" required>
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
                    <input type="password" name="password" class="form-control" id="password" placeholder="Enter password" required>
                </div>
                
                <button type="submit" name="submit" class="btn btn-default">Submit</button>
            </form>
            <div class="login-links">
                <p><a href="contact.php">Need Help Registering Up?</a></p>
                <p>Have an account? <a href="login.php?ActionType=Register">Login</a></p>
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
