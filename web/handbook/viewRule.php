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
	   <a href="./addRule.php">Add Rule</a>
	   <br/>
      <table>
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
                <tr>
                    <td><?php echo $count;?></td>
                    <td><?php echo $row['content'];?></td>
                    <td><a href="editRule.php?editId=<?php echo $row['id']?>";>EDIT</a>
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
