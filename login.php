<!DOCTYPE html>
<html>
<head>
<link rel='stylesheet prefetch' href='inc/jquery-ui.css'>
<link rel="stylesheet" href="inc/style.css">
</head>
<body>

<?php
include_once("client_functions.php");
include_once("users.php");
//session_start();

if (logged_in() == TRUE) 
{
	//echo "You are already logged in.<br/>";
	direct('list_view.php', 0);
	//echo '<meta http-equiv="refresh" content="2;URL=list_view.php">';
}
elseif(isset($_POST['pass'])) 
{
	//echo 'girdi';
	//User::
	if (User::searchUser($_POST['pass']) == TRUE) 
	{
		//echo 'orda';
		session_start();
		$_SESSION['password'] = $_POST['pass'];
		$_SESSION['creation'] = time();
		direct('list_view.php',0);
	}
	else
	{
		echo '<div class="login-card">';
		echo '<center>Wrong Password</center>';
		echo '</div>';
		direct('login.php');
	}
}

else
{
	echo '<div class="login-card">';
	echo '<h1>Log In</h1><br>';
	echo '<form method="post" action="">
   	<input type="text" name="pass" placeholder="Password"/>
   	<input type="submit" value="Login" class="login login-submit" />
	</form>';

	echo '</div>';
}

 

?>
<script src='inc/jquery.min.js'></script>
<script src='inc/jquery-ui.min.js'></script>
</body>
</html>