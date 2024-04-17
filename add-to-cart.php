<?php
include_once ('functions-page.php');

function addToCart($ID, $quantity) {
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    if (isset($_SESSION['cart'][$ID])) {
        $_SESSION['cart'][$ID] += $quantity;
    } else {
        $_SESSION['cart'][$ID] = $quantity;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ID = $_POST['id'];
    $quantity = $_POST['quantity'];

    addToCart($ID, $quantity);

    redirect_back();
}
?>