<?php

$dbhost = 'localhost:3306';
$dbuser = 'root';
$dbpass = '';
$dbname = 'store_db';

try{
  $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


  $sql = "SELECT id, name, price FROM products WHERE category = 'Office'";
  //$result = mysqli_query($conn, $sql);


  foreach ($conn->query($sql) as $row){
    echo "<div class='grid-item'> ";
    echo "<a href='product.html?Id=". $row['id'] . "' name='" . $row['name'] .
      "' style='color:black;text-decoration:none;' >";
    echo $row['name'];
    echo "<div class='grid-img'>" ;
    echo "<img src='./img/" .$row['id']. "/0.jpg' class='photo'>";
    echo "</div>";
    echo "</a>";
    echo "</div>";
  }

}

catch(PDOException $e){
  echo "Connection Failed: " .$e->getMessage();
}



$conn = null;
