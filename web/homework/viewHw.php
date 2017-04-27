<?php
   include('../session.php');
   include('../config.php');
   include("mainMenu.php");
   error_reporting(E_ALL);
   ini_set('display_errors', 1);
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
   
<style>
table, th, td {
    border: 1px solid black;
}
</style>
   <body>
	   <br/>
	   <a href="./addNotice.php">Add Notice</a>
	   <br/>
      <table class="sortable">
                 <tr>
                    <td>Id</td>
                    <td>Title</td>
                    <td>Class</td>
                    <td>Subject</td>
                    <td>Description</td>
                    <td>Post Date</td>
                    <td>Deadline</td>
                    <td>Edit!</td>
                    
                </tr>
              <?php
              $sql = 'SELECT * FROM homework';
            $result = mysqli_query($db,$sql);
			echo $row['description'];
			echo 'I';
            while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
            ?>
                <tr>
                    <td><?php echo $row['hw_id'];?></td>
                    <td><?php echo $row['title'];?></td>
                    <td><?php echo $row['hw_class'];?></td>
                    <td><?php echo $row['subject'];?></td>
                    <td><?php echo $row['description'];?></td>
                    <td><?php echo $row['post_date'];?></td>
                    <td><?php echo $row['deadline'];?></td>
                    <td><a href="editHw.php?editId=<?php echo $row['hw_id']?>";>EDIT</a>
                </tr>
                <br>
            <?php
            }
            ?>
        </table>
  <a href="../welcome.php">Back!</a>

   </body>
   
</html>
