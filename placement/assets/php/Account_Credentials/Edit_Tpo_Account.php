
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

    <title>Update Account</title>
  </head>
  <body>
	<?php
	if(isset($_POST['update_submit']))
	{
	    try{
	        include '../Database Connection/dbcon.php';


            $newname = mysqli_real_escape_string($con, $_POST['newname']);
	        $newemail = mysqli_real_escape_string($con, $_POST['newemail']);	        
            $newphno = mysqli_real_escape_string($con, $_POST['newphno']);
            $newpassword = mysqli_real_escape_string($con, $_POST['newpassword']);
            
			$newtable = "update tpologin set name = '$newname', email = '$newemail', phno = '$newphno', password = '$newpassword' where id = '0'";

			if(mysqli_query($con,$newtable)){
				header("location: Dashboard_Tpo.php");
			}
			else{
				header("location: Edit_Tpo_Account.php");
			}


	        // $emailquery = "select * from tpologin where email = '$newemail'";
	      	// $query = mysqli_query($con,$emailquery);
            // $email_count = mysqli_num_rows($query);

	        // if($email_count)
	        // {
			// 	$email_pass = mysqli_fetch_assoc($query);
			// 	$db_pass = $email_pass['password'];

			// 	if($password = $db_pass)
			// 	{
			// 		$newtable = "update tpologin set name = '$newname', email = '$newemail', phno = '$newphno' where password = '$password'";
			// 	}
			// 	else{
			// 		echo "Password is Incorrect";
			// 	}
	        // }
	        // else{
	        //   header("location: Dashboard_Tpo.php");
            // }
	        
          }

	    catch(Exception $e){
	        echo $e;
	    }
	}
	?>


	<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" autocomplete="off">



	  <div class="form-group">
	    <label>New Name</label>
	    <input type="newname" name="newname" class="form-control" aria-describedby="emailHelp" placeholder="Enter new name" required>
	  </div>     

	  <div class="form-group">
	    <label>New Email</label>
	    <input type="newemail" name="newemail" class="form-control" aria-describedby="emailHelp" placeholder="Enter new email" required>
	  </div>

	  <div class="form-group">
	    <label>New Phone Number</label>
	    <input type="newphno" name="newphno" class="form-control" aria-describedby="emailHelp" placeholder="Enter new phone number" required>
	  </div>

	  <div class="form-group">
	    <label for="exampleInputPassword1">New Password</label>
	    <input type="newpassword" name="newpassword" class="form-control" id="exampleInputPassword1" placeholder="new Password" required>
	  </div>
	  <button type="submit" name="update_submit" class="btn btn-primary">Submit</button>
	</form>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

  </body>
</html>