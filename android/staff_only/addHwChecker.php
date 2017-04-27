<?php 
 
 if($_SERVER['REQUEST_METHOD']=='POST' || $_SERVER['REQUEST_METHOD']=='GET' ){
 //Getting values 

 $username = $_GET['username'];
 $password = $_GET['password'];
 $hw_id = $_GET['hw_id'];
 $stud_id = $_GET['stud_id'];
 $staff_id = $_GET['staff_id'];
 if($_SERVER['REQUEST_METHOD']=='POST'){
 $username = $_POST['username'];
 $password = $_POST['password'];
 $hw_id = $_POST['hw_id'];
 $stud_id = $_POST['stud_id'];
 $staff_id = $_POST['staff_id'];
 
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
 if(isset($check) && $hw_id != '' && $stud_id!='' && $staff_id != ''){
	 //save details
	$jsonObj->type = $check['type'];
	 if($check['type'] =='parent'){
 		$jsonObj->error = 'PermissionDeniedException';
	 }else if($check['type'] == 'staff' ){
		 $user_id = $check['user_id'];
  		$sql1 = "INSERT INTO hw_checker(hw_id,stud_id,staff_id,read_time) VALUES($hw_id, $stud_id ,$user_id ,'" . 		date("Y-m-d") . "')";
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
