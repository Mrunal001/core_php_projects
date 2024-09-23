<?php

require_once('config.php');

if (isset($_GET['id']))
{
  $userid = $_GET['id'];

  $sql = "DELETE FROM `student_information` WHERE `id` = $userid";

  $result = mysqli_query($conn, $sql);

  if ($result == TRUE)
  {
    echo "Record Deleted Successfully";
    header('Location: index.php');

  }

}
?>