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
      <table>
                 <tr>
                    <td>Notice Id</td>
                    <td>Title</td>
                    <td>Description</td>
                    <td>Post Date</td>
                    <td>Begin</td>
                    <td>Until</td>
                    <td>Edit!</td>
                    
                </tr>
              <?php
              $sql = 'SELECT * FROM notice';
            $result = mysqli_query($db,$sql);
			echo $row['description'];
			echo 'I';
            while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
            ?>
                <tr>
                    <td><?php echo $row['notice_id'];?></td>
					<?echo 'I'?>
                    <td><?php echo $row['title'];?></td>
                    <td><?php echo $row['description'];?></td>
                    <td><?php echo $row['post_date'];?></td>
                    <td><?php echo $row['begin_time'];?></td>
                    <td><?php echo $row['end_time'];?></td>
                    <td><?php echo $row['submit_deadline'];?></td>
                    <td><a href="editNotice.php?editId=<?php echo $row['notice_id']?>";>EDIT</a>
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
