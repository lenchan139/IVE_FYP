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
      <form  method="post" action="addRecord2.php">
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
 
 
  <input type="submit" value="Next">
  <h3><?php echo  $msg; $msg = ''; ?><h3>
 
</form> 
	   <?php include "sidebar2.php";?>
   </body>
   
</html>
