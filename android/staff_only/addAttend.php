<?php 
 
 if($_SERVER['REQUEST_METHOD']=='POST' || $_SERVER['REQUEST_METHOD']=='GET' ){
 //Getting values 

 $username = $_GET['username'];
 $password = $_GET['password'];
 $pid = $_GET['parent_id'];
 $sid = $_GET['student_id'];
 if($_SERVER['REQUEST_METHOD']=='POST'){
 $username = $_POST['username'];
 $password = $_POST['password'];
 $pid = $_POST['parent_id'];
 $sid = $_POST['student_id'];
 
}
$password = sha1($password);
 //Creating sql query
 $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
 
 //importing dbConnect.php script 
 require_once('../dbConnect.php');
 
 //executing query
 $result = mysqli_query($con,$sql);
 
 //fetching result
 $check = mysqli_fetch_array($result);
 
 //setup array for json
 $jsonObj->username = $check['username'];
 //got some result 
 if(isset($check) && $pid != '' && $sid!=''){
	 //save details
	$jsonObj->type = $check['type'];
	 if($check['type'] =='parent'){
 		$jsonObj->error = 'PermissionDeniedException';
	 }else if($check['type'] == 'staff' ){
		 $user_id = $check['user_id'];
  		$sql1 = "INSERT INTO attend(parent_id,stud_id,att_date) VALUES($pid, $sid  ,'" . date("Y-m-d") . 			"')";
		$result1 = mysqli_query($con,$sql1);
 		//$row1 = mysqli_fetch_array($result1);
 		if($result1 != ''){
 			$jsonObj->status = "success";
 		}else{
 			$jsonObj->status = "failed" . $result1;
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
