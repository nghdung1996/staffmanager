<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile">
      <div class="nav-link">
        <div class="user-wrapper">
          <div class="profile-image">
            <img src="images/faces/face1.jpg" alt="profile image">
          </div>
          <div class="text-wrapper">
            <p class="profile-name"><?php echo $nv['fullname'] ?></p>
            <div>
              <small class="designation text-muted"><?php 
                $position = userPosition($nv['id']);
                echo $position['name'];
              ?></small>
              <span class="status-indicator online"></span>
            </div>
          </div>
        </div>
        <a class="btn btn-success btn-block" href="newemployee.php">Thêm nhân viên
          <i class="mdi mdi-plus"></i>
        </a>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="index.php">
        <i class="menu-icon mdi mdi-television"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="positionsmanager.php">
        <i class="menu-icon mdi mdi-restart"></i>
        <span class="menu-title">Quản lý chức vụ</span>
      </a>
    </li> 
    <li class="nav-item">
      <a class="nav-link" href="createaccount.php">
        <i class="menu-icon mdi mdi-restart"></i>
        <span class="menu-title">Tạo tài khoản</span>
      </a>
    </li>  
  </ul>
</nav>