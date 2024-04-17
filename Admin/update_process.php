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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $admin_id = $_POST['admin_id'];
    $f_name = $_POST['f_name'];
    $last_name = $_POST['last_name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    // Update admin details in the database
    $update_query = "UPDATE admins SET f_name = ?, lastname = ?, username = ?, email = ?, phone = ?, address = ? WHERE adm_id = ?";
    $stmt = mysqli_prepare($conn, $update_query);
    mysqli_stmt_bind_param($stmt, "ssssssi", $f_name, $last_name, $username, $email, $phone, $address, $admin_id);

    if (mysqli_stmt_execute($stmt)) {
        echo "Admin details updated successfully.";
    } else {
        echo "Error updating admin details: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>
