<?php
session_start();
//$_SESSION['email'] = $email;
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
	if(isset($_POST['login_submit']))
	{
	    try{
	        include '../Database Connection/dbcon.php';

	        $email = mysqli_real_escape_string($con, $_POST['email']);
	        $password = mysqli_real_escape_string($con, $_POST['password']);


	        $emailquery = "select * from ssignup where email = '$email' and password= '$password'";
	      	$query = mysqli_query($con,$emailquery);
          $email_count = mysqli_num_rows($query);

	        if($email_count)
	        {
            $email_pass = mysqli_fetch_assoc($query);
            $db_pass = $email_pass['password'];
	          if($password = $db_pass)
            {
              echo "LogIn Successful";
              header("location: Dashboard_Student.php");
            }
            else{
              echo "Password is Incorrect";
            }
	        }
	        else{
	          echo "Invalid Email";
            }
			$_SESSION['email'] = $email;
	        
          }

	    catch(Exception $e){
	        echo $e;
	    }
	}
	?>


	<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" autocomplete="off">

	  <div class="form-group">
	    <label>Email address</label>
	    <input type="email" name="email" class="form-control" aria-describedby="emailHelp" placeholder="Enter email" required>
	  </div>

	  <div class="form-group">
	    <label for="exampleInputPassword1">Password</label>
	    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
	  </div>
	  <button type="submit" name="login_submit" class="btn btn-primary">Submit</button>
	</form>
	<h6> New student? </h6>
	<a class="btn btn-primary" href="Student_signup.php" role="button">SignUp</a>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

  </body>
</html>