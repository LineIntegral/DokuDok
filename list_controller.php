<?php

include_once("list.php");
//echo 'hello';
include_once("client_functions.php");
//echo 'hello';

$lst = new BookList(get_pathname());

//echo 'here';
function list_docs()
{
	global $lst;
	//echo 'there';
	return $lst->getFileList();
}

function list_verify()
{
	if (logged_in() != TRUE) {
		//echo 'You are not logged in';
		direct('login.php', 0);
		//echo 'hih';
	}
}

//print_r( list_docs() );
//echo 'there';
	
?>