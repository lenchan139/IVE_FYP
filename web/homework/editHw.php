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
    $sql = "SELECT * FROM homework WHERE hw_id ='$inId'";
            $result = mysqli_query($db,$sql);
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
            $oldnid = $row['hw_id'];
            $oldtitle = $row['title'];
            $olddes = $row['description'];
            $oldsubject = $row['subject'];
            $oldclass = $row['hw_class'];
            $oldsdl = $row['deadline'];
    
   
    
    
    //update
        $newtitle = mysqli_real_escape_string($db,$_POST['title']);
        $newdes = mysqli_real_escape_string($db,$_POST['des']);
        $newclass = mysqli_real_escape_string($db,$_POST['class']);
        $newsubject = mysqli_real_escape_string($db,$_POST['subject']);
        $newsdl = mysqli_real_escape_string($db,$_POST['sdl']);
        if( $newtitle != '' && $newdes != '' && $newclass != '' && $newsubject != '' && $newsdl != '' ){
      
            $sql = "UPDATE homework SET title='$newtitle',description='$newdes',hw_class='$newclass',subject='$newsubject',deadline='$newsdl' WHERE hw_id='$inId'";
            
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

   <?php include "sidebar1.php";?>
      <form action="editHw.php?editId=<?php echo $inId?>" method="post">
 Title:<br>
 <input type="text" name="title" value="<?php echo $oldtitle;?>">
 <br>
  Class: <select name="class" required>
	    <option value="">  </option>
        <?php
        $sql1 = 'SELECT class FROM student GROUP BY class';
      $result1 = mysqli_query($db,$sql1);

      while($row1 = mysqli_fetch_array($result1)) {
      ?>
     		<?php $t=$row1['class'];?>
              <option value="<?php echo $t;?>" <?php if($t==$oldclass){echo 'selected="selected"';}?>> <?php echo $t;?> </option>

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
              <option value="<?php echo $t;?>" <?php if($t==$oldsubject){echo 'selected="selected"';}?>> <?php echo $t;?> </option>

      <?php
      }
      ?> 
  </select><br>
 Description:<br>
 <input type="text" name="des" value="<?php echo $olddes;?>">
 <br>
 Submittion Deadline:<br>
 <input type="date" name="sdl" value="<?php echo $oldsdl;?>"> <br>
 <br><br>
  <input type="submit" value="Submit">
  <h3><?php echo  $msg; $msg = ''; ?><h3>
  
  <a href="../welcome.php">Back!</a>
</form> 
	   <?php include "sidebar2.php";?>
   </body>
   
</html>
