<?php
   include('../session.php');
   include('../config.php');
   include("mainMenu.php");
   //session_start();
   ?>
<html>

   <head>
      <title>Welcome </title>
   </head>
   
<style>

</style>
   <body>
	   <?php include "sidebar1.php"; ?>
	   <a href="addUser.php">>Add new user<</a>
      <table   id="inTable">
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
            ?>
                <tr id="inTable">
                    <td id="inTable"><?php echo $row['user_id']?></td>
                    <td id="inTable"><?php echo $row['username']?></td>
                    <td id="inTable"><?php echo $row['type']?></td>
                    <td id="inTable"><?php echo $row['mail']?></td>
                    <td id="inTable"><a href="editUser.php?editId=<?php echo $row['user_id']?>">EDIT</a>
                </tr>
                <br>
            <?php
            }
            ?>
        </table>
  <a href="../welcome.php">Back!</a>

      <h2><a href = "logout.php">Sign Out</a></h2>
   </body>
   
</html>
