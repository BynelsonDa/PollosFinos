<?php

include("../db.php");

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  
  $query = "DELETE FROM galpones WHERE id = $id";
  $result = mysqli_query($conex, $query);
  if(!$result) {
    die("Query Failed.");
  }
  
  header('Location: Galpones.php');
}
?>