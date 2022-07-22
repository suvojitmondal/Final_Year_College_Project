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

<table border="2">
          <thead>
            <tr>
             <th>Company Name</th>
              <th>Student Name</th>
              <th>Student Roll</th>
              
  
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
              <td> <?php echo $res['student_roll'];?> </td>
              
            </tr>
        <?php
          }
        ?>
            
          </tbody>
        </table>
</body>