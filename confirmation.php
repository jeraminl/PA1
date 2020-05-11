
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <title> Confirmation Page </title>
        <link rel="stylesheet" type="text/css" href="css/product.css" />
        <link rel="stylesheet" type="text/css" href="css/header.css" />
        <link rel="stylesheet" type="text/css" href="css/index.css" />

        <style>
        em {
          font-family: Arial, Helvetica, sans-serif;
          font-size: 160%;
        }
        </style>
        <?php


        $dbhost = 'localhost:3306';
        $dbuser = 'root';
        $dbpass = '';
        $dbname = 'store_db';

        try {
          $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $stmt = $conn->prepare(
            "INSERT INTO orders (firstName, lastName, email, phone, address, city,
            state, zip, productID, ship, units, total)
            VALUES(:first_name, :last_name, :email, :phone, :address,
            :city, :state, :zip, :prodID, :shipping, :numUnits,
            :total)");

          $stmt->bindParam(':first_name', $first_name);
          $stmt->bindParam(':last_name', $last_name);
          $stmt->bindParam(':email', $email);
          $stmt->bindParam(':phone', $phone);
          $stmt->bindParam(':address', $address);
          $stmt->bindParam(':city', $city);
          $stmt->bindParam(':state', $state);
          $stmt->bindParam(':zip', $zip);
          $stmt->bindParam(':prodID', $prodID);
          $stmt->bindParam(':shipping', $shipping);
          $stmt->bindParam(':numUnits', $numUnits);
          $stmt->bindParam(':total', $total);

          $first_name = "";
          $last_name = "";
          $email = "";
          $phone = "";

          $address = "";
          $city = "";
          $state = "";
          $zip = "";

          $billing_first = "";
          $billing_last = "";
          $billing_address = "";
          $billing_city = "";
          $billing_state = "";
          $billing_zip = "";
          $ccNum = $_POST["ccNum"];
          $prodID = $_POST["prodID"];
          $shipping = "";
          $numUnits = $_POST["units"];
          $shipPrice = "";
          $price = $_POST["test"];
          $total = "";


          if (empty($_POST['shipMeth'])){
            echo  'shipping method needs to be provided. <br/>';
            if ($shipping == "1"){
              $shipPrice = 10;
            }
            if ($shipping == "2"){
              $shipPrice = 5;
            }
            if ($shipping == "6"){
              $shipPrice = 0;
            }
          } else {
            $shipping = test_input($_POST['shipMeth']);
            if ($shipping == "1"){
              $shipPrice = 10;
            }
            if ($shipping == "2"){
              $shipPrice = 5;
            }
            if ($shipping == "6"){
              $shipPrice = 0;
            }
          }


          if (empty($_POST['firstName'])){
            echo  'First Name needs to be provided. <br/>';
          } else {
            $first_name = test_input($_POST['firstName']);
          }


          if (empty($_POST['lastName'])){
            echo  'Last Name needs to be provided. <br/>';
          } else {
            $last_name = test_input($_POST['lastName']);
          }


          if(empty($_POST['email'])){
            echo 'An email needs to be provided. <br/>';
          } else {
            $email = $_POST['email'];
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
              echo 'A valid email needs to be provided. <br/>';
            }
          }

          if (empty($_POST['phone'])){
            echo  'Phone needs to be provided. <br/>';
          } else {
            $phone = test_input($_POST['phone']);
          }

          if (empty($_POST['address'])){
            echo  'city needs to be provided. <br/>';
          } else {
            $address = test_input($_POST['address']);
          }

          if (empty($_POST['city'])){
            echo  'city needs to be provided. <br/>';
          } else {
            $city = test_input($_POST['city']);
          }

          if (empty($_POST['state'])){
            echo  'Phone needs to be provided. <br/>';
          } else {
            $state = test_input($_POST['state']);
          }

          if (empty($_POST['zip'])){
            echo  'zip needs to be provided. <br/>';
          } else {
            $zip = test_input($_POST['zip']);
          }

          if (empty($_POST['finalPrice'])){
            echo  'total price needs to be provided. <br/>';
          } else {
            $total = test_input($_POST['finalPrice']);
          }

          if (empty($_POST['billingFirstName'])){
            echo  'First Name needs to be provided. <br/>';
          } else {
            $billing_first = test_input($_POST['billingFirstName']);
          }

          if (empty($_POST['billingLastName'])){
            echo  'Last Name needs to be provided. <br/>';
          } else {
            $billing_last = test_input($_POST['billingLastName']);
          }

          if (empty($_POST['billingAddress'])){
            echo  'Billing Address needs to be provided. <br/>';
          } else {
            $billing_address = test_input($_POST['billingAddress']);
          }

          if (empty($_POST['billingCity'])){
            echo  'city needs to be provided. <br/>';
          } else {
            $billing_city = test_input($_POST['billingCity']);
          }

          if (empty($_POST['billingState'])){
            echo  'state needs to be provided. <br/>';
          } else {
            $billing_state = test_input($_POST['billingState']);
          }


          if (empty($_POST['billingZip'])){
            echo  'zip needs to be provided. <br/>';
          } else {
            $billing_zip = test_input($_POST['billingZip']);
          }

          if (empty($_POST["ccNum"])){
            echo  'cc needs to be provided. <br/>';
          } else {
            $ccNum = test_input($_POST['ccNum']);
          }
          $stmt->execute();
        } catch (PDOException $e) {
          echo "Connection Failed: " . $e->getMessage();
        }
        $conn = null;

        function test_input($data) {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
        }
        ?>
    </head>

    <body>
    <div class="flex-container sansserif">
      <div class="website-header">
        <ul>
          <li class="header-image">
            <a href="index.html">
              <img
                src="blank_keyboard.png"
                alt="Hobby Logo"
                height="160"
                width="400"
              />
            </a>
          </li>
          <li class="header-text">
            <a href="index.html" style="text-decoration: none; color: white;">
              KEYBOARD<br />STORE
            </a>
          </li>
        </ul>
      </div>

      <div class="product">
        <a href="index.html"></a>
        <h1 id="productName" class="prod-title"></h1>

    <p> <class="about-us">
        <em>Thank you for purchasing a keyboard from us!</em> <br><br>

        Order Information<br>
        Name: <?php echo $first_name;?>
            <?php echo $last_name; ?><br>
        Email address: <?php echo $email; ?><br>
        Phone number: <?php echo $phone; ?><br><br>

        Shipping Information <br>
        Address: <?php echo $address; ?><br>
        City: <?php echo $city; ?><br>
        State: <?php echo $state; ?><br>
        Zipcode: <?php echo $zip; ?><br>

        Shipping method: <?php
        if ($shipping == "1"){
            $shipprice = 10;
            echo "overnight";
        }
        if ($shipping == "2"){
            $shipprice = 5;
            echo "2-days expedited";
        }
        if ($shipping == "3"){
            $shipprice = 0;
            echo "6-days ground";
        }
        ?><br><br>

        Billing Information<br>
        Name: <?php echo $billing_first;?>
            <?php echo $billing_last; ?><br>
        Address: <?php echo $billing_address; ?><br>
        City: <?php echo $billing_city; ?><br>
        Card Number: <?php echo $ccNum; ?><br>
        State: <?php echo $billing_state; ?> <br>
        Zip: <?php echo $billing_zip; ?><br><br>

        Costs <br>
        Units: <?php echo $numUnits; ?><br>
        Shipping: $<?php echo $shipprice; ?><br>
        Total: $<?php echo $total; ?><br>
    </p>
    </div>
</body>
</html>
