<?php
session_start();
session_destroy(); // Destroy the session data
header("Location: ../shop.php"); // Redirect back to shop.php after logout
exit();
?>
