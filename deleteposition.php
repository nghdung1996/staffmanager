<?php 
  require "dbConnection.php";
  $id = $_GET['id'];
  $sql = "DELETE FROM positions WHERE id ='$id'";
  mysqli_query($conn, $sql);
  header("location:positionsmanager.php");
?>