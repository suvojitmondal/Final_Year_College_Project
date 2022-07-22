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

    <title>TPO Dashboard</title>
  </head>
  <body>


  <table border="2">
          <thead>
            <tr>
             <th>Company Name</th>
              <th>Package</th>
              <th>Job Location</th>
              
              
  
          </thead>

          
          <tbody>

          <?php
    
          include '../Database Connection/dbcon.php';

          $selectquery = "select * from upcoming_company";
          $query = mysqli_query($con,$selectquery);
          //$nums = mysqli_num_rows($query);

          
        if(mysqli_num_rows($query) <1){
            ?>
            <tr>
              <td> NULL</td>
              <td> NUll </td>
              <td> NULL </td>
              
              
            </tr>
            <?php
        }
        else{

        
        

          while($res = mysqli_fetch_array($query)){
            ?>

            <tr>
              <td> <?php echo $res['name'];?></td>
              <td> <?php echo $res['package']; ?> </td>
              <td> <?php echo $res['job_location']; ?> </td>
              
              
            </tr>
        <?php
          }
        }

          if(isset($_POST['remove_upcoming_company']))
        {  

            $removequery = "delete from upcoming_company where id = 0";
            $query = mysqli_query($con,$removequery);
            
            if($query){
                ?>
                <script type="text/javascript">
                    alert("Company removed!!");
                </script>
                <?php
                header("location: Dashboard_Tpo.php");
                exit;
            }
            
        }

        ?>
            
          </tbody>
        </table>

        <a class="btn btn-primary" href="edit_upcoming_company.php" role="button">Add/Edit</a>

        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" autocomplete="off">

             <button class="btn btn-primary" name="remove_upcoming_company" >Remove Company</button>
        </form>
        


  </body>