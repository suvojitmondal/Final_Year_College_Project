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

    <title>Add company to student</title>
  </head>
<body>
  <?php
  include '../Database Connection/dbcon.php';
	if(isset($_POST['submit_student_company']))
	{
	    try{
        $student_roll = mysqli_real_escape_string($con, $_POST['student']);
        $company_id = mysqli_real_escape_string($con, $_POST['company']);

        
        $checkquery = "select id from student_company where student_roll = '$student_roll' and company_id = '$company_id'";
        $query = mysqli_query($con,$checkquery);
        $row_count = mysqli_num_rows($query);
        if($row_count){
          
         // header("location: Add_company_to_student.php");
          ?>
          <script type="text/javascript">
          alert("Already present in the Database!! \n Please enter again!!");
         
          </script>
          <?php
        }
        else{
          $nameinsert = mysqli_query($con,"select * from ssignup where rollno = '$student_roll'");
          $arraylist = mysqli_fetch_assoc($nameinsert);
          $name = $arraylist['name'];
          $insertquery = "insert into student_company(student_roll, student_name, company_id) values ('$student_roll', '$name', '$company_id')";
          $submitquery = mysqli_query($con, $insertquery);
          if($submitquery){
            ?>
           <script type="text/javascript">
              alert("DAta inserted");
           </script>
           <?php
            header("location: Track_student.php");
          }
          
        }
	    }

      catch(Exception $e){
	        echo $e;
	    }
	}
	?>

<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" autocomplete="off">
  <select name="student" required>
   
    <?php
        
        $records_student = mysqli_query($con, "select rollno,name from ssignup");  

        while($data = mysqli_fetch_array($records_student))
        {
            echo "<option value='". $data['rollno'] ."'>" .$data['name'] ."</option>";  
        }	
    ?>  
  </select>

  <select name="company" required>
  
    <?php
        
        $records_company = mysqli_query($con, "select id,name from companymaster");  

        while($data = mysqli_fetch_array($records_company))
        {
            echo "<option value='". $data['id'] ."'>" .$data['name'] ."</option>";  
        }	
    ?>  
  </select>

  <button type="submit" name="submit_student_company" class="btn btn-primary"></button>


  </form>

</body>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>






















       