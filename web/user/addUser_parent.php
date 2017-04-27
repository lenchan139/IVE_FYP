<?php
   include('../session.php');
   include('../config.php');
   
   include("mainMenu.php");
   //session_start();
   ?>
   <?php
   
   if($_SESSION['type'] == 'officer'){
        $newus = mysqli_real_escape_string($db,$_POST['newUsername']);
        $newpw = sha1(mysqli_real_escape_string($db,$_POST['newPassword']));
        $newtype = mysqli_real_escape_string($db,$_POST['newType']);
        $newmail = mysqli_real_escape_string($db,$_POST['newMail']);
        $newrn = mysqli_real_escape_string($db,$_POST['newRealname']);
        
        if($newus != ''&& $newpw != '' && $newtype != '' && $newmail != ''){
            $sql = "INSERT INTO users(username,password,type,mail) VALUES('$newus', '$newpw' , '$newtype','$newmail')";
            $result = mysqli_query($db,$sql);
            if($result != ''){
				if($newrn != ''){    
					//search user id 

	                $sql1 = 'SELECT * FROM users WHERE username="'.$newus. '"';
					//echo $sql1;
	              $result1 = mysqli_query($db,$sql1);
	              $row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC);
				  $inserted_userId = $row1['user_id'];
				  
				  //insert extra info
					$sql2 = "INSERT INTO parent(parent_id,parent_name) VALUES($inserted_userId, '$newrn')";
					//echo $sql2;
		            $result2 = mysqli_query($db,$sql2);
		            if($result2 != ''){
		                $msg =  'Insert Success!';
		            }else{
		                $msg = 'Failed!';
		                $sql11 = 'DELETE FROM users WHERE user_id="'.$inserted_userId. '"';
						//echo $sql11;
		              $result11 = mysqli_query($db,$sql11);
		              $row11 = mysqli_fetch_array($result11,MYSQLI_ASSOC);
						
		            }
			
				}
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
      <form action="addUser_parent.php" method="post">

   	   <b>Important: After creating parent account, you should <a href="addStudent.php">assign student</a> to parent account!</b><br/><br/>
  Username:<br>
  <input type="text" name="newUsername" pattern="[A-Za-z0-9]+" required>
  <br>
  Password:<br>
  <input type="password" name="newPassword" required>
  <br>
  Real Name:
  <br>  
  <input type="text" name="newRealname"  pattern="[A-Za-z\s]+" required><br/>
  E-Mail:
  <br>  
  <input type="email" name="newMail" required>
  <br>
  User Type:<br>
  <input type="radio" name="newType" value="parent" checked> Parent/Guardian
  <br><br>
  <input type="submit" value="Submit">
  <h3><?php echo  $msg; $msg = ''; ?><h3>
  
</form> 

	   <?php include "sidebar2.php"; ?>
   </body>
   
</html>
