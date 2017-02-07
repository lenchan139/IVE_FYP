<?php
   include('../session.php');
   include('../config.php');
   include("mainMenu.php");
   //session_start();
   $sEventId = $_POST['event'];
 
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
	   <form method="POST">
	   Event: <select name="event">
            <?php
            $sql_e = 'SELECT notice_id,title FROM notice';
          $result_e = mysqli_query($db,$sql_e);

          while($row_e = mysqli_fetch_array($result_e)) {
          ?>
         		<?php $t=$row_e['title'];
					  $eId=$row_e['notice_id']?>
                  <option value="<?php echo $eId;?>"> <?php echo $t . "(id:" . $eId . ")";?> </option>
    
          <?php
          }
          ?> 
	  </select>
	  <br/><br/>
	  <input type="submit" value="Search"></input>
	   </form>
      <table>
                 <tr>
                    <td>Class</td>
                    <td>Student No.</td>
                    <td>Student Name</td>
					<td>Parent Name</td>
                    
                </tr>
              <?php
			if($sEventId!='' ){

                $sql = 'SELECT * FROM event_attend WHERE event_id="' . $sEventId .'"' ;
				//echo $sql;
              $result = mysqli_query($db,$sql);
			  //echo mysql_num_rows($result);
              //$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
            while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
				$studId = $row['stud_id'];
				$studSql = 'SELECT * FROM student WHERE student_id="' . $studId .'"';
				$studResult = mysqli_query($db,$studSql);
				$studRow = mysqli_fetch_array($studResult,MYSQLI_ASSOC);
				
				$parId = $row['parent_id'];
				$parSql = 'SELECT * FROM parent WHERE parent_id="' . $parId .'"';
				echo $parSql;
				$parResult = mysqli_query($db,$parSql);
				$parRow = mysqli_fetch_array($parResult,MYSQLI_ASSOC);
            ?>
                <tr>
                    <td><?php echo $studRow['class']?></td>
                    <td><?php echo $studRow['student_id']?></td>
					<td><?php echo $studRow['user_name']?></td>
                    <td><?php echo $parRow['parent_name']; ?></td>
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
