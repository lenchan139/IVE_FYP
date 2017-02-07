<?php
   include('../session.php');
   include('../config.php');
   include("mainMenu.php");
   //session_start();
   $sStud_id = $_POST['stud_id'];

   echo "'" . $sStud_id ."'";
   ?>
<html>

   <head>
      <title>Welcome </title>
   </head>
   
<style>
</style>
<script type="text/javacsript" src="js/jquery-3.1.1.min.js" ></script>
<script type="text/javascript">
</script>
   <body>
	  <?php include "sidebar1.php";?>
	   <form method="POST">

	 	   Student: <select name="stud_id" required>
			   <option value="" / >
	             <?php
	             $sql1 = 'SELECT * FROM student ';
	           $result1 = mysqli_query($db,$sql1);

	           while($row1 = mysqli_fetch_array($result1)) {
	           ?>
	          		<?php $sId=$row1['student_id'];?>
	          		<?php $sString=$row1['user_name'] . " (stud_id=" . $row1['student_id'] . "," . " Class=" . 							$row1['class'] . ")";?>
	                   <option value="<?php echo $sId;?>" 
						   <?php if($sStud_id == $row1['student_id']){echo 'selected="selected"';}?>> <?php echo $sString;?> </option>
    
	           <?php
	           }
	           ?> 
	 	  </select>
		  <input type="submit" />
	   </form>
	   <!--using Google Charts to generate QR Code -->
	   <?php
	   if($sStud_id !=''){
	   $outUrl = "http://chart.apis.google.com/chart?cht=qr&chl=ams_qr:{'student_id': '" .  														$sStud_id . "'}&chs=300x300";
	   
	   }
	   ?>
	   <img 
		   src="<?php echo $outUrl;?>" /></br>
   	
	   
  <a href="../welcome.php">Back!</a>

      <h2><a href = "logout.php">Sign Out</a></h2>
	  <?php include "sidebar2.php";?>
   </body>
   
</html>
