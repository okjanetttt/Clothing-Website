<?php
include_once 'db.php';

$errors = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["firstname"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $province = $_POST["state"];
    $postal_code = $_POST["zip"];
    $name_card = $_POST["cardname"];
    $credit_number = $_POST["cardnumber"];
    $exp_month = $_POST["expmonth"];
    $exp_year = $_POST["expyear"];
    $cvv = $_POST["cvv"];

    // Validate inputs (You should implement proper validation)

    if (empty($errors)) {
        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO orders (name, email, address, city, province, postal_code, name_card, credit_number, exp_month, exp_year, cvv) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssssssss", $name, $email, $address, $city, $province, $postal_code, $name_card, $credit_number, $exp_month, $exp_year, $cvv);

        if ($stmt->execute()) {
            $order_id = $stmt->insert_id;
            $stmt->close();
            $conn->close();
            header("Location: order_confirmation.php?id=$order_id");
            exit;
        } else {
            $errors[] = "Error: " . $stmt->error;
        }
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/check.css">
</head>
<body>

<div class="row">
  <div class="col-75">
    <div class="container">
      <form action="../orders.php" method="POST">
      
        <div class="row">
          <div class="col-50">
            <h3>Billing Address</h3>
            <label for="name"><i class="fa fa-user"></i>Name</label>
            <input type="text" id="fname" name="firstname" placeholder="John M. Doe" required>
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="john@example.com" required>
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="adr" name="address" placeholder="542 W. 15th Street" required>
            <label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text" id="city" name="city" placeholder="New York" required>

            <div class="row">
              <div class="col-50">
                <label for="province">Province</label>
                <input type="text" id="province" name="province" placeholder="MP" required>
              </div>
              <div class="col-50">
                <label for="postal">Postal Code</label>
                <input type="text" id="zip" name="zip" placeholder="10001" required>
              </div>
            </div>
          </div>

          <div class="col-50">
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" placeholder="John More Doe" required>
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444" required>
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="September" required>
            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="2018" required>
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="352" required>
              </div>
            </div>
          </div>
          
        </div>
        <label>
          <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
        </label>
        <input type="submit" value="Continue to checkout" class="btn">
      </form>
    </div>
  </div>
  <div class="col-25">
    <div class="container">
      <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b>4</b></span></h4>
      <p><a href="#">Product 1</a> <span class="price">R15</span></p>
      <p><a href="#">Product 2</a> <span class="price">R5</span></p>
      <p><a href="#">Product 3</a> <span class="price">R8</span></p>
      <p><a href="#">Product 4</a> <span class="price">R2</span></p>
      <hr>
      <p>Total <span class="price" style="color:black"><b>R30</b></span></p>
    </div>
  </div>
</div>

</body>
</html>
