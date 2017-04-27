<?php
   include('../session.php');
   include('../config.php');
   include("mainMenu.php");
   //session_start();
   ?>
   <?php
   
   if($_SESSION['type'] == 'officer'){
        $new1 = mysqli_real_escape_string($db,$_POST['title']);
        
        if($new1 != ''){
            $sql = "INSERT INTO school_rule(content) VALUES( '$new1' )";
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
      <form action="addRule.php" method="post">
  New Rule's Content:<br>
  <input type="text" name="title">
  <br>
  <br><br>
  <input type="submit" value="Submit">
  <h3><?php echo  $msg; $msg = ''; ?><h3>
  
</form> 
	   <?php include "sidebar2.php";?>
   </body>
   
</html>
