<?php
   include('config.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   $user_type = $_SESSION['type'];
   
   $ses_sql = mysqli_query($db,"select username from admin where username = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['username'];
   $msgs = 'Login Username' + $_SESSION['login_user'];
   //echo $msgs;
   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
   }
?>
