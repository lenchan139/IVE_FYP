<?php
   include('../session.php');
   //session_start();
   ?>
   
<style>
table, tr, td{
}
#tdBg{
	padding: 15px;
	 background: #DDDDDD;
}
#brK{
	padding: 10px;
}
#iaHover:Hover{
	background: white;
}
#iaHover{
	color: black;
}
#mainBody{
	padding:20px;
}

</style>

<table>
	<tr>
		<td valign="top " id="tdBg" >
		<!--sidebar here-->
		<br/>
		<table>
		<tr><p><a  id="iaHover" href="addUser.php">Add Staff/Officer</a></p></tr>
		<tr><p><a  id="iaHover" href="addUser_parent.php">Add Parent/Guardian</a></p></tr>
		<tr><p><a  id="iaHover" href="index1.php">View&Edit User</a></p></tr>
		<hr/>
		<tr><p><a  id="iaHover" href="addStudent.php">Add Student</a></p></tr>
		<tr><p><a  id="iaHover" href="index_student.php">View&Edit Student</a></p></tr>
		</table>
		</td>
		<td valign="top" id="mainBody">