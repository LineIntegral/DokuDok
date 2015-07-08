<!DOCTYPE html>
<html>
<head>
<link rel='stylesheet prefetch' href='inc/jquery-ui.css'>
<link rel="stylesheet" href="inc/style.css">
</head>
<body>

<?php

if(file_exists("install.php"))
	unlink("install.php");

include_once("client_functions.php");
include_once("users.php");
include_once("admin_functions.php");

if (admin_logged_in()) 
{
	if( isset( $_POST['create'] ))
	{
		echo '<div class="login-card">';
		echo "<center>Password : ".create_user()."</center>";
		echo '</div>';
		direct("admin.php", 3);
	}
	elseif(isset($_POST['log_out']))
	{
		session_destroy();
		direct('admin.php', 0);
	}
	else
	{
		echo '<div class="login-card">';
		echo "<form method='post' action=''>
		<input type='submit' name='create' value='Create User' class='login login-submit' />
		<br/>
		<input type='submit' name='log_out' value='Logout' class='login login-submit' />
		</form>";
		echo '</div>';
	}

}
else
{
	if(isset($_POST['sub']))
	{
		verify_admin();
		direct('admin.php', 0);
	}	
	else
	{
		echo '<div class="login-card">';
		echo '<h1>Admin Panel</h1>';
		echo '<form action="" method="post" accept-charset="utf-8">
		<input type="text" name="username"  id="username" placeholder="Username"> <br/>
		<input type="text" name="password"  placeholder="Password">
		<p><input type="submit" name="sub" value="Login" class="login login-submit"></p>
		</form>';
		echo '</div>';
	}
	
	
}

?>
<script src='inc/jquery.min.js'></script>
<script src='inc/jquery-ui.min.js'></script>
</body>
</html>