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

//print_r( list_docs() );
echo 'there';
	
?>