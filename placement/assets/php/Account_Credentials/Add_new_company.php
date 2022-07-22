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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>SignIn</title>
  </head>
  <body>

  <?php
	if(isset($_POST['Add_company_submit']))
	{
	    try{
	        include '../Database Connection/dbcon.php';

	        $name = mysqli_real_escape_string($con, $_POST['companyname']);
	        $package = mysqli_real_escape_string($con, $_POST['package']);
            $job_location = mysqli_real_escape_string($con, $_POST['job_location']);

	        $companyquery = "insert into companymaster (name, package, job_location) values ('$name', '$package', '$job_location')";
	      	$query = mysqli_query($con,$companyquery);
            //$company_count = mysqli_num_rows($query);

	        if($query){
                ?>
                    <script>
                        alert("connection successful")
                    </script>
                <?php

                header("location: Add_Company.php");
            }

	        
          }

	    catch(Exception $e){
	        echo $e;
	    }
	}
	?>

<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" autocomplete="off">

<div class="form-group">
  <label >Company Name</label>
  <input type="text" name="companyname" class="form-control" aria-describedby="emailHelp" placeholder="Enter company" required>
</div>

<div class="form-group">
  <label>Package</label>
  <input type="text" name="package" class="form-control" aria-describedby="emailHelp" placeholder="Enter package" required>
</div>

<div class="form-group">
  <label >Job Location</label>
  <input type="text" name="job_location" class="form-control" aria-describedby="emailHelp" placeholder="Enter job location">
</div>
<button type="submit" name="Add_company_submit" class="btn btn-primary">Submit</button>
</form>

  </body>