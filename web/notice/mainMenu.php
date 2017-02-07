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
    <title></title>
    <meta content="">
    <style></style>
  </head>
  <body>
  <h1>Attandence Management System Panel</h1>
  <Table>
  <tr>
                    <td>><a href="../user/index1.php">User Adminatration</a></td>
					<td><a href="../notice/index1.php">Notice</a></td>
					<td><a href="../attend/index1.php">Attendance</a></td>
					<td><a href="../homework/index1.php">Homework</a></td>
					<td><a href="../handbook/index1.php">handbook</a></td>
					<td><a href="../qrcode/index1.php">QR Code</a></td>
					<td><a href="../notification/index1.php">notification</a></td>
                    <td>Username: <?php echo $user_check;?></td>
                    <td>User Type: <?php echo $user_type; ?></td>
                    <td><a href = "../logout.php">Sign Out</a></td>
  
  </table>
  
  
  
  
  </body>
</html>
