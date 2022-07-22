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
	if(isset($_POST['update_student_academic']))
	{
	    try{
	        include '../Database Connection/dbcon.php';


            $emailsession = $_SESSION['email'];
            $query = "select * from ssignup where email = '$emailsession'";
            $exequery = mysqli_query($con,$query);
            $welcome = mysqli_fetch_assoc($exequery);

            $roll = $welcome['rollno'];
	        $marks10 = (int)mysqli_real_escape_string($con, $_POST['marks10']);
	        $marks12 = (int)mysqli_real_escape_string($con, $_POST['marks12']);
            $btech = (int)mysqli_real_escape_string($con, $_POST['btech']);
            $yeargap = (int)mysqli_real_escape_string($con, $_POST['yeargap']);

	        $insertquery = "update student_details set 10marks = '$marks10', 12marks = '$marks12', btech = '$btech', yeargap = '$yeargap' where student_roll = '$roll'";
	      	$query = mysqli_query($con,$insertquery);

            if($query){
                header("location: Dashboard_Student.php");
            }
          
	        
          }

	    catch(Exception $e){
	        echo $e;
	    }
	}
	?>


	<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" autocomplete="off">

	  <div class="form-group">
	    <label>10th Marks(%)</label>
	    <input type="text" name="marks10" class="form-control" aria-describedby="emailHelp" placeholder="Enter class 10th Marks" required>
	  </div>

	  <div class="form-group">
	    <label>12th Marks(%)</label>
	    <input type="text" name="marks12" class="form-control" aria-describedby="emailHelp" placeholder="Enter class 12th Marks" required>
	  </div>
      <div class="form-group">
	    <label>B.Tech Marks(%)</label>
	    <input type="text" name="btech" class="form-control" aria-describedby="emailHelp" placeholder="Enter B.Tech Marks" required>
	  </div>
      <div class="form-group">
	    <label>Year Gaps</label>
	    <input type="text" name="yeargap" class="form-control" aria-describedby="emailHelp" placeholder="Enter Year Gaps" required>
	  </div>
	  <button type="submit" name="update_student_academic" class="btn btn-primary">Submit</button>
	</form>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

  </body>
</html>