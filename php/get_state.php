<?php
$para = $_GET['zip'];
require_once "pdo.php";
try{
  $sql = "SELECT State FROM taxTable WHERE ZipCode = {$para}";


  foreach ($conn->query($sql) as $row){
    echo "{$row['State']}";
  }
}
catch(PDOException $e){
  echo "Connection Failed: " .$e->getMessage();
}
$conn = null;

