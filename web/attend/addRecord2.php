<?php
   include('../session.php');
   include('../config.php');
   ini_set('display_startup_errors', 1);
   error_reporting(E_ALL);
   include("mainMenu.php");
   //session_start();
   ?>
   <?php
   $class = $_POST['class'];
   
   if($class == '' ){
   
	   header("location: ./addRecord.php");
   }
   if($_SESSION['type'] == 'officer'){
	   $sid = $_POST['sid'];
	   $date = $_POST['attend_date'];
        $poster_id = 0;
        
        if($sid != '' ){
            $sql = "INSERT INTO attend(stud_id,parent_id,att_date) VALUES( $sid ,$poster_id ,'$date')";
			
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
	   <?php include "sidebar1.php";?>
      <form  method="post">
   Class: <select name="sid" required>
	    <option value="">  </option>
        <?php
        $sql1 = 'SELECT * FROM student WHERE class="' . $class . '"';
      $result1 = mysqli_query($db,$sql1);

      while($row1 = mysqli_fetch_array($result1)) {
      ?>
     		<?php $t=$row1['user_name'] . "(sid=" . $row1['student_id'] . ")";
					$v=$row1['student_id']?>
              <option value="<?php echo $v;?>"> <?php echo $t;?> </option>

      <?php
      }
      ?> 
  </select> <br/>
<input type="date" name="attend_date">
 <input type="hidden" name="class" value="<?php echo $class; ?>">
 
  <input type="submit" value="Submit">
  <h3><?php echo  $msg; $msg = ''; ?><h3>
  
</form> 
	   <?php include "sidebar2.php";?>
   </body>
   
</html>
