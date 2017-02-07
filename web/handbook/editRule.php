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
    $sql = "SELECT * FROM school_rule WHERE id ='$inId'";
            $result = mysqli_query($db,$sql);
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
            $oldnid = $row['id'];
            $oldtitle = $row['content'];
    
   
    
    
    //update
        $newtitle = mysqli_real_escape_string($db,$_POST['title']);
        if( $newtitle != ''){
      
            $sql = "UPDATE school_rule SET content='$newtitle'WHERE id='$inId'";
            
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
      
      <form action="editRule.php?editId=<?php echo $inId?>" method="post">
 Old Content:<br>
 <input type="text" name="null_ar" value="<?php echo $oldtitle;?>" readonly>
 <br>
 New Content:<br>
 <input type="text" name="title" value="">
 <br>
  <input type="submit" value="Submit">
  <h3><?php echo  $msg; $msg = ''; ?><h3>
  
  <a href="../welcome.php">Back!</a>
</form> 
   </body>
   
</html>
