<?php 
 
 if($_SERVER['REQUEST_METHOD']=='POST' || $_SERVER['REQUEST_METHOD']=='GET' ){
 //Getting values 

 $username = $_GET['username'];
 $password = $_GET['password'];
 if($_SERVER['REQUEST_METHOD']=='POST'){
 $username = $_POST['username'];
 $password = $_POST['password'];
}
$password = sha1($password);
 //Creating sql query
 $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
 
 //importing dbConnect.php script 
 require_once('dbConnect.php');
 
 //executing query
 $result = mysqli_query($con,$sql);
 
 //fetching result
 $check = mysqli_fetch_array($result);
 
 //setup array for json
 $jsonObj->username = $check['username'];
 //got some result 
 if(isset($check)){
	 //save details
	$jsonObj->user_id = $check['user_id'];
	$jsonObj->type = $check['type'];
	 if($check['type'] ==='parent'){
 		$sql1 = "SELECT * FROM parent WHERE parent_id=" . $check['user_id'] ;
		//echo $sql1;
	    $result1 = mysqli_query($con,$sql1);
		$row1 = mysqli_fetch_array($result1);
		if(isset($row1)){
			$jsonObj->parent_name = $row1['parent_name'];
		}
	 }else if($check['type'] === 'staff'){

  		$sql1 = "SELECT * FROM staff WHERE staff_name='" . $check['user_id'] . "'";
 	    $result1 = mysqli_query($con,$sql1);
 		$row1 = mysqli_fetch_array($result1);
 		if(isset($row1)){
 			$jsonObj->parent_name = $row1['staff_name'];
 		}
	 }
	 $jsonObj->isVaild = true;
 //displaying success 
 echo json_encode($jsonObj);
 }else{
 //displaying failure
 $jsonObj->isVaild = false;
 echo json_encode($jsonObj);
 }
 mysqli_close($con);
 } 
