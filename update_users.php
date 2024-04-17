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

if (isset($_GET['user_upd'])) {
    $user_id = $_GET['user_upd'];

    // Fetch user details for pre-populating the form
    $select_query = "SELECT * FROM userss WHERE u_id = $user_id";
    $result = mysqli_query($conn, $select_query);
    $user_data = mysqli_fetch_assoc($result);

    if (!$user_data) {
        echo "User not found.";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Add your meta tags, title, and CSS links here -->
</head>
<body>
    <h1>Edit User</h1>
    <form method="post" action="update_process.php">
        <input type="hidden" name="user_id" value="<?php echo $user_data['u_id']; ?>">
        <!-- Add input fields for user details (e.g., first name, last name, email, etc.) -->
        <button type="submit">Update User</button>
    </form>
</body>
</html>
