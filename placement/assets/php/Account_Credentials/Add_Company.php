
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

    <title>Company Master</title>
  </head>
  <body>

        <div>
          <a class="btn btn-primary" href="Add_new_company.php" role="button">Add new Company</a>
        </div>
        
        <table border="2">
          <thead>
            <tr>
              <th>Company Name</th>
              <th>Package</th>
              <th>Job location</th>
          </thead>

          
          <tbody>

          <?php
    
          include '../Database Connection/dbcon.php';

          $selectquery = "select * from companymaster";
          $query = mysqli_query($con,$selectquery);
          $nums = mysqli_num_rows($query);

          while($res = mysqli_fetch_array($query)){
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
        <a class="btn btn-primary" href="Dashboard_Tpo.php" role="button">Back To Dashboard</a>
  </body>
    
    
