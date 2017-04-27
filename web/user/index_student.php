<?php
   include('../session.php');
   include('../config.php');
   include("mainMenu.php");
   //session_start();
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
	   <?php require "sidebar1.php"; ?>
	   <table id="inTable" class="sortable">
                 <tr id="inTable">
                    <td id="inTable">Student Id</td>
                    <td id="inTable">Student Name</td>
                    <td id="inTable">Class</td>
                    <td id="inTable">Parent Id</td>
                    <td id="inTable">Edit!</td>
                    
                </tr id="inTable">
              <?php
              $sql = 'SELECT * FROM student';
            $result = mysqli_query($db,$sql);
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

            while($row = mysqli_fetch_array($result)) {
            ?>
                <tr id="inTable">
                    <td id="inTable"><?php echo $row['student_id']?></td>
                    <td id="inTable"><?php echo $row['user_name']?></td>
                    <td id="inTable"><?php echo $row['class']?></td>
                    <td id="inTable"><?php echo $row['parent_id']?></td>
                    <td id="inTable"><a href="editStudent.php?editId=<?php echo $row['student_id']?>">EDIT</a>
                </tr>
                <br>
            <?php
            }
            ?>
        </table>
   </body>
   
</html>
