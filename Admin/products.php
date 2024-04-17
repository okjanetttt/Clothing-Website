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
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

// Handle Add Product Form Submission
if (isset($_POST['add_product'])) {
    $p_name = $_POST['p_name'];
    $p_description = $_POST['p_description'];
    $p_price = $_POST['p_price'];
    $p_status = $_POST['p_status'];
    
    // Handle Image 1
    if (!empty($_FILES['p_image']['name'])) {
       $p_image = $_FILES['p_image']['name'];
       $p_image_tmp_name = $_FILES['p_image']['tmp_name'];
       $p_image_folder = 'my-imgs/'.$p_image;
       move_uploaded_file($p_image_tmp_name, $p_image_folder);
    }
 
    // Handle Image 2
    if (!empty($_FILES['p_image2']['name'])) {
       $p_image2 = $_FILES['p_image2']['name'];
       $p_image_tmp_name2 = $_FILES['p_image2']['tmp_name'];
       $p_image_folder2 = 'my-imgs/'.$p_image2;
       move_uploaded_file($p_image_tmp_name2, $p_image_folder2);
    }
 
    // Handle Image 3
    if (!empty($_FILES['p_image3']['name'])) {
       $p_image3 = $_FILES['p_image3']['name'];
       $p_image_tmp_name3 = $_FILES['p_image3']['tmp_name'];
       $p_image_folder3 = 'my-imgs/'.$p_image3;
       move_uploaded_file($p_image_tmp_name3, $p_image_folder3);
    }
 
    // Insert query
    $insert_query = mysqli_query($conn, "INSERT INTO `products` (name, description, price, status, images, images2, images3) VALUES ('$p_name', '$p_description', '$p_price', '$p_status', '$p_image', '$p_image2', '$p_image3')");
 
    if ($insert_query) {
       $message[] = 'Item added successfully';
       // Redirect to refresh the page and display the updated product list
       header('location:products.php');
    } else {
       $message[] = 'Item could not be added';
    }
}

// Handle Update Product Form Submission
if (isset($_POST['update_product'])) {
   $update_p_id = $_POST['update_p_id'];
   $update_p_name = $_POST['update_p_name'];
   $update_p_price = $_POST['update_p_price'];
   
   // Handle Image 1
   if (!empty($_FILES['update_p_image']['name'])) {
      $update_p_image = $_FILES['update_p_image']['name'];
      $update_p_image_tmp_name = $_FILES['update_p_image']['tmp_name'];
      $update_p_image_folder = 'my-imgs/'.$update_p_image;
      move_uploaded_file($update_p_image_tmp_name, $update_p_image_folder);
      // Update logic for image 1 in the database
   }

   // Handle Image 2
   if (!empty($_FILES['update_p_image2']['name'])) {
      $update_p_image2 = $_FILES['update_p_image2']['name'];
      $update_p_image_tmp_name2 = $_FILES['update_p_image2']['tmp_name'];
      $update_p_image_folder2 = 'my-imgs/'.$update_p_image2;
      move_uploaded_file($update_p_image_tmp_name2, $update_p_image_folder2);
      // Update logic for image 2 in the database
   }

   // Handle Image 3
   if (!empty($_FILES['update_p_image3']['name'])) {
      $update_p_image3 = $_FILES['update_p_image3']['name'];
      $update_p_image_tmp_name3 = $_FILES['update_p_image3']['tmp_name'];
      $update_p_image_folder3 = 'my-imgs/'.$update_p_image3;
      move_uploaded_file($update_p_image_tmp_name3, $update_p_image_folder3);
      // Update logic for image 3 in the database
   }

   // Update query
   $update_query = mysqli_query($conn, "UPDATE `products` SET name = '$update_p_name', price = '$update_p_price', images = '$update_p_image', images2 = '$update_p_image2', images3 = '$update_p_image3' WHERE id = '$update_p_id'");

   if ($update_query) {
      $message[] = 'Item updated successfully';
      header('location:products.php');
   } else {
      $message[] = 'Item could not be updated';
      header('location:products.php');
   }
}

if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    // Delete query
    $delete_query = mysqli_query($conn, "DELETE FROM `products` WHERE id = '$delete_id'");
 
    if ($delete_query) {
       $message[] = 'Item deleted successfully';
       // Redirect to refresh the page and display the updated product list
       header('location:products.php');
    } else {
       $message[] = 'Item could not be deleted';
    }
 }
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="css/products.css">
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
    <li><a href="dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
        <li><a href="users.php"><i class="fas fa-users"></i> Users</a></li>
        <li><a href="admins.php"><i class="fas fa-users"></i> Admins</a></li>
        <li  class="active"><a href="products.php"><i class="fas fa-box"></i> Products</a></li>
        <li><a href="articles.php"><i class="fas fa-cog"></i> Articles</a></li>
        <li><a href="orders.php"><i class="fas fa-sign-out-alt"></i> Orders</a></li>
    </ul>
</div>

<!--------------------------------------------------- Add Products Section ---------------------------------------------------------->
<div class="container">
    <form action="" method="post" class="add-product-form" enctype="multipart/form-data">
        <h3>Add a new item</h3><br>
        <div class="form-group">
            <label for="p_name">Product Name</label>
            <input type="text" name="p_name" id="p_name" placeholder="Enter the item name" class="box" required>
        </div>
        <div class="form-group">
            <label for="p_description">Product Description</label>
            <input type="text" name="p_description" id="p_description" placeholder="Enter the product description" class="box" required>
        </div>
        <div class="form-group">
            <label for="p_price">Product Price</label>
            <input type="number" name="p_price" id="p_price" min="0" placeholder="Enter the item price" class="box" required>
        </div>
        <div class="form-group">
            <label for="p_status">Product Status</label>
            <input type="text" name="p_status" id="p_status" placeholder="Enter the product status" class="box" required>
        </div>
        <div class="form-group">
            <label for="p_image">Product Image</label>
            <input type="file" name="p_image" id="p_image" accept="image/png, image/jpg, image/jpeg" class="box" required>
        </div>
        <div class="form-group">
            <label for="p_image2">Product Image 2</label>
            <input type="file" name="p_image2" id="p_image2" accept="image/png, image/jpg, image/jpeg" class="box" required>
        </div>
        <div class="form-group">
            <label for="p_image3">Product Image 3</label>
            <input type="file" name="p_image3" id="p_image3" accept="image/png, image/jpg, image/jpeg" class="box" required>
        </div>
        <div class="form-group">
            <input type="submit" value="Add the Item" name="add_product" class="btn">
        </div>
    </form>

<!---------------------------------------------------- Display Product Table ---------------------------------------------------------->
<section class="display-product-table">
    <table class="product-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Product Image</th>
                <th>Product Name</th>
                <th>Product Description</th>
                <th>Product Price</th>
                <th>Product Status</th>
                <th>Product Images2</th>
                <th>Product Images3</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Fetch and display products
                $select_products = mysqli_query($conn, "SELECT * FROM products ORDER BY id DESC");
                if (mysqli_num_rows($select_products) > 0) {
                    $product_rows = mysqli_fetch_all($select_products, MYSQLI_ASSOC);
                    foreach ($product_rows as $row) {
                        ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><img src="my-imgs/<?php echo $row['images']; ?>" height="100" alt=""></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['description']; ?></td>
                            <td>R<?php echo $row['price']; ?></td>
                            <td><?php echo $row['status']; ?></td>
                            <td><img src="my-imgs/<?php echo $row['images2']; ?>" height="100" alt=""></td>
                            <td><img src="my-imgs/<?php echo $row['images3']; ?>" height="100" alt=""></td>
                            <td>
                                <a href="products.php?delete=<?php echo $row['id']; ?>" class="delete-btn" onclick="return confirm('Are you sure you want to delete this?');">
                                <i class="fas fa-trash"></i>
                            </a>
                            <a href="products.php?edit=<?php echo $row['id']; ?>" class="option-btn">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>
                </tr>
                <?php
                }
            } else {
                echo "<tr><td colspan='7' class='empty'>No product added</td></tr>";
            }
            ?>
            </tbody>
        </table>
    </section>

<!-------------------------------------------------------- Edit Form Container -------------------------------------------------------->
<section class="edit-form-container">
    <?php
    if (isset($_GET['edit'])) {
        $edit_id = $_GET['edit'];
        $edit_query = mysqli_query($conn, "SELECT * FROM `products` WHERE id = $edit_id");
        if (mysqli_num_rows($edit_query) > 0) {
            while ($fetch_edit = mysqli_fetch_assoc($edit_query)) {
                ?>
                <form action="" method="post" enctype="multipart/form-data">
                    <img src="my-imgs/<?php echo $fetch_edit['images']; ?>" height="200" alt="">
                    <input type="hidden" name="update_p_id" value="<?php echo $fetch_edit['id']; ?>">
                    <input type="text" class="box" required name="update_p_name" value="<?php echo $fetch_edit['name']; ?>">
                    <input type="text" class="box" required name="update_description" value="<?php echo $fetch_edit['description']; ?>">
                    <input type="number" min="0" class="box" required name="update_p_price" value="<?php echo $fetch_edit['price']; ?>">
                    <input type="text" min="0" class="box" required name="update_status" value="<?php echo $fetch_edit['status']; ?>">
                    <input type="file" class="box" required name="update_p_image" accept="image/png, image/jpg, image/jpeg">
                    <input type="file" class="box" name="update_p_image2" accept="image/png, image/jpg, image/jpeg">
                    <input type="file" class="box" name="update_p_image3" accept="image/png, image/jpg, image/jpeg">
                    <input type="submit" value="Update the Product" name="update_product" class="btn">
                    <input type="reset" value="Cancel" class="btn" id="close-edit">
                </form>
                <?php
                };
            };
            echo "<script>document.querySelector('.edit-form-container').style.display = 'flex';</script>";
        };
        ?>
    </div>
    </section>

