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
		<tr><a  id="iaHover" href="addUser.php">Add User</a></tr>
		<tr><p><a  id="iaHover" href="index1.php">View&Edit User</a></tr>
		</table>
		</td>
		<td valign="top" id="mainBody">