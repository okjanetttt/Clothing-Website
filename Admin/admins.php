<?php
session_start();
// session_unset();
// echo "Session unset";

// Replace these with your actual database credentials
$servername = "localhost";
$username = "root";
$password = "";
$database = "streetfashion";

// Create a connection to the database
$conn = mysqli_connect($servername, $username, $password, $database);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Queen's & King's Streetwear - User's Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="css\users.css">
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
        <li><a href="dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
        <li><a href="users.php"><i class="fas fa-users"></i> Users</a></li>
        <li class="active"><a href="admins.php"><i class="fas fa-users"></i> Admins</a></li>
        <li><a href="products.php"><i class="fas fa-box"></i> Products</a></li>
        <li><a href="articles.php"><i class="fas fa-cog"></i> Articles</a></li>
        <li><a href="#"><i class="fas fa-sign-out-alt"></i> Orders</a></li>
    </ul>
</div>

<!-------------------------------------------------------- Admin's Section  ---------------------------------------------------------------------->
<div class="page-wrapper">
    <div style="padding-top: 10px;">
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="col-lg-12">
                <div class="card card-outline-primary">
                    <div class="card-header">
                        <h4 class="m-b-0 text-white">All Admins</h4>
                    </div>
                    <div class="table-responsive m-t-40">
                        <table id="myTable" class="table table-bordered table-striped table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>FirstName</th>
                                    <th>LastName</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <!-- <th>Password</th> -->
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
<?php
$sql="SELECT * FROM admins ";
$query = mysqli_query($conn, $sql);
if(!mysqli_num_rows($query) > 0 )
{
    echo '<td colspan="7"><center>No Admins</center></td>';
}
else
{				
    while($rows=mysqli_fetch_array($query))
    {
        echo '<tr><td>'.$rows['f_name'].'</td>
        <td>'.$rows['lastname'].'</td>
        <td>'.$rows['username'].'</td>
        <td>'.$rows['email'].'</td>
        <td>'.$rows['phone'].'</td>
        <td>'.$rows['address'].'</td>
       
        <td><a href="delete_admin.php?admin_del='.$rows['adm_id'].'" class="btn btn-danger btn-flat btn-addon btn-xs m-b-10"><i class="fa fa-trash" style="font-size:16px"></i></a> 
        <a href="update_admins1.php?admin_upd='.$rows['adm_id'].'" " class="btn btn-info btn-flat btn-addon btn-sm m-b-10 m-l-5"><i class="fa fa-edit"></i></a>
        </td></tr>';
    }	
}
?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
