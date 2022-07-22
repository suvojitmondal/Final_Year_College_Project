<?php
session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>TPO Dashboard</title>
  </head>
  <body>

  <div>
  <?php
  include '../Database Connection/dbcon.php';
  $tpoemailsession = $_SESSION['tpoemail'];
  $tpoquery = "select * from tpologin where email = '$tpoemailsession'";
  $tpoexequery = mysqli_query($con,$tpoquery);
  $tpowelcome = mysqli_fetch_assoc($tpoexequery);


  echo "<h4> Welcome ".$tpowelcome['name'];
  echo "!</h4>";
  ?>
  </div>

    <div>
        <a class="btn btn-primary" href="Edit_Tpo_Account.php" role="button">Edit Account</a>
        <a class="btn btn-primary" href="Add_Company.php" role="button">Add Company</a>
        <a class="btn btn-primary" href="Track_student.php" role="button">Track Student</a>
        <a class="btn btn-primary" href="notify_drive.php" role="button">Notify Drive</a>
    </div>


    <button> <a href="logout.php">Log Out</a></button>
  
  </body>




    
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
 