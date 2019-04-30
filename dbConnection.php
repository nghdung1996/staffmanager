<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "staffmanager";

  $conn = mysqli_connect($servername, $username, $password, $dbname);

  if(!$conn){
    die("Lỗi kết nối: ". $conn->connect_error);
  }
  mysqli_set_charset($conn, "utf8");


  //danh sach nv
  function staffList(){
    global $conn;
    $sql = "SELECT * FROM staffs
            ORDER BY id DESC";
    $result = mysqli_query($conn, $sql);
    return $result;
  }

  //danh sach nv chua co tai khoan
  function staffAccount(){
    global $conn;
    $sql = "SELECT * FROM staffs
            WHERE id_user = '0'
            ORDER BY id DESC";
    $result = mysqli_query($conn,$sql);
    return $result;
  }

  //chi tiet nv
  function staffDetail($id){
    global $conn;
    $sql = "SELECT * FROM staffs
            WHERE id = '$id'";
    $row = mysqli_query($conn, $sql);
    $staff = mysqli_fetch_assoc($row);
    return $staff;
  }

  // checkBirtday
  function checkBirthday(){
    global $conn;
    $current_time = date('m-d');
    $sql = "SELECT * FROM staffs";
    $time = mysqli_query($conn, $sql);
    if(mysqli_num_rows($time) > 0) {
      $staffs = array();
      while($row = mysqli_fetch_assoc($time)){
        $timeeee = strtotime($row['birthday']);
        if ($current_time ==  date('m-d', $timeeee)) {
          array_push($staffs, $row);
        }
      }
      return $staffs;
    }
  }

  
  function positionList(){
    global $conn;
    $sql = "SELECT * FROM positions
            ORDER BY id DESC";
    $result = mysqli_query($conn,$sql);
    return $result;
  }
  
  function accountInfo($id_staff){
    global $conn;
    $sql = "
      SELECT * FROM users
      WHERE id_staff = '$id_staff'
    ";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($result);
  }
  
  function staffInfo($id_user){
    global $conn;
    $sql = "
      SELECT * FROM staffs
      WHERE id_user = '$id_user'
    ";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($result);
  }

  function userPosition($id){
    global $conn;
    $sql = "
      SELECT * FROM positions
      WHERE id = '$id'
    ";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($result);
  }
  session_start();
?>