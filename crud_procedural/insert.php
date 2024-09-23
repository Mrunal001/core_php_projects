<?php

require_once('config.php');

if (isset($_POST['submit']))
{
  $firstname = $_POST['fname'];
  $lastname = $_POST['lname'];
  $email = $_POST['email'];
  $password = md5($_POST['password']);
  $city = $_POST['city'];
  $gender = $_POST['gender'];
  $hobby = $_POST['hobby'];
  $photo = $_FILES['photo'];

  $file_name = $_FILES["photo"]["name"];
  $file_size = $_FILES["photo"]["size"];
  $file_tmp = $_FILES["photo"]["tmp_name"];
  $file_type = $_FILES["photo"]["type"];

  if(move_uploaded_file($file_tmp,"upload/".$file_name)){
    echo "Successfully uploaded.";
  }
  else{
    echo "Could not upload the file.";
  }


  $sql = "INSERT INTO `student_information` (`student_firstname`, `student_lastname`, `student_email`, `student_password`, `student_city`, `student_gender`, `student_hobby`, `student_photo`) VALUES ('$firstname', '$lastname', '$email', '$password', '$city', '$gender', '$hobby', '$file_name')";
  
  $result = mysqli_query($conn, $sql);

  if ($result == TRUE)
  {
    echo "Record Inserted Successfully";
    header('Location: index.php');
  }
  else{
    echo "Query Unsuccessfully" . mysqli_error($conn);
  }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <title>Add Records</title>
</head>
<body>

<form method="POST" action="" enctype="multipart/form-data">

  <div class="container-sm">
    <div class="mb-3 col-md-3">
      <label for="firstname" class="form-label">First Name</label>
      <input type="text" class="form-control" id="firstname" name="fname" required>
    </div>

    <div class="mb-3 col-md-3">
      <label for="lastname" class="form-label">Last Name</label>
      <input type="text" class="form-control" id="lastname" name="lname" required>
    </div>

    <div class="mb-3 col-md-3">
      <label for="email" class="form-label">Email address</label>
      <input type="email" class="form-control" id="email" name="email" required>
    </div>

    <div class="mb-3 col-md-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" class="form-control" id="password" name="password" required>
    </div>

    <select class="form-select mb-3 col-md-3" aria-label="Default select example" name="city">
      <option value="Rajkot">Rajkot</option>
      <option value="Ahmedabad">Ahmedabad</option>
      <option value="Surat">Surat</option>
      <option value="Baroda">Baroda</option>
    </select>

    <div class="form-check mb-3 col-md-3">
      <input class="form-check-input" type="radio" name="gender" value="Male" id="gender">
      <label class="form-check-label" for="gender">Male</label><br>
      <input class="form-check-input" type="radio" name="gender" value="Female" id="gender">
      <label class="form-check-label" for="gender">Female</label>
    </div>

    <div class="form-check col-md-3 col-md-3">
      <input class="form-check-input" type="checkbox" value="Sports" name="hobby" id="sports">
      <label class="form-check-label" for="sports">Sports</label><br>
      <input class="form-check-input" type="checkbox" value="Reading" name="hobby" id="reading">
      <label class="form-check-label" for="reading">Reading</label><br>
      <input class="form-check-input" type="checkbox" value="Listing Music" name="hobby" id="music">
      <label class="form-check-label" for="music">Listing Music</label>
    </div>

    <div class="mb-3 col-md-3">
      <label for="formFile" class="form-label">Upload Photo</label>
      <input class="form-control" type="file" id="formFile" name="photo">
    </div>

    <button type="submit" class="btn btn-primary" name="submit" id="submit">Submit</button>
  
  </div>

</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  
</body>
</html>