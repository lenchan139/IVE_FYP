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
   $subject = $_POST['subject'];
   if($class == '' || $subject == ''){
   
	   header("location: ./addRecord.php");
   }
   if($_SESSION['type'] == 'officer'){
	   $sid = $_POST['sid'];
	   $hwid = $_POST['hwid'];
        $poster_id = 1;
        
        if($sid != '' && $hwid != ''){
            $sql = "INSERT INTO hw_checker(hw_id,stud_id,staff_id,read_time) VALUES($hwid, $sid ,$poster_id ,'" . date("Y-m-d") . "')";
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
   Title: <select name="hwid" required>
	    <option value="">  </option>
        <?php
        $sql1x = 'SELECT * FROM homework WHERE subject="' . $subject . '"' . ' AND ' . 'hw_class="' . $class . '"';
		
      $result1x = mysqli_query($db,$sql1x);

      while($row1x = mysqli_fetch_array($result1x)) {
      ?>
     		<?php 
			$t=$row1x['title'] ."(post date=" . $row1x['post_date'] . "|" . 'deadline=' . $row1x['deadline']
			. ")" ; 
			$v = $row1x['hw_id'];
			?>
              <option value="<?php echo $v;?>"> <?php echo $t;?> </option>

      <?php
      }
      ?> 
  </select><br>
 <input type="hidden" name="class" value="<?php echo $class; ?>">
 <input type="hidden" name="subject" value="<?php echo $subject; ?>">
 
  <input type="submit" value="Submit">
  <h3><?php echo  $msg; $msg = ''; ?><h3>
  
</form> 
	   <?php include "sidebar2.php";?>
   </body>
   
</html>
