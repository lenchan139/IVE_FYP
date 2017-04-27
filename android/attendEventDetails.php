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
	$jsonObj->type = $check['type'];
	 if($check['type'] =='parent'){
 		$sql1 = "SELECT * FROM student WHERE parent_id=" . $check['user_id'] ;
		//echo $sql1;
	    $result1 = mysqli_query($con,$sql1);
		//$row1 = mysqli_fetch_array($result1);
		$i =0;
		$stud_array = array();

	    //$stud_array.put("stud_id", 0);
		    //$stud_array.put("stud_id", 1);
			$attend_array = array();
		while ($row1 = mysqli_fetch_array($result1)) {
			
		    $row_array['student_id'] =  $row1['student_id'];
			$row_array['student_name'] = $row1['user_name'];
			$row_array['student_class'] = $row1['class'];
	 		$sql2 = "SELECT * FROM event_attend WHERE stud_id=" .  $row_array['student_id'];
			//echo $sql2;
		    $result2 = mysqli_query($con,$sql2);
			while($row2 = mysqli_fetch_array($result2)){
			
			    $row_array1['event_id'] =  $row2['event_id'];
			    $row_array1['attend_date'] =  $row2['att_date'];
		        array_push($attend_array, $row_array1);
			}

			$row_array['student_attend'] = $attend_array;
			//$row1 = mysqli_fetch_array($result1);
			$i =0;
			
	        array_push($stud_array, $row_array);
			$attend_array = array();
			$i=$i+1;
		}
		$jsonObj->studArray = $stud_array;
	    //array_push($return_arr,$row_array);
	 }else if($check['type'] == 'staff'){

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
 } 
