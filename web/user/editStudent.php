<?php
   include('../session.php');
   include('../config.php');
   include("mainMenu.php");
   //session_start();
   ?>
   <?php
   //init
   
   //init
   
   if($_SESSION['type'] == 'officer'){
   if($_GET['editId'] != ''){
   
   $inId = $_GET["editId"];
    $sql = "SELECT * FROM student WHERE student_id ='$inId'";
            $result = mysqli_query($db,$sql);
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
            $oldname = $row['user_name'];
            $oldclass = $row['class'];
            $oldparent = $row['parent_id'];
    
   
    
    
    //update
        $newname = mysqli_real_escape_string($db,$_POST['newName']);
        $newclass = mysqli_real_escape_string($db,$_POST['newClass']);
        $newpid = mysqli_real_escape_string($db,$_POST['parentId']);
        if( $newname != '' && $newclass != ''  && $newpid != ''){
      
            $sql = "UPDATE student SET user_name='$newname',class='$newclass',parent_id='$newpid' WHERE student_id='$inId'";
            
            $result = mysqli_query($db,$sql);
            if($result != ''){
                $msg =  'Change Success!';
            }else{
                $msg = 'Failed!';
            }
            
        }
      }else{
      header("location: ../welcome.php");
      }
   }else{
   
   header("location: ../login.php");
   }
   
   
   ?>
<html>

   <head>
      <title>Welcome </title>
   </head>
   
   <body>

	   <?php include "sidebar1.php"; ?>
      
      <form action="editStudent.php?editId=<?php echo $inId?>" method="post">

  Student Name:<br>
  <input type="text" pattern="[A-Za-z\s]+" name="newName" value='<?php echo $oldname;?>' required></br>
		  Parent/Guardian: <br/>
		  <select name="parentId">
			    <option></option>
            <?php
            $sql1 = 'SELECT * FROM parent';
          $result1 = mysqli_query($db,$sql1);
          $row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC);
		
          while($row1 = mysqli_fetch_array($result1)) {
          ?>
                  <option  <?php if($oldparent == $row1['parent_id']){echo 'selected';}?> value="<?php echo $row1['parent_id'];?>"><?php echo $row1['parent_name']. '(id:' . $row1['parent_id'] . ')'?>   </option>
              <br>
          <?php
          }
          ?>
	  </select><br/>
  Class:<br>
  <select name="newClass" required><br/>
	  <option></option>
	  <?php
	   $tArray1 = array('1','2','3','4','5','6');
	   $tArray2 = array('A','B','C','D');
	   foreach ($tArray1 as $value1){
	 	  foreach ($tArray2 as $value2){
	   ?>
	    <option value="<?php echo $value1 . $value2;?>"><?php echo $value1 . $value2;?></option>
		<?php
	}}
		?>
  </select>
  <br><br>
  <input type="submit" value="Submit">
  <h3><?php echo  $msg; $msg = ''; ?><h3>
  
</form> 

	   <?php include "sidebar2.php"; ?>
   </body>
   
</html>
