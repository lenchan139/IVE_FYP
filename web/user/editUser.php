<?php
   include('../session.php');
   include('../config.php');
   include("mainMenu.php");
   //session_start();
   ?>
   <?php
   //init
   
   //init
   
   if($_SESSION['type'] == 'officer'){
   if($_GET['editId'] != ''){
   
   $inId = $_GET["editId"];
    $sql = "SELECT * FROM users WHERE user_id ='$inId'";
            $result = mysqli_query($db,$sql);
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
            $oldus = $row['username'];
            $oldType = $row['type'];
            $oldmail = $row['mail'];
    
   
    
    
    //update
        $newtype = mysqli_real_escape_string($db,$_POST['newType']);
        $newmail = mysqli_real_escape_string($db,$_POST['newMail']);
        if( $newtype != '' && $newmail != ''){
      
            $sql = "UPDATE users SET type='$newtype',mail='$newmail' WHERE user_id='$inId'";
            
            $result = mysqli_query($db,$sql);
            if($result != ''){
                $msg =  'Change Success!';
            }else{
                $msg = 'Failed!';
            }
            
        }
      }else{
      header("location: ../welcome.php");
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
      
      <form action="editUser.php?editId=<?php echo $inId?>" method="post">
  username:<br>
  <input readonly type="text" name="newUsername" value="<?php echo $oldus; ?>" readonly>

  <br>
  E-Mail:
  <br>  
  <input type="email" name="newMail" value="<?php echo $oldmail; ?>" >
  <br>
  User Type:<br>
  <input type="radio" name="newType"  disabled='disabled' value="officer" <?php if($oldType == 'officer') { echo 'checked';}?>  > officer<br>
  <input type="radio" name="newType"  disabled='disabled' value="parent"<?php if($oldType == 'parent') { echo 'checked';}?>  > Parent/Guardian<br>
  <input type="radio" name="newType"  disabled='disabled' value="staff"<?php if($oldType == 'staff') { echo 'checked';}?>  > Staff 
  <br><br>
  <input type="submit" value="Submit">
  <h3><?php echo  $msg; $msg = ''; ?><h3>
  
</form> 

	   <?php include "sidebar2.php"; ?>
   </body>
   
</html>
