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
}
</style>
   <body>
	   <?php include "sidebar1.php";?>
      <table id="inTable">
                 <tr id="inTable">
                    <td id="inTable">ID</td>
                    <td id="inTable">Title</td>
					<td id="inTable">Description</td>
                    <td id="inTable">Url</td>
                    
                </tr>
              <?php
              $sql = 'SELECT * FROM notification';
            $result = mysqli_query($db,$sql);
            //$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

            while($row = mysqli_fetch_array($result)) {
            ?>
                <tr id="inTable">
                    <td id="inTable"><?php echo $row['notify_id']?></td>
                    <td id="inTable"><?php echo $row['title']?></td>
                    <td id="inTable"><?php echo $row['desription']?></td>
                    <td id="inTable"><?php echo $row['url']?></td>
                    <!--<td id="inTable"><a href="del.php?editId=<?php// echo $row['notify_id']?>">EDIT</a>-->
                </tr>
                <br>
            <?php
            }
            ?>
        </table>

	  <?php include "sidebar2.php";?>
   </body>
   
</html>
