<?php
   include('../session.php');
   include('../config.php');
   
   include("mainMenu.php");
   //session_start();
   ?>
   <?php
   
   if($_SESSION['type'] == 'officer'){
        $newus = mysqli_real_escape_string($db,$_POST['newUsername']);
        $newpw = mysqli_real_escape_string($db,$_POST['newPassword']);
        $newtype = mysqli_real_escape_string($db,$_POST['newType']);
        $newmail = mysqli_real_escape_string($db,$_POST['newMail']);
        
        
        if($newus != ''&& $newpw != '' && $newtype != '' && $newmail != ''){
            $sql = "INSERT INTO users(username,password,type,mail) VALUES('$newus', '$newpw' , '$newtype','$newmail')";
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
      <form action="addUser.php" method="post">
  username:<br>
  <input type="text" name="newUsername">
  <br>
  Password:<br>
  <input type="password" name="newPassword">
  <br>
  E-Mail:
  <br>  
  <input type="email" name="newMail">
  <br>
  User Type:<br>
  <input type="radio" name="newType" value="officer" checked> officer<br>
  <input type="radio" name="newType" value="parent"> Parent<br>
  <input type="radio" name="newType" value="staff"> Staff 
  <br><br>
  <input type="submit" value="Submit">
  <h3><?php echo  $msg; $msg = ''; ?><h3>
  
  <a href="index1.php">Back!</a>
</form> 

	   <?php include "sidebar2.php"; ?>
   </body>
   
</html>
