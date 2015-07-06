<?php
include_once("client_functions.php");
include_once("users.php");
//session_start();

if (logged_in() == TRUE) 
{
	echo "You are already logged in.<br/>";
	direct('list_view.php');
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
		direct('list_view.php');
	}
	else
	{
		//echo 'burda';
		echo 'Something bad happened: login';
		direct('login.php');
	}
}

else
{
	echo '<form method="post" action="">
   	<input type="text" name="pass" />
   	<input type="submit" value="LOGIN" style="padding:10px 20px;" />
	</form>';
}

 

?>

