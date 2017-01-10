<?php
   include('session.php');
   include('mainMenu.php');
?>
<html">
   
   <head>
      <title>Welcome </title>
   </head>
   
   <body>
      <h1>Welcome <?php echo $login_session; ?></h1> 
      <h1>User Type: <?php echo $user_type; ?></h1>
      <h5><a href="user/index1.php" >User Adminatration</a></h5>
      <h2><a href = "logout.php">Sign Out</a></h2>
   </body>
   
</html>
