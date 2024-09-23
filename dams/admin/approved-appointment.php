<?php

session_start();
include 'config.php';
include 'header.php';
include 'sidebar.php';

$sql = "SELECT * FROM `book_appointments` WHERE `appointment_status` = 'Accepted'";

$result = mysqli_query($conn, $sql);

?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Approved Appointments</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
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
                <h3 class="card-title">Approved Appointments</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Appointment Number</th>
                    <th>Patient Name</th>
                    <th>Patient Address</th>
                    <th>Patient E-Mail</th>
                    <th>Patient Mobile</th>
                    <th>Appointment Date</th>
                    <th>Appointment Time</th>
                    <th>Department</th>
                    <th>Doctor</th>
                    <th>Diagnostic</th>
                    <th>Appointment Status</th>
                    <th>Remarks</th>
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
                          <td><?php echo $row['appointment_number']; ?></td>
                          <td><?php echo $row['patient_name']; ?></td>
                          <td><?php echo $row['patient_address']; ?></td>
                          <td><?php echo $row['patient_email']; ?></td>
                          <td><?php echo $row['patient_mobile']; ?></td>
                          <td><?php echo $row['appointment_date']; ?></td>
                          <td><?php echo $row['appointment_time']; ?></td>
                          <td><?php echo $row['department']; ?></td>
                          <td><?php echo $row['doctor']; ?></td>
                          <td><?php echo $row['diagnostic']; ?></td>
                          <td><?php echo $row['appointment_status']; ?></td>
                          <td><?php echo $row['appointment_remark']; ?></td>
                          <td><a href="" class="btn btn-danger">Delete</a></td>
                        </tr>
                  <?php      
                      }
                    }
                  ?>
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>ID</th>
                    <th>Appointment Number</th>
                    <th>Patient Name</th>
                    <th>Patient Address</th>
                    <th>Patient E-Mail</th>
                    <th>Patient Mobile</th>
                    <th>Appointment Date</th>
                    <th>Appointment Time</th>
                    <th>Department</th>
                    <th>Doctor</th>
                    <th>Diagnostic</th>
                    <th>Appointment Status</th>
                    <th>Remarks</th>
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
