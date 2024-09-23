<?php

session_start();
include 'config.php';
include 'sidebar.php';
include 'header.php';

if (isset($_POST['submit']))
{
  $adddoctor = $_POST['adddoctor'];
  $adddegree = $_POST['adddegree'];
  $adddept = $_POST['adddept'];

  $sql = "INSERT INTO `doctor_names` (`doctor_name`, `doctor_degree`, `doctor_dept`) VALUES ('$adddoctor', '$adddegree', '$adddept')";

  $result = mysqli_query($conn, $sql);
}

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>General Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">General Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label for="adddoctor">Enter Doctor Name<span class="reqentrydoctor">*</span></label>
                    <input type="text" class="form-control" name="adddoctor" id="adddoctor" placeholder="Enter Doctor Name" required>
                  </div>
                  <div class="form-group">
                    <label for="adddegree">Enter Doctor Degree<span class="reqentrydoctor">*</span></label>
                    <input type="text" class="form-control" name="adddegree" id="adddegree" placeholder="Enter Doctor Degree" required>
                  </div>
                  <div class="form-group">
                    <label for="adddept">Enter Doctor Department<span class="reqentrydoctor">*</span></label>
                    <input type="text" class="form-control" name="adddept" id="adddept" placeholder="Enter Doctor Department" required>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="submit" id="submit" class="btn btn-primary">Add Doctor</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
        </div>
      </div>
    </section>
</div>

<?php
include 'footer.php';
?>