<?php
   include('../session.php');
   include('../config.php');
   include("mainMenu.php");
   //session_start();
   $sClass = $_POST['class'];
   $sDate = $_POST['date'];
   $subject = $_POST['subject'];
   $des = $_POST['des'];
   $sHw_id = $_POST['hw_id'];
   $des = $_POST['des'];
   if($sClass=='' || $sDate=='' || $subject==''){
	   //header("location:./viewSmPre.php");
   }
   ?>
<html>

   <head>
 	  <script src="../sorttable.js"></script>
 	  <style>

 	  /* Sortable tables */
 	  table.sortable thead {
 	      background-color:#eee;
 	      color:#666666;
 	      font-weight: bold;
 	      cursor: default;
 	  }
 	  </style>
      <title>Welcome </title>
   </head>
   
<style>
table, th, td {
}
</style>
   <body>
	   <?php include "sidebar1.php";?>
	<script>
	function validateForm() {
	    var x = document.forms["myForm"]["class"].value;
	    var y = document.forms["myForm"]["date"].value;
	    var z = document.forms["myForm"]["hw_title"].value;
	    if (x == "" && y=="" && z=="") {
	        alert("Name must be filled out");
	        return false;
	    }
	}
	</script>
	   <form method="POST" name="myForm" >
		   <input type="hidden" name="class" value="<?php echo $sClass;?>">
		   <input type="hidden" name="subject" value="<?php echo $subject;?>">
		   <input type="hidden" name="date" value="<?php echo $sDate;?>">
		   <input type="hidden" name="des" value="<?php echo $des;?>">
	  Homework Title: <select name="hw_id" >
		   <option value="">  </option>
           <?php
		   if($des==''){
           $sql2 = 'SELECT hw_id,title FROM homework WHERE hw_Class="' . $sClass. '" AND subject="' . $subject 				.'"';
	   }else{
	   	 $sql2 = 'SELECT hw_id,title FROM homework WHERE hw_Class="' . $sClass. '" AND subject="' . $subject 				.'" AND description LIKE "' . $des .'"';
	   }
		   
         $result2 = mysqli_query($db,$sql2);
		 
         while($row2 = mysqli_fetch_array($result2)) {
         ?>
        		<?php $t=$row2['title'];
					  $hw_id=$row2['hw_id'];
					    ?>
                 <option value="<?php echo $hw_id;?>"> <?php echo $t;?> </option>
   
         <?php
         }
		 
         ?> 
	  </select><br/>
	  <?php ?>
	 <input type="submit">
	   </form>
      <table id="inTable" class="sortable">
                 <tr id="inTable">
                    <td id="inTable">Class</td>
                    <td id="inTable">No.</td>
                    <td id="inTable">Name</td>
                    <td id="inTable">Status</td>
                    
                </tr>
              <?php
			if($sClass!='' && $sDate!='' && $sHw_id!=''){
				
                $sql = 'SELECT * FROM student WHERE class="' . $sClass .'"' ;
			
              $result = mysqli_query($db,$sql);
			  //echo mysql_num_rows($result);
              //$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
            while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
            ?>
			
                <tr id="inTable">
                    <td id="inTable"><?php echo $row['class']?></td>
                    <td id="inTable"><?php echo $row['student_id']?></td>
					<td id="inTable"><?php echo $row['user_name']?></td>
					<?php
					$sid =  $row['student_id'];
				
	                $sqlIn = 'SELECT * FROM hw_checker WHERE stud_id=' . $sid . ' AND read_time=' . '"' . $sDate 					. '"' ;
			
	              $resultIn = mysqli_query($db,$sqlIn);
	              $rowIn = mysqli_fetch_array($resultIn,MYSQLI_ASSOC);
				   
				  if($rowIn['record_id'] != '' && $rowIn['record_id'] != 0){
					  $sStatus = "Y";
				  }else{
					  $sStatus = "N";
				  }
					?>
                    <td id="inTable"><?php echo $sStatus; ?></td>
                </tr>
                <br>
            <?php
            }
		}
            ?>
        </table>

   <?php include "sidebar2.php";?>
   </body>
   
</html>
