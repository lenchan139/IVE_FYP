<?php
   include('../session.php');
   //session_start();
   $sClass = $_POST['class'];
   $sInType = $_POST['inType'];
 
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
	   <?php
// 允许上传的图片后缀
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
			echo '<br/><a href="index_' . $sInType . '.php">Done!</a>';
			
		}
	}
}
else
{
	echo "Noa a vaild JPG file.";
}
	   ?>
   </body>
   
</html>
