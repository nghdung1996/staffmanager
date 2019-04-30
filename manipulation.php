<?php 
  require "dbConnection.php";
  // Danh sach nhan vien
  function staffList(){
    $qr = "SELECT * FROM staffs
          ORDER BY id DESC";
    return mysqli_query($conn, $qr);
  }
  echo "ád";

?>