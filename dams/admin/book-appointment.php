<?php

session_start();
include 'config.php';
include 'header.php';
include 'sidebar.php';

$sql_dept = "SELECT * FROM `dept_names`";

$result_dept = mysqli_query($conn, $sql_dept);

$sql_doctor = "SELECT * FROM `doctor_names`";

$result_doctor = mysqli_query($conn, $sql_doctor);

if (isset($_POST['submit']))
{
  $eightdigitrandom = mt_rand(10000000,99999999);
  $appointment_number = $eightdigitrandom;
  $patient_name = $_POST['patientname'];
  $patient_address = $_POST['patientaddress'];
  $patient_email = $_POST['patientemail'];
  $patient_mobile = $_POST['patientmobile'];
  $appointment_date = $_POST['appointmentdate'];
  $appointment_time = $_POST['appointmenttime'];
  $department = $_POST['department'];
  $doctor = $_POST['doctor'];
  $diagnostic = $_POST['patientdiagnostic'];

  $app_time = "SELECT * FROM `book_appointments` WHERE `appointment_date` = '$appointment_date' AND `appointment_time` = '$appointment_time'";

  $settime = mysqli_query($conn, $app_time);

  if (mysqli_num_rows($settime) > 0)
  {
    echo "The selected Time Slot is Already Taken";
  }
  else{
    $ins_query = "INSERT INTO `book_appointments` (`appointment_number`, `patient_name`, `patient_address`, `patient_email`, `patient_mobile`, `appointment_date`, `appointment_time`, `department`, `doctor`, `diagnostic`) VALUES ('$appointment_number', '$patient_name', '$patient_address', '$patient_email', '$patient_mobile', '$appointment_date', '$appointment_time', '$department', '$doctor', '$diagnostic')";

    $result = mysqli_query($conn, $ins_query);

    if ($result == TRUE)
    {
      // $to = $patient_email;
      // $subject = "Appointment Status";
      // $message = "Appointment Registered Successfully. We will back with appointment status soon.";
      // $from = "admin@gmail.com";
      // $headers = "From: $from";
      
      // if (mail($to, $subject, $message, $headers))
      // {
      //   echo "Mail has been Successfully Sent.";
      // }
      // else{
      //   echo "Mail Not Sent.";
      // }
    }
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
            <h1>Book Appointment</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Book Appointment</li>
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
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Fill below form for new Appointment</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label for="appointmentnumber">Appointment Number</label>
                    <input type="text" class="form-control" name="appointmentnumber" id="appointmentnumber" placeholder="Appointment Number" readonly>
                  </div>
                  <div class="form-group">
                    <label for="patientname">Patient Name<span class="reqentrybookappoint">*</span></label>
                    <input type="text" class="form-control" name="patientname" id="patientname" placeholder="Enter Patient Name" required>
                  </div>
                  <div class="form-group">
                    <label for="patientaddress">Patient Address<span class="reqentrybookappoint">*</span></label>
                    <textarea class="form-control" name="patientaddress" id="patientaddress" placeholder="Enter Patient Address" required></textarea>
                  </div>
                  <div class="form-group">
                    <label for="patientemail">Patient Email<span class="reqentrybookappoint">*</span></label>
                    <input type="email" class="form-control" name="patientemail" id="patientemail" placeholder="Enter Patient Email" required>
                  </div>
                  <div class="form-group">
                    <label for="patientmobile">Patient Mobile No<span class="reqentrybookappoint">*</span></label>
                    <input type="number" class="form-control" name="patientmobile" id="patientmobile" required>
                  </div>
                  <div class="form-group">
                    <label for="appointmentdate">Appointment Date<span class="reqentrybookappoint">*</span></label>
                    <input type="date" class="form-control" name="appointmentdate" id="appointmentdate" required>
                  </div>
                  <div class="form-group">
                    <label for="appointmenttime">Appointment Time<span class="reqentrybookappoint">*</span></label>
                    <input type="time" class="form-control" name="appointmenttime" id="appointmenttime" required>
                  </div>
                  <div class="form-group">
                    <label>Select Department<span class="reqentrybookappoint">*</span></label>
                      <select class="form-control" id="department" name="department" required>
                        <?php
                        if (mysqli_num_rows ($result_dept) > 0)
                        {
                          while ($row_dept = mysqli_fetch_assoc($result_dept))
                          {
                            echo '<option value="'.$row_dept["dept_name"].'">'.$row_dept["dept_name"].'</option>';
                          }
                        }
                        ?>
                      </select>
                  </div>
                  <div class="form-group">
                    <label>Select Doctor<span class="reqentrybookappoint">*</span></label>
                      <select class="form-control" id="doctor" name="doctor" required>
                      <?php
                        if (mysqli_num_rows ($result_doctor) > 0)
                        {
                          while ($row_doctor = mysqli_fetch_assoc($result_doctor))
                          {
                            echo '<option value="'.$row_doctor["doctor_name"].'">'.$row_doctor["doctor_name"].'</option>';
                          }
                        }
                        ?>
                      </select>
                  </div>
                  <div class="form-group">
                    <label for="patientdiagnostic">Diagnostic<span class="reqentrybookappoint">*</span></label>
                    <textarea class="form-control" name="patientdiagnostic" id="patientdiagnostic" placeholder="Enter Patient Additional Info" required></textarea>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="submit" id="submit" class="btn btn-primary">Book Appointment</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
</div>

<?php
include 'footer.php';
?>