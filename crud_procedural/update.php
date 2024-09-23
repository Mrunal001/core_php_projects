<?php

require_once('config.php');

if (isset($_POST['update']))
{
  $id = $_POST['userid'];
  $update_firstname = $_POST['update_fname'];
  $update_lastname = $_POST['update_lname'];
  $update_email = $_POST['update_email'];
  $update_password = $_POST['update_password'];
  $update_city = $_POST['update_city'];
  $update_gender = $_POST['update_gender'];
  $update_hobby = $_POST['update_hobby'];
  $update_photo = $_FILES['update_photo']['name'] ? $_FILES['update_photo']['name'] : $photo;

  if (!empty($_FILES['update_photo']['name'])) {
    $file_name = $_FILES["update_photo"]["name"];
    $file_size = $_FILES["update_photo"]["size"];
    $file_tmp = $_FILES["update_photo"]["tmp_name"];
    $file_type = $_FILES["update_photo"]["type"];
  }

  if(move_uploaded_file($file_tmp,"upload/".$file_name)){
    echo "Successfully uploaded and Updated.";
  }
  else{
    echo "Could not upload the file.";
  }

  $sql = "UPDATE `student_information` SET `student_firstname`='$update_firstname', `student_lastname`='$update_lastname', `student_email`='$update_email', `student_password`='$update_password', `student_city`='$update_city', `student_gender`='$update_gender', `student_hobby`='$update_hobby', `student_photo`='$update_photo' WHERE `id` = '$id' ";

  $result = mysqli_query($conn, $sql);

  if ($result == TRUE){
    echo "Record Updated Successfully";
    header('Location: index.php');
  }
}

if (isset($_GET['id']))
{
  $userid = $_GET['id'];

  $sql = "SELECT * FROM `student_information` WHERE `id` = $userid";

  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0)
  {
    while ($row = mysqli_fetch_assoc($result))
    {
      $id = $row['id'];
      $firstname = $row['student_firstname'];
      $lastname = $row['student_lastname'];
      $email = $row['student_email'];
      $password = md5($row['student_password']);
      $city = $row['student_city'];
      $gender = $row['student_gender'];
      $hobby = $row['student_hobby'];
      $photo = $row['student_photo'];
    }
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <title>Update Records</title>
</head>
<body>

<form method="POST" action="" enctype="multipart/form-data">

<div class="container-sm">

  <div class="mb-3 col-md-3">
  <input type="hidden" name="userid" value="<?php echo $id; ?>">
  </div>

  <div class="mb-3 col-md-3">
    <label for="firstname" class="form-label">First Name</label>
    <input type="text" class="form-control" id="firstname" name="update_fname" value="<?php echo $firstname;  ?>">
  </div>

  <div class="mb-3 col-md-3">
    <label for="lastname" class="form-label">Last Name</label>
    <input type="text" class="form-control" id="lastname" name="update_lname" value="<?php echo $lastname;  ?>">
  </div>

  <div class="mb-3 col-md-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" class="form-control" id="email" name="update_email" value="<?php echo $email;  ?>">
  </div>

  <div class="mb-3 col-md-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="update_password" value="<?php echo $password;  ?>">
  </div>

  <select class="form-select mb-3 col-md-3" aria-label="Default select example" name="update_city">
    <option value="Rajkot"  <?php if($city == 'Rajkot'){ echo "selected";} ?>>Rajkot</option>
    <option value="Ahmedabad" <?php if($city == 'Ahmedabad'){ echo "selected";} ?>>Ahmedabad</option>
    <option value="Surat" <?php if($city == 'Surat') { echo "selected";} ?>>Surat</option>
    <option value="Baroda" <?php if($city== 'Baroda') {echo "selected";} ?>>Baroda</option>
  </select>

  <div class="form-check mb-3 col-md-3">
    <input class="form-check-input" type="radio" name="update_gender" value="Male" <?php if($gender == 'Male'){ echo "checked";} ?> id="gender">
    <label class="form-check-label" for="gender">Male</label><br>
    <input class="form-check-input" type="radio" name="update_gender" value="Female" <?php if($gender == 'Female'){ echo "checked";} ?> id="gender">
    <label class="form-check-label" for="gender">Female</label>
  </div>

  <div class="form-check col-md-3 col-md-3">
    <input class="form-check-input" type="checkbox" value="Sports" <?php if($hobby == 'Sports'){ echo "checked";} ?> name="update_hobby" id="sports">
    <label class="form-check-label" for="sports">Sports</label><br>
    <input class="form-check-input" type="checkbox" value="Reading" <?php if($hobby == 'Reading'){ echo "checked";} ?> name="update_hobby" id="reading">
    <label class="form-check-label" for="reading">Reading</label><br>
    <input class="form-check-input" type="checkbox" value="Listing Music" <?php if($hobby == 'Listing Music'){ echo "checked";} ?> name="update_hobby" id="music">
    <label class="form-check-label" for="music">Listing Music</label>
  </div>

  <div class="mb-3 col-md-3">
    <label for="formFile" class="form-label">Upload Photo</label>
    <input class="form-control" type="file" id="formFile" name="update_photo" value="<?php echo $photo; ?>">
  </div>

  <button type="submit" class="btn btn-primary" name="update" id="update">Update</button>

</div>

</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  
</body>
</html>