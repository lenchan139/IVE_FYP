<?php 

   include("session.php");
   
   ?>

<html>
  <head>
  <style>
table, th, td {
    border: 1px solid black;
}
    <title></title>
    <meta content="">
    <style></style>
  </head>
  <body>
  <h1>Attandence Management System Panel</h1>
  <Table>
  <tr>
                    <td>><a href="user/index1.php">User Adminatration</a></td>
                    <td>Username: <?php echo $user_check;?></td>
                    <td>User Type: <?php echo $user_type; ?></td>
                    <td><a href = "logout.php">Sign Out</a></td>
  
  </table>
  
  
  
  
  </body>
</html>
