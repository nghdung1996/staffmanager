<?php
  require "dbConnection.php";

  if (isset($_POST['btnCreate'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $id_staff = $_POST['id_staff'];

    $sql = "INSERT INTO users (email , password, id_staff)
            VALUES ('$email', '$password', '$id_staff')
    ";
    if (mysqli_query($conn, $sql)) {
      $qr = "SELECT * FROM users
              WHERE id_staff = '$id_staff'";
      $result = mysqli_query($conn, $qr);
      $user = mysqli_fetch_assoc($result);
      $id_user = $user['id'];
      $qr2 = "UPDATE staffs SET id_user ='$id_user' WHERE id ='$id_staff'";
      mysqli_query($conn, $qr2);
      header("location:index.php");
    } else {
      echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
    }
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Star Admin Free Bootstrap-4 Admin Dashboard Template</title>
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
</head>

<body>
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
          <div class="row">
            <div class="col-md-6 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                 <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Tạo tài khoản cho nhân viên</h4>
                      <form class="forms-sample" action="createaccount.php" method="POST">
                        <div class="form-group">
                          <label>Nhân viên</label>
                          <select class="form-control" name="id_staff">
                            <?php 
                              $staffs = staffAccount();
                              while($staff = mysqli_fetch_assoc($staffs)){
                            ?>
                              <option value=<?php echo $staff['id'] ?>>
                                <?php echo $staff['id']." | ".$staff['fullname'] ?>
                              </option>
                            <?php } ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Tài khoản</label>
                          <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Nhập tài khoản nhân viên"
                            name="email">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Mật khẩu</label>
                          <input type="password" class="form-control" id="exampleInputPassword1"
                            name="password" placeholder="Nhập mật khẩu nhân viên">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Xác nhận mật khẩu</label>
                          <input type="password" class="form-control" id="exampleInputPassword1"
                            name="passwordConfirmation" placeholder="Nhập mật khẩu nhân viên">
                        </div>
                        <button type="submit" class="btn btn-success mr-2" name="btnCreate">Tạo</button>
                        <button class="btn btn-light">Hủy</button>
                      </form>
                    </div>
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
  <!-- End custom js for this page-->
</body>

</html>
