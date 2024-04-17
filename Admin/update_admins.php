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
    <link rel="stylesheet" href="css/update_admins.css">
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            width: 300px;
        }

        h1 {
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 6px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Edit Admin</h1>
        <form method="post" action="update_admin_process.php">
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
