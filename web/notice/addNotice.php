<?php
   include('../session.php');
   include('../config.php');
   ini_set('display_startup_errors', 1);
   error_reporting(E_ALL);
   include("mainMenu.php");
   //session_start();
   ?>
   <?php
   
   if($_SESSION['type'] == 'officer'){
        $new1 = mysqli_real_escape_string($db,$_POST['title']);
        $new2 = mysqli_real_escape_string($db,$_POST['des']);
        $new3 = mysqli_real_escape_string($db,$_POST['begin']);
        $new4 = mysqli_real_escape_string($db,$_POST['until']);
        $new5 = mysqli_real_escape_string($db,$_POST['deadline']);
        $poster_id = 1;
        
        if($new1 != ''&& $new2 != '' && $new3 != '' && $new4 != ''){
            $sql = "INSERT INTO notice(poster_id,title,description,post_date,begin_time,end_time,submit_deadline) VALUES($poster_id, '$new1' , '$new2','" . date("Y-m-d") . "', '$new3','$new4','$new5')";
            $result = mysqli_query($db,$sql);
			
            if($result != ''){
                $msg =  'Insert Success!';
            }else{
                $msg = 'Failed!' . $result;
            }
            
        }
      
   }else{
   
   header("location: ../login.php");
   }
   
   
   ?>
<html>

   <head>
      <title>Welcome </title>
   </head>
   
   <body>
      <form action="addNotice.php" method="post">
  Title:<br>
  <input type="text" name="title">
  <br>
  Description:<br>
  <input type="text" name="des">
  <br>
  Begin:
  <br>  
  <input type="date" name="begin">
  <br>
  Until:<br>
  <input type="date" name="until"> <br>
  Submittion Deadline:<br>
  <input type="date" name="deadline"> <br>
  <br><br>
  <input type="submit" value="Submit">
  <h3><?php echo  $msg; $msg = ''; ?><h3>
  
  <a href="../welcome.php">Back!</a>
</form> 
   </body>
   
</html>
