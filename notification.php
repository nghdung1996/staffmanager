<?php 
  require "dbConnection.php";

  function checkBirthday(){
    $current_time = date('m-d');
    $sql = "SELECT * FROM staffs";
    $time = mysqli_query($conn, $sql);
    if(mysqli_num_rows($time) > 0) {
      while($row = mysqli_fetch_assoc($time)){
        $timeeee = strtotime($row['birthday']);
        if ($current_time ==  date('m-d', $timeeee)) {
          echo $row['fullname']."<br>" ;
        }
      }
    }
  }
  
?>