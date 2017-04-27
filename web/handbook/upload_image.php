<?php
   include('../session.php');
   //session_start();
   $sClass = $_POST['class'];
   $sInType = $_POST['inType'];
   include "mainMenu.php";
   ?>
<html>

   <head>
      <title>Welcome </title>
   </head>
   
<style>
a.btnDone {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 12px;
}
</style>
   <body>
	   <?php include "sidebar1.php";?>
	   <?php
$allowedExts = array( "png");
$temp = explode(".", $_FILES["file"]["name"]);
echo $_FILES["file"]["size"];
$extension = end($temp);    
if ((($_FILES["file"]["type"] == "image/png"))
&& ($_FILES["file"]["size"] < 204800)   
&& in_array($extension, $allowedExts))
{
	if ($_FILES["file"]["error"] > 0)
	{
		echo "Error：: " . $_FILES["file"]["error"] . "<br>";
	}
	else
	{
		echo "File Name: " . $_FILES["file"]["name"] . "<br>";
		echo "Type: " . $_FILES["file"]["type"] . "<br>";
		echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
		//echo "temp: " . $_FILES["file"]["tmp_name"] . "<br>";
		
		if ($sClass == '' && $sInType=='' )
		{
			echo "Cannot access this page directly!";
		}
		else
		{
		
			move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $sInType . "_"  . $sClass);
			echo "Store at: " . "upload/"  . $sInType . "_" . $sClass;
			echo '<h4>Upload Sucess!</h4>';
			echo '<br/><a class="btnDone" href="index_' . $sInType . '.php">Done!</a>';
			
		}
	}
}
else
{
	echo "Noa a vaild JPG file.";
}
	   ?>
	   <?php include "sidebar2.php";?>
   </body>
   
</html>
