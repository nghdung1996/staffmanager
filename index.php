<?php 
  require "dbConnection.php";
  date_default_timezone_set("Asia/Ho_Chi_Minh");
  ob_start();
  if (($_SESSION['email'] != "admin@gmail.com" || $_SESSION['type'] != 1) ) {
    header("location:login.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Quản lý nhân viên</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>

<body>
  <style>
    .result{
      position: absolute;        
      z-index: 999;
      top: 50px;
      left: 370px;
      width: 370px;
    }
    .result p{
      margin: 0;
      padding: 7px 10px;
      border: 1px solid #36aade;
      border-top: none;
      cursor: pointer;
      color: black;
      background: #f2f8f9;
    }
    .result p:hover{
      background: #f2f2f2;
    }
  </style>

  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
      <?php require "partials/_navbar.php" ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
        <?php require "partials/_sidebar.php" ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row purchace-popup">
          </div>
          
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Quản lý nhân viên</h4>
                  <p class="card-description">
                  </p>
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Ảnh</th>
                          <th>Tên</th>
                          <th>Email</th>
                          <th>Ngày sinh</th>
                          <th>Số điện thoại</th>
                          <th>Chức vụ</th>
                          <th></th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $staffs = staffList();
                          while($staff = mysqli_fetch_assoc($staffs)){
                        ?>
                        <tr>
                          <td class="py-1">
                            <img src="images/faces-clipart/pic-1.png" alt="image" />
                          </td>
                          <td><?php echo $staff['fullname'] ?></td>
                          <td>
                            <?php
                              $user = accountInfo($staff['id']);
                              echo $user['email'];
                            ?>
                          </td>
                          <td>
                            <?php echo $staff['birthday'] ?>
                          </td>
                          <td>
                            0<?php echo $staff['phone'] ?>
                          </td>
                          <td>
                            <?php 
                              if ($staff['id_position'] == 1) {
                                echo "Giám đốc";
                              }else if ($staff['id_position'] == 2) {
                                echo "Trưởng phòng";
                              }else if ($staff['id_position'] == 3){
                                echo "Nhân viên";
                              }
                            ?>
                          </td>
                          <td><a href="editemployee.php?id=<?php echo $staff['id'] ?>"><i class="fa fa-edit"></i>Sửa</a></td>
                          <td><a href="deleteemployee.php?id=<?php echo $staff['id'] ?>"><i class="fas fa-times-circle"></i>Xóa</a></td>
                        </tr>
                        <?php
                          }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <?php require "partials/_footer.php" ?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <script src="vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <!-- End custom js for this page-->
  <script>
    $(document).ready(function(){
      $('body').on('keyup', '#seachStaff' ,function(){
        var name = $(this).val();
        if(name != ""){
          $.post('search.php', {fullname: name}, function(data){
            $('.result').html(data);
          });
        }else{
          $('.result').hide();
        }
      });
    });
  </script>
</body>

</html>