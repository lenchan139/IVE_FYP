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
   
<style>
table, th, td {
}
</style>
   <body>

	   <?php include "sidebar1.php";?>
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
      <table id="inTable" class="sortable">
                 <tr id="inTable">
                    <td id="inTable">Class</td>
                    <td id="inTable">No.</td>
                    <td id="inTable">Name</td>
                    <td id="inTable">Attend?</td>
                    
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
                <tr id="inTable">
                    <td id="inTable"><?php echo $row['class']?></td>
                    <td id="inTable"><?php echo $row['student_id']?></td>
					<td id="inTable"><?php echo $row['user_name']?></td>
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
                    <td id="inTable"><?php echo $attendStatus; ?></td>
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
