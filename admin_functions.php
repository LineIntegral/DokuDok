<?php
function create_user()
{
	$userM = new User();
	$userM->setPassword();
	$userM->save();
	$userM->userInfo();
}


?>