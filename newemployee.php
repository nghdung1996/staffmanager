<?php 
  require "dbConnection.php";
?>
<?php 
  if (isset($_POST['btnAdd'])) {
    $fullname = $_POST['fullname'];
    $gender = $_POST['gender'];
    $birthday = $_POST['birthday'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $id_position = $_POST['id_position'];

    $sql = "INSERT INTO staffs (fullname, gender, birthday, address, phone, id_position)
            VALUES ('$fullname', '$gender', '$birthday', '$address', '$phone', '$id_position')";
    if (mysqli_query($conn, $sql)) {
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
  <title>Star Admin Free Bootstrap Admin Dashboard Template</title>
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
          <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Thêm nhân viên mới</h4>
                <form class="forms-sample" action="newemployee.php" method="POST">
                  <div class="form-group">
                    <label for="exampleInputName1">Tên đầy đủ</label>
                    <input type="text" class="form-control" name="fullname" placeholder="Nhập tên nhân viên">
                  </div>
                  <div class="form-group">
                    <label>Giới tính</label>
                      <select class="form-control" name="gender">
                        <option value=1>Nam</option>
                        <option value=0>Nữ</option>
                      </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputCity1">Ngày sinh</label>
                    <input type="date" class="form-control" name="birthday">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputCity1">Địa chỉ</label>
                    <input type="text" class="form-control" name="address">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputCity1">Số điện thoại</label>
                    <input type="num" class="form-control" name="phone">
                  </div>
                  <div class="form-group">
                    <label>Chức vụ</label>
                    <?php $positions = positionList() ?>
                    <select class="form-control" name="id_position">
                      <?php while($position = mysqli_fetch_assoc($positions)){ ?>
                      <option value=<?php echo $position['id'] ?>><?php echo $position['name'] ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <!-- <div class="form-group">
                    <label>Ảnh đại diện</label>
                    <input type="file" name="img[]" class="file-upload-default">
                    <div class="input-group col-xs-12">
                      <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                      <span class="input-group-append">
                        <button class="file-upload-browse btn btn-info" type="button">Tải lên</button>
                      </span>
                    </div>
                  </div> -->
                  <button type="submit" class="btn btn-success mr-2" name="btnAdd">Thêm</button>
                  <button class="btn btn-light">Hủy</button>
                </form>
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
</body>

</html>