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
      <table id="inTable" class="tablesorter">
              <?php
              $sql = 'SELECT * FROM school_rule';
            $result = mysqli_query($db,$sql);
			$count = 0;
            while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
            ?>
		

	  		<?php
	  		if($row['visible'] != 1){
	  			echo '<div style="display:none;">';
	  		}else{}
	  			$count=$count+1;
	  		
	  		?>
                <tr id="inTable">
                    <td id="inTable"><?php echo $count;?></td>
                    <td id="inTable"><?php echo $row['content'];?></td>
                    <td id="inTable"><a href="editRule.php?editId=<?php echo $row['id']?>";>EDIT</a>
                </tr>
                <br>
            <?php
            }
            ?>
        </table>

	   <?php include "sidebar2.php";?>
   </body>
   
</html>
