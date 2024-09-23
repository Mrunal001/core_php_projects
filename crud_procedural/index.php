<?php

require_once('config.php');

$sql = "SELECT * FROM student_information";

$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <title>View Student Information</title>
  <style>
    .main{
      color: red;
      text-align: center;
      background-color: yellow;
    }
  </style>
</head>
<body>

  <div class="container-sm">
    <div class="mb-3">
      <h3 class="main">CRUD Operations</h3>
    </div>
  </div>

  <div class="container-sm">
    <div class="mb-3">
      <a href="insert.php" class="btn btn-primary">Add Record</a>
    </div>
  </div>

  <div class="container-sm">

    <table class="table table-striped table-bordered border-primary table-responsive">
      <thead>
        <tr>
          <th>ID</th>
          <th>Student FirstName</th>
          <th>Student LastName</th>
          <th>Student Email</th>
          <th>Student Password</th>
          <th>Student City</th>
          <th>Student Gender</th>
          <th>Student Hobby</th>
          <th>Student Photo</th>
          <th>Actions</th>
        </tr>
      </thead>

      <tbody>
        <?php

          if(mysqli_num_rows($result) > 0)
          {
            while ($row = mysqli_fetch_assoc($result))
            {
        ?>
          <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['student_firstname']; ?></td>
            <td><?php echo $row['student_lastname']; ?></td>
            <td><?php echo $row['student_email']; ?></td>
            <td><?php echo $row['student_password']; ?></td>
            <td><?php echo $row['student_city']; ?></td>
            <td><?php echo $row['student_gender']; ?></td>
            <td><?php echo $row['student_hobby']; ?></td>
            <td><img src="./upload/<?php echo $row['student_photo']; ?>" alt="upload image" height="50px" width="50px"></td>
            <td><a href="update.php?id=<?php echo $row['id']; ?>" class="btn btn-info">Edit</a> <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a> </td>
          </tr>
        <?php
            }
          }
        ?>

      </tbody>
    </table>

  </div>
  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>