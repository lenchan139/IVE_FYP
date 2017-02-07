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
	   <?php include "sidebar1.php";?>
	   <br/>
	   <br/>
      <table id="inTable">
                 <tr>
                    <td id="inTable">Notice Id</td>
                    <td id="inTable">Title</td>
                    <td id="inTable">Description</td>
                    <td id="inTable">Post Date</td>
                    <td id="inTable">Begin</td>
                    <td id="inTable">Until</td>
					<td  id="inTable">Deadline</td>
                    <td id="inTable"> </td>
                    
                </tr>
              <?php
              $sql = 'SELECT * FROM notice';
            $result = mysqli_query($db,$sql);
            while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
            ?>
                <tr>
                    <td id="inTable"><?php echo $row['notice_id'];?></td>
                    <td id="inTable"><?php echo $row['title'];?></td>
                    <td id="inTable"><?php echo $row['description'];?></td>
                    <td id="inTable"><?php echo $row['post_date'];?></td>
                    <td id="inTable"><?php echo $row['begin_time'];?></td>
                    <td id="inTable"><?php echo $row['end_time'];?></td>
                    <td id="inTable"><?php echo $row['submit_deadline'];?></td>
                    <td id="inTable"><a href="editNotice.php?editId=<?php echo $row['notice_id']?>";>EDIT</a>
                </tr>
                <br>
            <?php
            }
            ?>
        </table>
  <a href="../welcome.php">Back!</a>

      <h2><a href = "logout.php">Sign Out</a></h2>
	   <?php include "sidebar2.php";?>
   </body>
   
</html>
