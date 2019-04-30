<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
      <a class="navbar-brand brand-logo" href="index.php">
        <img src="images/logo.PNG" alt="logo" />
      </a>
      <a class="navbar-brand brand-logo-mini" href="index.php">
        <img src="images/logo-mini.svg" alt="logo" />
      </a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center">
      <div class="form-group">
        <input type="text" name="name" id="seachStaff" class="form-control" style="margin: 239px 100px 220px"
          placeholder="Tìm kiếm theo tên nhân viên" autocomplete="off" >
        <div class="result"></div>
      </div>
      <?php 
        $staffs = checkBirthday();
        $count = count($staffs);
      ?>
      <ul class="navbar-nav navbar-nav-right">
        <li class="nav-item dropdown">
          <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
            <i class="mdi mdi-bell"></i>
            <span class="count"><?php echo $count ?></span>
          </a>
          <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
            <a class="dropdown-item">
              <p class="mb-0 font-weight-normal float-left">Hôm nay sinh nhật ai?
              </p>
            </a>
            <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-info">
                  <i class="fas fa-birthday-cake mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <?php if ($count > 0) {
                  ?>
                    <p class="font-weight-light small-text">
                      <?php 
                        foreach ($staffs as $value) {
                      ?>
                        <h5><?php echo $value['fullname'] ?></h5>
                        <small>
                          <?php
                            $user = accountInfo($value['id']);
                            echo $user['email'];
                          ?>
                        </small>
                        <br><br>
                      <?php } ?>
                    </p>
                  <?php }else { ?>
                    Không có nhân viên sinh nhật hôm nay!
                  <?php } ?>
                </div>
              </a>
          </div>
        </li>
        <?php $nv = staffInfo($_SESSION['id_user']) ?>
        <li class="nav-item dropdown d-none d-xl-inline-block">
          <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
            <span class="profile-text">Hello, <?php echo $nv['fullname'] ?> !</span>
            <img class="img-xs rounded-circle" src="images/faces/face1.jpg" alt="Profile image">
          </a>
          <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
            <a class="dropdown-item p-0">
              <div class="d-flex border-bottom">
                <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                  <i class="mdi mdi-bookmark-plus-outline mr-0 text-gray"></i>
                </div>
                <div class="py-3 px-4 d-flex align-items-center justify-content-center border-left border-right">
                  <i class="mdi mdi-account-outline mr-0 text-gray"></i>
                </div>
                <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                  <i class="mdi mdi-alarm-check mr-0 text-gray"></i>
                </div>
              </div>
            </a>
            <a class="dropdown-item mt-2">
              Thông tin tài khoản
            </a>
            <a class="dropdown-item" href="logout.php">
              Đăng xuất
            </a>
          </div>
        </li>
      </ul>
      <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
        <span class="mdi mdi-menu"></span>
      </button>
    </div>
  </nav>