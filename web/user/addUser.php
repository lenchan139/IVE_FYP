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
        $newreal = mysqli_real_escape_string($db,$_POST['realname']);
        $newclass = mysqli_real_escape_string($db,$_POST['class']);
        
        if($newus != ''&& $newpw != '' && $newtype != '' && $newmail != ''){
            $sql = "INSERT INTO users(username,password,type,mail) VALUES('$newus', '$newpw' , '$newtype','$newmail')";
            $result = mysqli_query($db,$sql);
            if($result != ''){        
				
            $sql1 = "SELECT * FROM users WHERE username='$newus'";
            $result1 = mysqli_query($db,$sql1);
			$row1 = mysqli_fetch_array($result1);
			$userid = $row1['user_id'];
			if($result1 != ''){
				$sql2 = "INSERT INTO staff(staff_id,staff_name,class) VALUES($userid, '$newreal' , '$newclass')";
	            $result2 = mysqli_query($db,$sql2);
            if($result2 != ''){

                $msg = 'Insert Success!';
            }else{
                $msg = 'Failed!';
                $msg =  'Insert Success!';
	            $sql13 = "DELETE FROM users WHERE username='$newus'";
	            $result13 = mysqli_query($db,$sql13);
				$row13 = mysqli_fetch_array($result13);
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
      <form action="addUser.php" method="post">
  Username:<br>
  <input type="text" pattern="[A-Za-z0-9]+" name="newUsername" required>
  <br>
  Password:<br>
  <input type="password" name="newPassword" required>
  <br>
  E-Mail:
  <br>  
  <input type="email" name="newMail" required>
  <br>
  User Type:<br>
  <input type="radio" class="o1" name="newType" value="officer" onClick="$('#staff1').hide();"> Officer<br>
  <input type="radio" class="o2" name="newType" checked value="staff" onClick="$('#staff1').show();"> Staff 
  <br>
  <div class="staff1" id="staff1" >
  Real Name:
  <input type="text" pattern="[a-zA-Z\s]+" class="realname" required>
  Class: <select name="class" class="class" required>
    <option value="">  </option>
       <?php
       $sql19 = 'SELECT class FROM student GROUP BY class';
     $result19 = mysqli_query($db,$sql19);

     while($row19 = mysqli_fetch_array($result19)) {
     ?>
    		<?php $t=$row19['class'];?>
             <option value="<?php echo $t;?>"> <?php echo $t;?> </option>

     <?php
     }
     ?> 
 </select>
</div>
  <br>
  <input type="submit" value="Submit">
  <h3><?php echo  $msg; $msg = ''; ?><h3>
  
</form> 

	   <?php include "sidebar2.php"; ?>
   </body>
   
</html>
