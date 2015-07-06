<?php

function logged_in() 
{
	session_start();
	if (isset($_SESSION['password']) == FALSE) {
		return FALSE;
	}
	//echo 'girmedi';
	if (isset($_SESSION['creation'])) {
		if (time() - $_SESSION['creation'] > 60) {
			return FALSE;
		}
	} else return FALSE;
	
	return TRUE;
}

function direct($addr, $time = 1)
{
	echo "<meta http-equiv='refresh' content='$time;URL=$addr'>";
}
?>