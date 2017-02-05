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
    $sql = "SELECT * FROM notice WHERE notice_id ='$inId'";
            $result = mysqli_query($db,$sql);
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
            $oldnid = $row['notice_id'];
            $oldtitle = $row['title'];
            $olddes = $row['description'];
            $oldbegin = $row['begin_time'];
            $oldend = $row['end_time'];
            $oldsdl = $row['submit_deadline'];
    
   
    
    
    //update
        $newtitle = mysqli_real_escape_string($db,$_POST['title']);
        $newdes = mysqli_real_escape_string($db,$_POST['des']);
        $newbegin = mysqli_real_escape_string($db,$_POST['begin']);
        $newend = mysqli_real_escape_string($db,$_POST['end']);
        $newsdl = mysqli_real_escape_string($db,$_POST['sdl']);
        if( $newtitle != '' && $newdes != '' && $newbegin != '' && $newend != '' && $newsdl != '' ){
      
            $sql = "UPDATE notice SET title='$newtitle',description='$newdes',begin_time='$newbegin',end_time='$newend',submit_deadline='$newsdl' WHERE notice_id='$inId'";
            
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
      
      <form action="editNotice.php?editId=<?php echo $inId?>" method="post">
 Title:<br>
 <input type="text" name="title" value="<?php echo $oldtitle;?>">
 <br>
 Description:<br>
 <input type="text" name="des" value="<?php echo $olddes;?>">
 <br>
 Begin:
 <br>  
 <input type="date" name="begin" value="<?php echo $oldbegin;?>">
 <br>
 Until:<br>
 <input type="date" name="end" value="<?php echo $oldend;?>"> <br>
 Submittion Deadline:<br>
 <input type="date" name="sdl" value="<?php echo $oldsdl;?>"> <br>
 <br><br>
  <input type="submit" value="Submit">
  <h3><?php echo  $msg; $msg = ''; ?><h3>
  
  <a href="../welcome.php">Back!</a>
</form> 
   </body>
   
</html>
