<?php
$para = $_GET['Id'];
$dbhost = 'localhost:3306';
$dbuser = 'root';
$dbpass = '';
$dbname = 'store_db';

try{
  $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql = "SELECT id, name, price, size, switch, description FROM products WHERE id = {$para}";


  foreach ($conn->query($sql) as $row){
    echo "<a href='index.html'></a>";
    echo    "<h1 id='productName' class='prod-title'></h1>";
    echo    "<div id='image-row' class='image-row'>";
    echo      "<div id='imgModal' class='modal'>";
    echo        "<span class='close'>x</span>";
    echo        "<img class='modal-content' id='img' />";
    echo      "</div>";
    echo      "<div class=\"image-column\"><img src=\"img/{$para}/0.jpg\" class=\"photo\" id=\"img0\" onload='modalZoom(this)'></div>";
    echo      "<div class=\"image-column\"><img src=\"img/{$para}/1.jpg\" class=\"photo\" id=\"img1\" onload='modalZoom(this)'></div>";
    echo      "<div class=\"image-column\"><img src=\"img/{$para}/2.jpg\" class=\"photo\" id=\"img2\" onload='modalZoom(this)'></div>";

    echo    "</div>";

    echo    "<p id='productID'>Product ID: {$row['id']}</p>";
    echo    "<p id='desc' class='prod-details'>Descriptions: {$row['description']}</p>";
    echo    "<p id='price' class='price'>Price: {$row['price']} </p>";
    echo    "<p>Additional Details</p>";
    echo    "<ul>";
    echo      "<li id='size' class='list-items'>Size: {$row['size']}</li>";
    echo      "<li id='key' class='list-items'>Keys:{$row['switch']}</li>";
    echo    "</ul>";

  }
}
catch(PDOException $e){
  echo "Connection Failed: " .$e->getMessage();
}
$conn = null;

