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
		<tr><p><a  id="iaHover" href="index1.php">Pushed Notification</a></tr>
		<tr><p><a  id="iaHover" href="PushNotify.php">Pushing New Notification</a></tr>
		</table>
		</td>
		<td valign="top" id="mainBody">