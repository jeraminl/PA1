<?php
$fNameErr = $lNameErr = $emailErr = $phoneErr = $addressErr = $cityErr = $stateErr =
  $zipErr = $shipErr = $ccFNameErr = $ccLNameErr = $ccNumErr = $ccExpMonthErr = $ccExpYearErr =
  $cvvErr = $shipAddressErr = $shipCityErr = $shipStateErr = $shipZipErr = $unitsErr = "";


$fName = $lName = $email = $phone = $address = $city = $state =
$zip = $ship = $ccFName = $ccLName = $ccNum = $ccExpMonth = $ccExpYear =
$cvv = $billAddress = $billCity = $billState = $billZip = $units = "";



if (empty($_POST['firstName'])){
  echo  'First Name needs to be provided. <br/>';
} else {
  $fName = test_input($_POST['firstName']);
}


if (empty($_POST['lastName'])){
  echo  'Last Name needs to be provided. <br/>';
} else {
  $lName = test_input($_POST['lastName']);
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

if (empty($_POST['billingFirstName'])){
  echo  'First Name needs to be provided. <br/>';
} else {
  $ccFName = test_input($_POST['billingFirstName']);
}

if (empty($_POST['billingLastName'])){
  echo  'Last Name needs to be provided. <br/>';
} else {
  $ccLName = test_input($_POST['billingLastName']);
}

if (empty($_POST['billingAddress'])){
  echo  'Billing Address needs to be provided. <br/>';
} else {
  $billAddress = test_input($_POST['billingAddress']);
}

if (empty($_POST['billingCity'])){
  echo  'city needs to be provided. <br/>';
} else {
  $billCity = test_input($_POST['billingCity']);
}

if (empty($_POST['billingState'])){
  echo  'state needs to be provided. <br/>';
} else {
  $billState = test_input($_POST['billingState']);
}


if (empty($_POST['billingZip'])){
  echo  'zip needs to be provided. <br/>';
} else {
  $billZip = test_input($_POST['billingZip']);
}





function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


?>
