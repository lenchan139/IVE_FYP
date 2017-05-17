<?php
   include('../session.php');
   include('../config.php');
   
   include("mainMenu.php");
   //session_start();
   ?>
   <?php
   
   if($_SESSION['type'] == 'officer'){
        $newtitle = mysqli_real_escape_string($db,$_POST['title']);
        $newdes = mysqli_real_escape_string($db,$_POST['des']);
        $newurl = mysqli_real_escape_string($db,$_POST['url']);
        echo $newus . $newtype . $newmail;
        
        if($newtitle != '' && $newdes != '' && $newurl != ''){
            $sql = "INSERT INTO notification(title,desription,url) VALUES('$newtitle', '$newdes' , '$newurl')";
			//echo $sql;
            $result = mysqli_query($db,$sql);
            if($result != ''){
                $msg =  'Insert Success!';
            }else{
                $msg = 'Failed!';
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

	   <?php include "sidebar1.php"; ?>
      <form  action="PushNotify.php"method="post" id="form1">
  title:<br>
  <input type="text" name="title" required>
  <br>
  Description:
  <br>  
  <textarea form="form1" type="textarea" name="des" required></textarea>
  <br>
 Url:<br>
  <input type="text" name="url" > <br>
  <br><br>
  <input type="submit" value="Submit">
  <h3><?php echo  $msg; $msg = ''; ?><h3>
  
</form> 

	   <?php include "sidebar2.php"; ?>
   </body>
   
</html>
