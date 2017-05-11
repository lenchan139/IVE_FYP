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
 //echo $sql;
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

	 		$sql2 = "SELECT * FROM school_rule WHERE visible=1";
			//echo $sql2;
		    $result2 = mysqli_query($con,$sql2);
			$i=0;
			$array1;
			while($row2 = mysqli_fetch_array($result2)){
			    $row_array1['rid'] =  $row2['id'];
			    $row_array1['content'] =  $row2['content'];
			    //$row_array1['visible'] =  $row2['visible'];
				//$t[] = $row2;
		        //$array1[1] = $row_array1;
				//$attend_array[] = $row2;
				array_push($attend_array,$row_array1);
				$i = $i + 1;
				
			}
			//echo json_encode($attend_array);
			//$array1 = array();
			//array_push($array1,$attend_array);
			//$row_array['student_attend'] = $attend_array;
			//$jsonObj->rule = $attend_array;
			//$row_array['rule'] = $attend_array;
			//$row1 = mysqli_fetch_array($result1);
			
			
		}
		
		$jsonObj->ruleList = $attend_array;
		
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
 
