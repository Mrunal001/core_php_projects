<?php

session_start();
include 'config.php';
include 'header.php';
include 'sidebar.php';

$sql = "SELECT * FROM `doctor_names`";

$result = mysqli_query($conn, $sql);

?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>All Doctors</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Manage Doctor</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">All Doctor</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Doctor Name</th>
                    <th>Doctor Degree</th>
                    <th>Doctor Dept.</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    if (mysqli_num_rows($result) > 0)
                    {
                      while ($row = mysqli_fetch_assoc($result))
                      {
                      ?>
                        <tr>
                          <td><?php echo $row['id']; ?></td>
                          <td><?php echo $row['doctor_name']; ?></td>
                          <td><?php echo $row['doctor_degree']; ?></td>
                          <td><?php echo $row['doctor_dept']; ?></td>
                          <td><a href="" class="btn btn-primary">Update</a> <a href="" class="btn btn-danger">Delete</a></td>
                        </tr>
                  <?php      
                      }
                    }
                  ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>Doctor Name</th>
                    <th>Doctor Degree</th>
                    <th>Doctor Dept.</th>
                    <th>Actions</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php
include 'footer.php';
?>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>


