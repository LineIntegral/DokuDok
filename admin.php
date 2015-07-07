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
		create_user();
		direct("admin.php", 3);
	}
	elseif(isset($_POST['log_out']))
	{
		session_destroy();
		direct('admin.php', 0);
	}
	else
	{
		echo "<form method='post' action=''>
		<input type='submit' class='button' name='create' value='Create User' />
		<input type='submit' class='button' name='log_out' value='Logout' />
		</form>";

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
		echo '<form action="" method="post" accept-charset="utf-8">
		<input type="text" name="username" value="" id="username" placeholder="username"> <br/>
		<input type="password" name="password" value="" placeholder="password">
		<p><input type="submit" name="sub" value="Login"></p>
		</form>';
	}
	
	
}
/*
	if logged in
		do below
	else
		ask for login
*/


 
?>