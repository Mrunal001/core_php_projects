<?php
include 'config.php';
?>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">DAMS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Welcome <?php echo $_SESSION['admin_name'] ?></a>
          <div id="example" class="jqclock"></div>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Appointments
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="book-appointment.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add/Book New Appointment</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="view-appointment.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View All Appointments</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="approved-appointment.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Approved Appointments</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="cancel-appointment.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Cancelled Appointments</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Department
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add-department.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Department</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="manage-department.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Department</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Doctors
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add-doctor.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Doctors</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="manage-doctor.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Doctors</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="reports.php" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Reports
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                User Control
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/tables/simple.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>My Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/tables/data.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Change Password</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="logout.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Logout</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <script src="assets/plugins/jquery/jquery.min.js"></script>
  <script src="assets/plugins/jquery/jqClock.min.js"></script>
  
<style>
  .jqclock
  {
    display:inline-block;
    color: #c2c7d0;
    margin-top: 10px;
  }

  .clockdate 
  {
    color: #c2c7d0; 
    margin-bottom: 5px;
    font-size: 18px;
    display: block;
    font-size: 14px;
  }

  .clocktime
  {
    font-size: 15px;
    color: #c2c7d0;
    display: block; 
  }
</style>

<script>
    $("#example").clock({
      dateFormat: "l, F j, Y",
      timeFormat: "h:i:s A",
    });
</script>
