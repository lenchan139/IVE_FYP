<?php
   include('../session.php');
   include('../config.php');
   include("mainMenu.php");
   //session_start();
   $sClass = $_POST['class'];
   $sDate = $_POST['date'];
   $sHw_id = $_POST['hw_title'];
   ?>
<html>

   <head>
      <title>Welcome </title>
   </head>
   
<style>
table, th, td {
    border: 1px solid black;
}
</style>
   <body>
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
	  <br/>Date<input type="date" name="date" required /><br/>
	  Homework Title: <select name="hw_title" required>
		   <option value="">  </option>
           <?php
           $sql2 = 'SELECT hw_id,title FROM homework ';
         $result2 = mysqli_query($db,$sql2);
		 
         while($row2 = mysqli_fetch_array($result2)) {
         ?>
        		<?php $t=$row2['title'];
					  $hw_id=$row2['hw_id'];  ?>
                 <option value="<?php echo $hw_id;?>"> <?php echo $t;?> </option>
   
         <?php
         }
         ?> 
	  </select>
	  <input type="submit" value="Search"></input>
	   </form>
      <table>
                 <tr>
                    <td>Class</td>
                    <td>No.</td>
                    <td>Name</td>
                    <td>Status</td>
                    
                </tr>
              <?php
			if($sClass!='' && $sDate!='' && $sHw_id!=''){

                $sql = 'SELECT * FROM student WHERE class="' . $sClass .'"' ;
				//echo $sql;
              $result = mysqli_query($db,$sql);
			  //echo mysql_num_rows($result);
              //$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
            while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
            ?>
			
                <tr>
                    <td><?php echo $row['class']?></td>
                    <td><?php echo $row['student_id']?></td>
					<td><?php echo $row['user_name']?></td>
					<?php
					$sid =  $row['student_id'];
	                $sqlIn = 'SELECT * FROM hw_checker WHERE stud_id=' . $sid . ' AND read_time=' . '"' . $sDate . '"'  . 'AND hw_id="' . $sHw_id . '"';
					echo $sqlIn;
	              $resultIn = mysqli_query($db,$sqlIn);
	              $rowIn = mysqli_fetch_array($resultIn,MYSQLI_ASSOC);
				   
				  if($rowIn['record_id'] != '' && $rowIn['record_id'] != 0){
					  $sStatus = "Y";
				  }else{
					  $sStatus = "N";
				  }
					?>
                    <td><?php echo $sStatus; ?></td>
                </tr>
                <br>
            <?php
            }
		}
            ?>
        </table>
  <a href="../welcome.php">Back!</a>

      <h2><a href = "logout.php">Sign Out</a></h2>
   </body>
   
</html>
