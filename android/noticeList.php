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

	$attend_array = array();
	 //save details
	$jsonObj->type = $check['type'];
	 if($check['type'] =='parent' || $check['type'] == 'staff' ){
	 		$sql2 = "SELECT * FROM notice";
			//echo $sql2;
		    $result2 = mysqli_query($con,$sql2);
			while($row2 = mysqli_fetch_array($result2)){
			
			    $row_array1['notice_id'] =  $row2['notice_id'];
			    $row_array1['title'] =  $row2['title'];
			    $row_array1['description'] =  $row2['description'];
			    $row_array1['post_date'] =  $row2['post_date'];
			    $row_array1['begin_time'] =  $row2['begin_time'];
			    $row_array1['end_time'] =  $row2['end_time'];
			    $row_array1['submit_deadline'] =  $row2['submit_deadline'];
		        array_push($attend_array, $row_array1);
			}

			$row_array['student_attend'] = $attend_array;
			//$row1 = mysqli_fetch_array($result1);
			$i =0;
			
			$i=$i+1;
		}
		$jsonObj->noticeList = $attend_array;
	    //array_push($return_arr,$row_array);
	 }else{

 			$jsonObj->error = 'PermissionDeniedException';
 		
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
 
