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
        $new3 = mysqli_real_escape_string($db,$_POST['class']);
        $new4 = mysqli_real_escape_string($db,$_POST['subject']);
        $new5 = mysqli_real_escape_string($db,$_POST['deadline']);
        $poster_id = 1;
        
        if($new1 != ''&& $new2 != '' && $new3 != '' && $new4 != '' && $new5!=''){
            $sql = "INSERT INTO homework(poster_id,title,description,post_date,hw_class,subject,deadline) VALUES($poster_id, '$new1' , '$new2','" . date("Y-m-d") . "', '$new3','$new4','$new5')";
            $result = mysqli_query($db,$sql);
			//echo $sql;
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
  Title:<br>
  <input type="text" name="title" required>
  <br>
   Class: <select name="class" required>
	    <option value="">  </option>
        <?php
        $sql1 = 'SELECT class FROM student GROUP BY class';
      $result1 = mysqli_query($db,$sql1);

      while($row1 = mysqli_fetch_array($result1)) {
      ?>
     		<?php $t=$row1['class'];?>
              <option value="<?php echo $t;?>"> <?php echo $t;?> </option>

      <?php
      }
      ?> 
  </select> <br/>
   Subject: <select name="subject" required>
	    <option value="">  </option>
        <?php
        $sql1x = 'SELECT subject FROM list_subject';
      $result1x = mysqli_query($db,$sql1x);

      while($row1x = mysqli_fetch_array($result1x)) {
      ?>
     		<?php $t=$row1x['subject'];?>
              <option value="<?php echo $t;?>"> <?php echo $t;?> </option>

      <?php
      }
      ?> 
  </select><br>
  Description:<br>
  <input type="text" name="des" required>
  <br>
  Submittion Deadline:<br>
  <input type="date" name="deadline" required> <br>
  <br><br>
  <input type="submit" value="Submit">
  <h3><?php echo  $msg; $msg = ''; ?><h3>
  
  <a href="../welcome.php">Back!</a>
</form> 
	   <?php include "sidebar2.php";?>
   </body>
   
</html>
