<?php
$para = $_GET['zip'];
$dbhost = 'localhost:3306';
$dbuser = 'root';
$dbpass = '';
$dbname = 'store_db';

try{
  $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql = "SELECT State, ZipCode, CombinedRate FROM taxTable WHERE ZipCode = {$para}";


  foreach ($conn->query($sql) as $row){
    echo "<p>Tax: $<span id=\"taxPrice\"> {$row['CombineRate']} </span></p>";
  }
}
catch(PDOException $e){
  echo "Connection Failed: " .$e->getMessage();
}
$conn = null;

