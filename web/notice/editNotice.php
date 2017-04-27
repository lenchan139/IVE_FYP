<?php
   include('../session.php');
   include('../config.php');
   include("mainMenu.php");
   //session_start();
   ?>
   <script>
   function compare()
   {
       var startDt = document.getElementById("startDate").value;
       var endDt = document.getElementById("endDate").value;
       document.getElementById("submit").type;

       if( (new Date(startDt).getTime() > new Date(endDt).getTime()))
       {
		  
	       document.getElementById("submit").type = 'hidden';
		   alert('Invaild Date!');
		   
       }else{

	       document.getElementById("submit").type = 'submit';
       }
   }
   </script>
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

   <?php include "sidebar1.php";?>
      <form action="editNotice.php?editId=<?php echo $inId?>" method="post">
 Title:<br>
 <input type="text" name="title" value="<?php echo $oldtitle;?>">
 <br>
 Description:<br>
 <textarea name="des" cols="40"value="<?php echo $olddes;?>" rows="5"></textarea>
 <br>
 Begin:
 <br>  
 <input type="date" name="begin" id="startDate" onblur="compare();" value="<?php echo $oldbegin;?>">
 <br>
 Until:<br>
 <input type="date" name="end" id="endDate" onblur="compare();" value="<?php echo $oldend;?>"> <br>
 Submission Deadline:<br>
 <input type="date" name="sdl"  value="<?php echo $oldsdl;?>"> <br>
 <br><br>
  <input type="submit" value="Submit" id="submit">
  <h3><?php echo  $msg; $msg = ''; ?><h3>
  
</form> 
	   <?php include "sidebar2.php";?>
   </body>
   
</html>
