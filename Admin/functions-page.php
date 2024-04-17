<?php
session_start();

$dbservername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "streetfashion";

$conn = mysqli_connect($dbservername, $dbusername, $dbpassword);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

mysqli_select_db($conn, $dbname);

function loginUser($conn, $email, $password) {
    $email = mysqli_real_escape_string($conn, $email);

    // Use a prepared statement to prevent SQL injection
    $query = "SELECT `password` FROM userss WHERE email = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $hashedPassword = $row['password'];
        
        if (password_verify($password, $hashedPassword)) {
            return true; // Successful login
        }
    }

    return false; // Unsuccessful login
}

// Admin Stuff
function adminLogin($conn, $email, $password) {
    $email = mysqli_real_escape_string($conn, $email);

    $query = "SELECT `password` FROM admins WHERE email = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $hashedPassword = $row['password'];

        if (password_verify($password, $hashedPassword)) {
            return true; // Successful admin login
        }
    }

    return false; // Unsuccessful admin login
}

$adminLoginError = "";

// Check if the admin form has been submitted
if (isset($_POST['admin_resubmit'])) {
    $adminEmail = $_POST["admin_email"];
    $adminPassword = $_POST["admin_password"];

    if (adminLogin($conn, $adminEmail, $adminPassword)) {
        // Store admin's email in session or perform other admin-specific actions
        $_SESSION['admin_email'] = $adminEmail;
        header("Location: ADMIN/dashboards.php");
        exit();
    } else {
        $adminLoginError = "Invalid email or password. Please try again.";
    }
}


// redirect thing

function redirect_back()
{
    echo ("<script type=\"text/javascript\">
    window.history.go(-1);
    </script>");
}

// Call the redirect_back() function
// redirect_back();