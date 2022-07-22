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

    <title>Filter Student Data</title>
  </head>
<body>



<?php
    
  include '../Database Connection/dbcon.php'; 
?>

<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" autocomplete="off" >
    <label for="marks_10">Choose Class 10th Marks:</label>

    <select name="marks_10" id="marks_10">
        <option type=text value="50">>50%</option>
        <option type=text value="60">>60%</option>
        <option type=text value="70">>70%</option>
        <option type=text value="80">>80%</option>
        <option type=text value="90">>90%</option>
    </select>

    <label for="marks_12">Choose Class 12th Marks:</label>

    <select name="marks_12" id="marks_12">
        <option type=text value="50">>50%</option>
        <option type=text value="60">>60%</option>
        <option type=text value="70">>70%</option>
        <option type=text value="80">>80%</option>
        <option type=text value="90">>90%</option>
    </select>

    <label for="btech">Choose B.Tech Marks:</label>

    <select name="btech" id="btech">
        <option type=text value="50">>50%</option>
        <option type=text value="60">>60%</option>
        <option type=text value="70">>70%</option>
        <option type=text value="80">>80%</option>
        <option type=text value="90">>90%</option>
    </select>

    <label for="yeargap">Choose Year Gap:</label>

    <select name="yeargap" id="yeargap">
        <option type=text value="0">No gap</option>
        <option type=text value="1">1</option>
        <option type=text value="2">2</option>
        <option type=text value="3">3</option>
    </select>

  <button type="submit" name="submit_student_filter" class="btn btn-primary" >Filter</button>
  <a class="btn btn-primary" href="Dashboard_Tpo.php" role="button">Back To Dashboard</a>

  </form>



<?php 

//function showdetails(){  -- onclick=showdetails()
    if(isset($_POST['submit_student_filter'])){

    $marks_10 = (int)mysqli_real_escape_string($con, $_POST['marks_10']);
    $marks_12 = (int)mysqli_real_escape_string($con, $_POST['marks_12']);
    $btech = (int)mysqli_real_escape_string($con, $_POST['btech']);
    $yeargap = (int)mysqli_real_escape_string($con, $_POST['yeargap']);
    try{
        
        ?>
        <table border="2">
          <thead>
            <tr>
              <th>Student Name</th>
              <th>Student Email</th>
   
          </thead>

          
          <tbody>

          <?php
    
  
        
          //include '../Database Connection/dbcon.php';
          $selectquery = "select name, email from ssignup where rollno in (select student_roll from student_details where 10marks >= '$marks_10' and 12marks >= '$marks_12' and btech >= '$btech' and yeargap = '$yeargap')";
          $query = mysqli_query($con,$selectquery);
          

          while($res = mysqli_fetch_array($query)){
            ?>

            <tr>
              <td> <?php echo $res['name']; ?> </td>
              <td> <?php echo $res['email'];?> </td>
              
            </tr>
        <?php
          }
        ?>
            
          </tbody>
        </table>
    <?php
        }
        catch(Exception $e){
            echo $e;
        }
    }
    

    // if(isset($_SERVER['HTTP_REFERER'])) {
    //     header("location: Track_student.php");
    // }
?>

</body>
<script src="jquery-3.5.1.min.js">

</script>