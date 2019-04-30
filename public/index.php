<?php 
  require "../dbConnection.php";
  session_start();
  if (!isset($_SESSION['email'])) {
    header('location:login.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Trang nhân viên</title>
</head>
<body>
  <?php
    echo $_SESSION['email']." đã đăng nhập thành công";
  ?>
  <a href="logout.php">Đăng xuất</a>
</body>
</html>