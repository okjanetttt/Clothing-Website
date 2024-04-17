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

if (isset($_GET['user_del'])) {
    $user_id = $_GET['user_del'];

    // Perform delete query
    $delete_query = "DELETE FROM userss WHERE u_id = $user_id";
    if (mysqli_query($conn, $delete_query)) {
        header("Location: users.php");
        exit();
    } else {
        echo "Error deleting user: " . mysqli_error($conn);
    }
}

if (isset($_GET['adm_del'])) {
    $adm_id = $_GET['adm_del'];

    // Perform delete query
    $delete_query = "DELETE FROM admins WHERE adm_id = $adm_id";
    if (mysqli_query($conn, $delete_query)) {
        header("Location: users.php");
        exit();
    } else {
        echo "Error deleting admin: " . mysqli_error($conn);
    }
}
?>