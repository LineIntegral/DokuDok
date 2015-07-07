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
function verify_admin($un='username', $pw='password')
{
	echo $_POST[$un].$_POST[$pw];
	$something = new Config();
	$conn = $something->getConnection();
	$query = "SELECT * FROM admin
		 WHERE username = '$_POST[$un]'
		 AND password = '$_POST[$pw]'";
		 echo $query;
	$result = mysql_query("SELECT * FROM admin
		 WHERE username = $_POST[$un]
		 AND password = $_POST[$pw]");
		 //echo $result;
	if($result->num_rows == 0) {
	    //do nothing
		echo 'failed';
		
	} else {
	    session_start();
		$_SESSION['username'] = $_POST[$un];
		$_SESSION['password'] = $_POST[$pw];
		echo 'successful';
	}	
}

/*check whether there is an admin session*/
function admin_logged_in() 
{ 
	session_start();
	return isset($_SESSION['username']) && isset($_SESSION['password']);
}



?>