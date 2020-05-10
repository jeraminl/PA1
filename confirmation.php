    <html>
    <html lang="en">
    <head>
        <meta charset="UTF-8" />  
        <title> Confirmation Page </title>
        <link rel="stylesheet" type="text/css" href="css/product.css" />
        <link rel="stylesheet" type="text/css" href="css/header.css" />
        <link rel="stylesheet" type="text/css" href="css/index.css" />

        <script src="js/confirmation.js"> </script>
        <style>
        em {
          font-family: Arial, Helvetica, sans-serif;
          font-size: 160%;
        }
        </style>
        <?php
        $first_name = $_POST["firstName"];
        $last_name = $_POST["lastName"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];

        $address = $_POST["address"];
        $city = $_POST["city"];
        $state = $_POST["state"];
        $zip = $_POST["zip"];

        $billing_first = $_POST["billingFirstName"];
        $billing_last = $_POST["billingLastName"];
        $billing_address = $_POST["billingAddress"];
        $billing_city = $_POST["billingCity"];
        $billing_state = $_POST["billingState"];
        $billing_zip = $_POST["billingZip"];
        $ccNum = $_POST["ccNum"];

        $shipping = $_POST["shipMeth"];
        $numUnits = $_POST["units"];
        $shipprice = 0;
        $price = $_POST["test"];
        $total = $price * $numUnits;
        ?>
    </head>

    <body onload="load()">
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
        $total = $total + $shipprice;
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

    <?php
    $dbhost = 'localhost:3306';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = 'store_db';
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    $sql = "INSERT INTO orders (firstName, lastName, email, phone, address, city, 
            state, zip, ship, units, shipping, total, card_number)
            VALUES('$first_name', '$last_name', '$email', '$phone', '$address', 
            '$city', '$state', '$zip', '$shipping', '$numUnits', '$shipprice', 
            '$total', '$ccNum')";
    mysqli_query($conn, $sql);

    mysqli_close($conn);
    ?>
</body>
</html>