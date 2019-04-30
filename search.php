<?php
  require "dbConnection.php";
  $fullname = $_POST['fullname'];
  $qr = "SELECT fullname FROM staffs
         WHERE fullname LIKE '%$fullname%'";
  $staffs = mysqli_query($conn,$qr);
  while ($staff = mysqli_fetch_assoc($staffs)) {
    echo "<p>".$staff['fullname']."</p>";
  }

?>