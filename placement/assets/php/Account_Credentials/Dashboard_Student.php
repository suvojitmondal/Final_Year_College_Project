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

    <title>Student Dashboard</title>
  </head>
  <body>
  <?php
  include '../Database Connection/dbcon.php';
  $emailsession = $_SESSION['email'];
  $query = "select * from ssignup where email = '$emailsession'";
  $exequery = mysqli_query($con,$query);
  $welcome = mysqli_fetch_assoc($exequery);

  $roll = $welcome['rollno'];

  echo "<h4> Welcome ".$welcome['name'];
  echo "!</h4>";

  
?>
 
 <table border="2">
          <thead>
            <tr>
              <th>Company Name</th>
              <th>Package</th>
              <th>Job location</th>
          </thead>

          
          <tbody>

          <?php
    
          
          $q1 = "select name, package, job_location from companymaster where id in (select company_id from student_company where student_roll = '$roll')";
          $q2 = mysqli_query($con,$q1);
          //$nums = mysqli_num_rows($q2);

          while($res = mysqli_fetch_array($q2)){
            ?>

            <tr>
              <td> <?php echo $res['name']; ?> </td>
              <td> <?php echo $res['package'];?> </td>
              <td> <?php echo $res['job_location'];?></td>
            </tr>
        <?php
          }
        ?>
            
          </tbody>
        </table>
<?php



if(mysqli_num_rows(mysqli_query($con,"select * from student_details where student_roll = $roll"))>0){

?>
  <table border="2">
          <thead>
            <tr>
              
              <th>10th Marks(%)</th>
              <th>12th Marks(%)</th>
              <th>B.Tech Marks(%)</th>
              <th>Year Gap</th>
          </thead>

          
          <tbody>

          <?php
    
          

          $selectquery = "select * from student_details where student_roll = $roll";
          $query = mysqli_query($con,$selectquery);
          $nums = mysqli_num_rows($query);

          while($res = mysqli_fetch_array($query)){
            ?>

            <tr>
              
              <td> <?php echo $res['10marks'];?> </td>
              <td> <?php echo $res['12marks'];?></td>
              <td> <?php echo $res['btech'];?></td>
              <td> <?php echo $res['yeargap'];?></td>
            </tr>
        <?php
          }
        ?>
            
          </tbody>
        </table>
        <a class="btn btn-primary" href="Update_student_academic.php" role="button">Click here to edit acamedic details!</a>

<?php
}
else{
  ?>
  <a class="btn btn-primary" href="Enter_student_academic.php" role="button">Enter your academic details</a>
  <?php
}


  ?>

  </body>