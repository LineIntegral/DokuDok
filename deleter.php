<?php
//include('client_functions.php');

//include_once('users.php');



function logout()
{
	//delete_user();
	session_start();
	session_destroy();
	
}




?>