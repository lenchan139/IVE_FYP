<?php
   include('../session.php');
   include('../config.php');
   include("mainMenu.php");
   //session_start();
   $sClass = $_POST['class'];
   $sUpload =$_POST['file'];
   //$sDate = $_POST['date'];
 
   ?>
<html>

   <head>
      <title>Welcome </title>
   </head>
   
<style>
  #imgGo{
  	max-height: 400px; 
	max-width: 400px;
  }
</style>
   <body>
	   <?php include "sidebar1.php";?>
	   <a href="addUser.php"></a>
	   <form method="POST">
	   Class: <select name="class">
		   <option value=""></option>
            <?php
            $sql1 = 'SELECT class FROM student GROUP BY class';
          $result1 = mysqli_query($db,$sql1);

          while($row1 = mysqli_fetch_array($result1)) {
          ?>
         		<?php $t=$row1['class'];?>
                  <option value="<?php echo $t;?>"> <?php echo $t;?> </option>
    
          <?php
          }
          ?> 
	  </select>
	  <input type="submit" value="Go!"></input>
	   </form>
      <table id="inTable">
		  <tr id="inTable">
			  <td id="inTable">Class</td>
			  <td id="inTable">Image</td>
			  <td id="inTable">Upload New...</td>
				  
		</tr>
                 <tr id="inTable">
                 <td id="inTable">
            
              <?php
			if($sClass!='' ){
				echo $sClass;
		      }else{
				  echo "Please choose the class first.";
		      }
			 
			  
			  
            
			
            ?>
		</td>
		<td id="inTable">
			<img id="imgGo" src="upload/timetable_<?php echo $sClass;?>">
		</td>
	<td id="inTable">
		<?php
		if($sClass == ''){
			echo"<h4>you need choose class first!";
			echo '<div style="display:none;">';
		}
		?>
		<form action="upload_image.php" enctype="multipart/form-data" method="post">
Choose File：<input id="file" name="file" type="<?php if($sClass!=''){echo "file";}else{echo "hidden";}?>" required /><br/>
Upload To:<input type="text" name="class" <?php if($sClass!=''){echo'value="' .  $sClass . '""';}?> 				required  readonly/>
<input type="hidden" name="inType" value="timetable"/>
<input id="submit" type="<?php if($sClass!=''){echo "submit";}else{echo "hidden";}?>" type="submit" value="Upload!">
<p>Note:<br/> Max size:1MB; <br/>Acceptable type: png;</p>
</form>
		<?php
		if($sClass == ''){
			echo '</div>';
		}
		?>
		</td></tr>
        </table>

	   <?php include "sidebar2.php";?>
   </body>
   
</html>
