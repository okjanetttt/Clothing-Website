<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database = "streetfashion";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $f_name = $_POST["f_name"];
    $lastname = $_POST["lastname"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $password = $_POST["password"];

    // Update user's information in the database
    $updateSql = "UPDATE userss SET f_name=?, lastname=?, username=?, email=?, phone=?, address=?, password=? WHERE username=?";
    $stmt = $conn->prepare($updateSql);
    $stmt->bind_param("ssssisss", $f_name, $lastname, $username, $email, $phone, $address, $password, $username);
    if ($stmt->execute()) {
        $_SESSION['profile_update_message'] = 'Profile updated successfully!';
    } else {
        $_SESSION['profile_update_message'] = 'Error updating profile: ' . $stmt->error;
    }
    $stmt->close();
}

$conn->close();
header("Location: profile-page.php");
exit();
?>