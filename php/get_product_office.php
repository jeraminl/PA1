<?php

  $dbhost = 'localhost:3306';
  $dbuser = 'root';
  $dbpass = '';
  $dbname = 'store_db';
  $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "SELECT id, name, price FROM products WHERE category = 'Office'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
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



  mysqli_close($conn);
