<?php
   include('../session.php');
   include('../config.php');
   include("mainMenu.php");
   //session_start();
   $sClass = $_POST['class'];
   $sDate = $_POST['date'];
   $sHw_id = $_POST['hw_title'];
   $des = $_POST['des'];
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
	   <form method="POST" name="myForm" action="viewSubmittion.php">
	   Class: <select name="class" required>
		    <option value="">  </option>
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
	  <br/>Date:<input type="date" name="date" required /><br/>
	  
	  </select><br/>
	  
	  Subject: <select name="subject" >
		   <option value="">  </option>
           <?php
           $sql2 = 'SELECT subject FROM homework GROUP BY subject';
         $result2 = mysqli_query($db,$sql2);
		 
         while($row2 = mysqli_fetch_array($result2)) {
         ?>
        		<?php $t=$row2['subject'];
					  $hw_id=$row2['subject'];  ?>
                 <option value="<?php echo $hw_id;?>"> <?php echo $t;?> </option>
   
         <?php
         }
         ?> 
	  </select><br/>
	  Description: <input type="text" name="des"><br/>
	  <input type="submit" value="Search"></input>
	   </form>


   <?php include "sidebar2.php";?>
   </body>
   
</html>
