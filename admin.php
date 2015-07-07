<?php

if(file_exists("install.php"))
	unlink("install.php");

include_once("users.php");
if( isset( $_POST['create'] )){
	echo 'mnk';
	$userM = new User();
	
	$userM->setPassword();
	$userM->save();
	$userM->userInfo();
} else {
	echo "<form method='post' action=''>
	<input type='submit' class='button' name='create' value='Create User' />
	</form>";
}
 
?>