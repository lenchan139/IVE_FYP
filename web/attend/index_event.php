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
   </head>
   
   <body>
	   <?php include "sidebar1.php";?>
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
	  <input type="submit" value="Search"></input>
	   </form>
      <table id="inTable" class="sortable">
                 <tr id="inTable">
                    <td id="inTable">Class</td>
                    <td id="inTable">Student No.</td>
                    <td id="inTable">Student Name</td>
					<td id="inTable">Parent Name</td>
                    
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
				
				$parResult = mysqli_query($db,$parSql);
				$parRow = mysqli_fetch_array($parResult,MYSQLI_ASSOC);
            ?>
                <tr id="inTable">
                    <td id="inTable"><?php echo $studRow['class']?></td>
                    <td id="inTable"><?php echo $studRow['student_id']?></td>
					<td id="inTable"><?php echo $studRow['user_name']?></td>
                    <td id="inTable"><?php echo $parRow['parent_name']; ?></td>
                </tr>
                <br>
            <?php
            }
		}
            ?>
        </table>

   </body>
   
</html>
