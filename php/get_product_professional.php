<?php

require_once "pdo.php";
try{

  $sql = "SELECT id, name, price FROM products WHERE category = 'Professional'";
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
