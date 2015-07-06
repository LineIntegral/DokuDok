<?php
include_once("list.php");

$lst = new BookList("../../");
//echo 'here';
function list_docs()
{
	global $lst;
	//echo 'there';
	return $lst->getFileList();
}

function init_list()
{
	session_start();
	 echo 'your session is' . $_SESSION['password'];
  
	  if( isset( $_SESSION['password'] )){

	  //echo 	'<img src="book.jpg" alt="Book" height="1000" width="1000">';
 
	  	//session_destroy();
		//echo '<meta http-equiv="refresh" content="3;URL=login.html">';
		//die('THE ENJOYING WAY FOR READING ');
		return TRUE;
	  }
	  else{
	  	echo "YOUR SESSION END ";
		return FALSE;
	  }	
}

//print_r( list_docs() );
//echo 'there';
	
?>