<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Filter Student Data</title>
  </head>
<body>
<?php
include '../Database Connection/dbcon.php';

$total_student_query = "select * from ssignup";
$total_student = mysqli_num_rows(mysqli_query($con,$total_student_query));

$total_placed_student_query = "select * from student_company group by student_roll";
$total_placed_student = mysqli_num_rows(mysqli_query($con,$total_placed_student_query));

$total_unplaced_student = $total_student - $total_placed_student;


echo "<h3> Total Students - ".$total_student;
echo "</h3> <br>";

echo "<h3> Total Placed Students - ".$total_placed_student;
echo "</h3> <br>";

echo "<h3> Total Placed Students - ".$total_unplaced_student;
echo "</h3> <br>";
?>
  <P><b>Placed student details - </b></P>
        <table border="2">
          <thead>
            <tr>
             <th>Company Name</th>
              <th>Student Name</th>
              
              
  
          </thead>

          
          <tbody>

          <?php
    
          include '../Database Connection/dbcon.php';

          $selectquery = "select student_company.student_name, student_company.student_roll, companymaster.name from student_company inner join companymaster where student_company.company_id = companymaster.id order by name asc";
          $query = mysqli_query($con,$selectquery);
          //$nums = mysqli_num_rows($query);

          while($res = mysqli_fetch_array($query)){
            ?>

            <tr>
              <td> <?php echo $res['name'];?></td>
              <td> <?php echo $res['student_name']; ?> </td>
              
              
            </tr>
        <?php
          }
        ?>
            
          </tbody>
        </table>


  <br>
        <P><b>Unplaced student details - </b></P>
<table border="2">
          <thead>
            <tr>
             
              <th>Student Name</th>
              
              
  
          </thead>

          
          <tbody>

          <?php
    
          

          $selectquery = "select * from ssignup where rollno not in (select student_roll from student_company)";
          $query = mysqli_query($con,$selectquery);
          //$nums = mysqli_num_rows($query);

          while($res = mysqli_fetch_array($query)){
            ?>

            <tr>
              
              <td> <?php echo $res['name']; ?> </td>
              
              
            </tr>
        <?php
          }
        ?>
            
          </tbody>
        </table>
</body>