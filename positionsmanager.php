<?php
  require "dbConnection.php";
  if (isset($_POST['btnAdd'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];

    $sql = "INSERT INTO positions (name, description)
            VALUES ('$name', '$description') ";

    if (mysqli_query($conn,$sql)) {
      header('location:positionsmanager.php');
    }else{
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
            
            <div class="col-md-8 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Quản lý chức vụ</h4>
                  <p class="card-description">
                  </p>
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Tên</th>
                          <th>Mô tả</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                          $positions = positionList();
                          while ($position = mysqli_fetch_assoc($positions)) {
                        ?>
                        <tr>
                          <td>
                            <?php echo $position['name'] ?>
                          </td>
                          <td>
                          <?php echo $position['description'] ?>
                          </td>
                          <td><a href="deleteposition.php?id=<?php echo $position['id'] ?>"><i class="fas fa-times-circle"></i>Xóa</a></td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-4 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                 <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Thêm chức vụ mới</h4>
                      <form class="forms-sample" action="positionsmanager.php" method="POST">
                        
                        <div class="form-group">
                          <label>Tên chức vụ</label>
                          <input type="text" class="form-control" placeholder="Nhập tên chức vụ"
                            name="name">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Mô tả chức vụ</label>
                            <textarea name="description" class="form-control" cols="30" rows="10"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success mr-2" name="btnAdd">Thêm</button>
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
