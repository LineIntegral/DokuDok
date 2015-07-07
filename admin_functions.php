<?php
include_once('config.php');

function create_user()
{
	$userM = new User();
	$userM->setPassword();
	$userM->save();
	$userM->userInfo();
}

/*
recieves and checks post data, start a admin session if value
*/
function verify_admin()
{
	$config = new Config();
	$conn = $config->getConnection();

	$query = "SELECT username,password from admin";
	$result = $conn->query($query);

	if($result->num_rows > 0)
	{
		while ($row = $result->fetch_assoc())
		{
			if($_POST['username'] == $row['username'] && $_POST['password'] == $row['password'])
			{
				session_start();
				$_SESSION['username'] = $_POST['username'];
				$_SESSION['password'] = $_POST['password'];
				return TRUE;
			}
		}
	}
	return FALSE;
}

/*check whether there is an admin session*/
function admin_logged_in() 
{ 
	session_start();
	return isset($_SESSION['username']) && isset($_SESSION['password']);
}



?>