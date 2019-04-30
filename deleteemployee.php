<?php 
  require "dbConnection.php";
  $id = $_GET['id'];
  $sql = "DELETE FROM staffs WHERE id ='$id'";
  mysqli_query($conn, $sql);
  $sql2 = "DELETE FROM users WHERE id_staff ='$id'";
  mysqli_query($conn, $sql2);
  header("location:index.php");
?>