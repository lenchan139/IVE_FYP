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
	  <script src="../sorttable.js"></script>
	  <style>

	  /* Sortable tables */
	  table.sortable thead {
	      background-color:#eee;
	      color:#666666;
	      font-weight: bold;
	      cursor: default;
	  }
	  #imgGo{
	  	max-height: 400px; 
		max-width: 400px;
	  }
	  </style>
   </head>
   
<style>
</style>
   <body>
	   <?php include "sidebar1.php";?>
	   <form method="POST">
	   Month: <select name="class" required>
		   <option value=""></option>
            <?php
			$arrMonth = array(1,2,3,4,5,6,7,8,9,10,11,12);
			
          for($i=0;$i<12;$i++){
			  
          ?>
         		<?php $t=$arrMonth[$i];?>
                  <option value="<?php echo $t;?>"> <?php echo $t;?> </option>
    
          <?php
          }
          ?> 
	  </select>
	  <input type="submit" value="Go!"></input>
	   </form>
      <table id="inTable" class="sortable">
		  <tr id="inTable">
			  <td id="inTable">Month</td>
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
			<img id="imgGo" src="upload/schedule_<?php echo $sClass;?>">
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
<input type="hidden" name="inType" value="schedule"/>
<input id="submit" type="<?php if($sClass!=''){echo "submit";}else{echo "hidden";}?>" type="submit" value="Upload!">
<p>Note:<br/> Max size:1MB; <br/>Acceptable Type: png;</p>
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
