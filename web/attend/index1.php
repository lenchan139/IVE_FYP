<?php
   include('../session.php');
   include('../config.php');
   include("mainMenu.php");
   //session_start();
   $sClass = $_POST['class'];
   $sDate = $_POST['date'];
 
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
	   <a href="addUser.php"></a>
	   <form method="POST">
	   Class: <select name="class">
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
	  <br/>Date<input type="date" name="date" /><br/>
	  <input type="submit" value="Search"></input>
	   </form>
      <table>
                 <tr>
                    <td>Class</td>
                    <td>No.</td>
                    <td>Name</td>
                    <td>Attend?</td>
                    
                </tr>
              <?php
			if($sClass!='' || $sDate!=''){

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
	                $sqlIn = 'SELECT * FROM attend WHERE stud_id=' . $sid . ' AND att_date=' . '"' . $sDate . '"';
					//echo $sqlIn;
	              $resultIn = mysqli_query($db,$sqlIn);
	              $rowIn = mysqli_fetch_array($resultIn,MYSQLI_ASSOC);
				   
				  if($rowIn['record_id'] != '' && $rowIn['record_id'] != 0){
					  $attendStatus = Y;
				  }else{
					  $attendStatus = N;
				  }
					?>
                    <td><?php echo $attendStatus; ?></td>
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
