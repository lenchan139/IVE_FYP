<?php
   include('../session.php');
   include('../config.php');

   //session_start();
   ?>
<html>
  <head>
  <style>

  #bigInTable {

      border: 0px solid black;
	  padding:8px;
  }

  #inTable {

      border: 1px solid black;
	  background: #FFFFFF;
  }
  #bigTable {

	  background: #DDDDDD;
      border: 0px ;
  }
  #aHover{
	  color:black;

	  padding: 8px;
  }
  #aHover:Hover{
	  background: white;
	  padding: -8px;
  }
    <title></title>
    <meta content="">
    <style></style>
  </head>
  <body>
  <h1>Attandence Management System Panel</h1>
  <Table id="bigTable">
  <tr>
                    <td id="bigInTable"><a id="aHover" href="user/index1.php">User Adminatration</a></td>
					<td id="bigInTable"><a  id="aHover" href="notice/index1.php">Notice</a></td>
					<td id="bigInTable"><a  id="aHover" href="attend/index1.php">Attendance</a></td>
					<td id="bigInTable"><a  id="aHover" href="homework/index1.php">Homework</a></td>
					<td id="bigInTable"><a  id="aHover" href="handbook/index1.php">handbook</a></td>
					<td id="bigInTable"><a  id="aHover" href="qrcode/index1.php">QR Code</a></td>
					<td id="bigInTable"><a  id="aHover" href="notification/index1.php">notification</a></td>
                    <td id="bigInTable">Login as <?php echo $user_check."(".  $user_type . ")"; ?></td>
                    <td id="bigInTable"><a  id="aHover" href = "logout.php">Sign Out</a></td>
  
  </table>
  
  
  
  
  </body>
</html>
