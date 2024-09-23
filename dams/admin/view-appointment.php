<?php

session_start();
include 'config.php';
include 'header.php';
include 'sidebar.php';

$sql = "SELECT * FROM `book_appointments`";

$result = mysqli_query($conn, $sql);

if (isset($_POST['submit']))
{  
  $id = $_POST['userid'];
  $status = $_POST['status'];
  $remarks = $_POST['remarks'];

  $sql_status = "UPDATE `book_appointments` SET `appointment_status` = '$status', `appointment_remark` = '$remarks' WHERE `id`='$id'";

  $result_status = mysqli_query($conn, $sql_status);
}

?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>All Appointments</h1>
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
                <h3 class="card-title">All Appointments</h3>
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
                          <td><button type="button" class="btn btn-primary take-action-btn" data-toggle="modal" data-target="#modal-default<?php echo $row['id'] ?>">Take Action</button></td>
                          <div class="modal fade" id="modal-default<?php echo $row['id'] ?>">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title">Update Appointment Status</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <form method="POST" action="#">
                                    <div class="card-body">
                                      <div class="form-group">
                                      <input type="hidden" name="userid" value="<?php echo $row['id']; ?>">  
                                      </div>
                                      <div class="form-group">
                                        <label>Appointment Status</label>
                                        <select class="form-control" id="status" name="status" required>
                                          <option>Accepted</option>
                                          <option>Canceled</option>
                                        </select>
                                      </div>
                                      <div class="form-group">
                                        <label for="patientaddress">Remarks</label>
                                        <textarea class="form-control" name="remarks" id="remarks" placeholder="Enter Remarks" required></textarea>
                                      </div>
                                    </div>
                                </div>
                                  <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" id="submit" name="submit" class="btn btn-primary">Update</button>
                                  </div>
                                </form>
                              </div>
                              <!-- /.modal-content -->
                            </div>
                              <!-- /.modal-dialog -->
                          </div>
                              <!-- /.modal -->
                          <!-- <td><a href="take-action.php" class="btn btn-primary">Take Action</a> <a href="" class="btn btn-danger">Delete</a></td> -->
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
