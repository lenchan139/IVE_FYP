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
table, th, td {
    border: 1px solid black;
}
</style>
   <body>
	   <a href="addUser.php">>Add new user<</a>
      <table>
                 <tr>
                    <td>User Id</td>
                    <td>Username</td>
                    <td>User Type</td>
                    <td>E-Mail</td>
                    <td>Edit!</td>
                    
                </tr>
              <?php
              $sql = 'SELECT * FROM users';
            $result = mysqli_query($db,$sql);
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

            while($row = mysqli_fetch_array($result)) {
            ?>
                <tr>
                    <td><?php echo $row['user_id']?></td>
                    <td><?php echo $row['username']?></td>
                    <td><?php echo $row['type']?></td>
                    <td><?php echo $row['mail']?></td>
                    <td><a href="editUser.php?editId=<?php echo $row['user_id']?>">EDIT</a>
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
