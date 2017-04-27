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
   
<style>

</style>
   <body>
	   <?php include "sidebar1.php"; ?>
      <table   id="inTable"class="sortable">
                 <tr id="inTable">
                    <td id="inTable">User Id</td>
                    <td id="inTable">Username</td>
                    <td id="inTable">User Type</td>
                    <td id="inTable">E-Mail</td>
                    <td id="inTable">Edit!</td>
                    
                </tr id="inTable">
              <?php
              $sql = 'SELECT * FROM users';
            $result = mysqli_query($db,$sql);
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

            while($row = mysqli_fetch_array($result)) {
				$typeG = $row['type'];
				if($typeG == 'parent'){
					$typeG = 'parent/guardian';
				}
            ?>
                <tr id="inTable">
                    <td id="inTable"><?php echo $row['user_id']?></td>
                    <td id="inTable"><?php echo $row['username']?></td>
                    <td id="inTable"><?php echo $typeG;?></td>
                    <td id="inTable"><?php echo $row['mail']?></td>
                    <td id="inTable"><a href="editUser.php?editId=<?php echo $row['user_id']?>">EDIT</a>
                </tr>
                <br>
            <?php
            }
            ?>
        </table>
   </body>
   
</html>
