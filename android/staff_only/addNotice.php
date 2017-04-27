<?php 
 
 if($_SERVER['REQUEST_METHOD']=='POST' || $_SERVER['REQUEST_METHOD']=='GET' ){
 //Getting values 

 $username = $_GET['username'];
 $password = $_GET['password'];
 $title = $_GET['title'];
 $description = $_GET['description'];
 $begin_time = $_GET['begin'];
 $end_time = $_GET['end'];
 $deadline = $_GET['deadline'];
 if($_SERVER['REQUEST_METHOD']=='POST'){
 $username = $_POST['username'];
 $password = $_POST['password']; 
 $title = $_POST['title'];
 $description = $_POST['description'];
 $begin_time = $_POST['begin'];
 $end_time = $_POST['end'];
 $deadline = $_POST['deadline'];
 
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
 if(isset($check) && $title != '' && $begin_time!='' && $end_time != '' && $deadline != ''){
	 //save details
	$jsonObj->type = $check['type'];
	 if($check['type'] =='parent'){
 		$jsonObj->error = 'PermissionDeniedException';
	 }else if($check['type'] == 'staff' ){
		 $user_id = $check['user_id'];
  		$sql1 = "INSERT INTO notice(poster_id,title,description,begin_time,end_time,submit_deadline,post_date) VALUES($user_id，'$title', '$description' ,'$begin_time' ,'$end_time','$deadline' ,'" . 		date("Y-m-d") . "')";
		$result1 = mysqli_query($con,$sql1);
		echo $sql1;
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
