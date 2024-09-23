<?php

session_start();
include 'config.php';
include 'header.php';
include 'sidebar.php';

if (isset($_POST['submit']))
{
  $deptname = $_POST['adddepartment'];

  $sql = "INSERT INTO `dept_names` (`dept_name`) VALUES ('$deptname')";

  $result = mysqli_query($conn, $sql);

  if ($result == "TRUE")
  {
    echo '<div class="dept">'.'<p class="text-info">'."Department Added Successfully".'</p>'.'</div>';
  }

}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Department</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Add Department</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Fill below form for Add Department</h3>
              </div>
              <form name="department" method="POST" onsubmit = "return(validate());">
                <div class="card-body">
                  <div class="form-group">
                    <label for="adddepartment">Enter Department Name<span class="reqentrydept">*</span></label>
                    <input type="text" class="form-control" name="adddepartment" id="adddepartment" placeholder="Enter Department Name" required>
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" name="submit" id="submit" class="btn btn-primary">Add Department</button>
                </div>
              </form>
            </div>
        </div>
      </div>
    </section>
</div>

<?php
include 'footer.php';
?>

<script>
  function validate() {

    if (document.department.adddepartment.value == "")
    {
      alert("please fill this filed");
      return false;
    }

  }
</script>