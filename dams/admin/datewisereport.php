<?php

session_start();
include 'config.php';

$sql = "SELECT * FROM `book_appointments`";

$result = mysqli_query($conn, $sql);

?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
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
                </table>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
 

<!-- DataTables  & Plugins -->
<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="assets/plugins/jszip/jszip.min.js"></script>
<script src="assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

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
