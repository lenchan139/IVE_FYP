<?php
   include('../session.php');
   include('../config.php');
   include("mainMenu.php");
   //session_start();
   
   $sortOpt = $_POST['sortOpt'];
   $sortType = $_POST['sortType'];
   
   ?>
<html>

   <head>
      <title>Welcome </title>
	  <script src="../sorttable.js"></script>
	  <style>

	  /* Sortable tables */
	  table.sortable thead {
	      background-color:#eee;
	      color:#666666;
	      font-weight: bold;
	      cursor: default;
	  }
	  </style>
	  
   </head>
   
<style>
</style>
   <body>
	   <?php include "sidebar1.php";?>
	    <br/>
	   <br/>
	   <form method="POST" style="display: none;">
		   Sort By:<select name="sortOpt" >
			   			<option value="notice_id">Notice Id</option>
			   			<option value="title">Title</option>
			   			<option value="Description">Description</option>
			   			<option value="post_date">Post Date</option>
			   			<option value="begin_time">Begin</option>
			   			<option value="end_time">Until</option>
			   			<option value="dealine">Deadline</option>	
					</select>
					<select name="sortType">
						<option value="ASC">ASC</option>
						<option value="DESC">DESC</option>
					</select>
			<input type="submit" value="sort it!">
		</form>
	  
      <table id="sortabletable" class="sortable">
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
			  if($sortOpt !='' && $sortType != ''){
				  $sql = $sql . ' ORDER BY ' . $sortOpt . ' ' . $sortType;
			  }
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

   </body>
   
</html>
