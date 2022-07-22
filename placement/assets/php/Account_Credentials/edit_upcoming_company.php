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

    <title>Edit_upcoming_company</title>
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

            $check = "select * from upcoming_company";


            if(mysqli_num_rows(mysqli_query($con,$check))>0){

	        $companyquery = "update upcoming_company set name = '$name', package = '$package', job_location = '$job_location' where id = 0";
	      	$query = mysqli_query($con,$companyquery);
            }

            else{
            $companyquery2 = "insert into upcoming_company (name, package, job_location)
                            values('$name', '$package','$job_location')";
	      	$query = mysqli_query($con,$companyquery2);
            }
            //$company_count = mysqli_num_rows($query);

	        if($query){
                

                header("location: Dashboard_Tpo.php");
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