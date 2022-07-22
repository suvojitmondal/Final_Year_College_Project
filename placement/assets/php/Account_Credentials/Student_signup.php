<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Signup</title>
  </head>
  <body>
	<?php
	if(isset($_POST['signup_submit']))
	{
	    try{
	        include '../Database Connection/dbcon.php';

	        $username = mysqli_real_escape_string($con, $_POST['username']);
			$rollno = mysqli_real_escape_string($con, $_POST['rollno']);
			$passout_year = mysqli_real_escape_string($con, $_POST['passout_year']);
	        $department = mysqli_real_escape_string($con, $_POST['department']);
	        $email = mysqli_real_escape_string($con, $_POST['email']);
	        $cno = mysqli_real_escape_string($con, $_POST['cno']);
	        $refcode = mysqli_real_escape_string($con, $_POST['refcode']);
	        $password = mysqli_real_escape_string($con, $_POST['password']);
			//$isdeleted = mysqli_real_escape_string($con, $_POST['username']);


	        $emailquery = "select * from ssignup where email = '$email'";
	      	$query = mysqli_query($con,$emailquery);

	        if(mysqli_num_rows($query) > 0)
	        {
	          echo "Email Already Exist";
	        }
	        else{
	          if($refcode == "cse8-2021"){
	          if($password)
	          {
	            $insertquery = "insert into ssignup(name, rollno, passout_year, department, email, cno, refcode, password, isdeleted) 
	            values('$username','$rollno', '$passout_year', '$department','$email','$cno','$refcode','$password', false)";
	            $iquery = mysqli_query($con, $insertquery);
	            if($iquery)
	            {
	              echo "Inserted";
	              header("location: Student_Login.php");
	            }else{
	              echo "Insertion failed";
	            }
	          }
	        }else{
				echo "Wrong referrel code";
			}
	      }

	    }catch(Exception $e){
	        echo $e;
	    }
	}
	?>


	<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" autocomplete="off">
	  <div class="form-group">
	    <label>Username</label>
	    <input type="text" class="form-control" name="username" placeholder="Enter Username">
	  </div>
	  <div class="form-group">
	    <label>Roll No.</label>
	    <input type="text" class="form-control" name="rollno" placeholder="Enter Rollno">
	  </div>
	  <div class="form-group">
	    <label>Passout Year</label>
	    <input type="text" class="form-control" name="passout_year" placeholder="Enter Passout Year">
	  </div>
	  <div class="form-group">
	    <label>Department</label>
	    <input type="text" class="form-control" name="department" placeholder="Enter Department">
	  </div>
	  <div class="form-group">
	    <label>Email address</label>
	    <input type="email" name="email" class="form-control" aria-describedby="emailHelp" placeholder="Enter email">
	  </div>
	  <div class="form-group">
	    <label>Phone Number</label>
	    <input type="text" class="form-control" name="cno" placeholder="Enter Number">
	  </div>
	  <div class="form-group">
	    <label>Ref Code</label>
	    <input type="text" class="form-control" name="refcode" placeholder="Enter RefCode">
	  </div>
	  <div class="form-group">
	    <label for="exampleInputPassword1">Password</label>
	    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
	  </div>
	  <button type="submit" name="signup_submit" class="btn btn-primary">Submit</button>
	</form>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

  </body>
</html>