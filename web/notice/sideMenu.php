<?php
   include('../session.php');
   include('../config.php');

   //session_start();
   ?>
<html>
  <head>
  <style>
table, th, td {
    border: 1px solid black;
	
}

.left {
    width: 20%;
    height: 100%;
    float:left;
	}
	</style>
  </head>
  <body>
<div class="left">
  <Table>

                    <tr><td>><a href="index1.php">User Adminatration</a></td></tr>
                    <tr>Username: <?php echo $user_check;?></tr>
                    <tr>User Type: <?php echo $user_type; ?></tr>
                    <tr><a href = "../logout.php">Sign Out</a></tr>
  
  </table>
  
</div>
  
  
  </body>
</html>
