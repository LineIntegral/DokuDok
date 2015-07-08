<?php

include_once("config.php");
include_once("users.php");

function totalNumber($docname)
{
	$pdftext = file_get_contents($docname);
		$num = preg_match_all("/\/Page\W/", $pdftext, $dummy);
		return $num;
}

function logged_in() 
{
	session_start();
	if (isset($_SESSION['password']) == FALSE) {
		return FALSE;
	}
	//echo 'girmedi';
	if (isset($_SESSION['creation'])) {
		if (time() - $_SESSION['creation'] > 180) {
			User::deleteUser($_SESSION['password']);
			return FALSE;
		}
	} else return FALSE;
	
	return TRUE;
}

function direct($addr, $time = 1)
{
	echo "<meta http-equiv='refresh' content='$time;URL=$addr'>";
}

function get_pathname()
{
	$config = new Config();
	$conn = $config->getConnection();

	$query = "SELECT pathname from admin";
	$result = $conn->query($query);

	if($result->num_rows > 0)
	{
		while ($row = $result->fetch_assoc())
		{
			return $row["pathname"];
		}
	}
}
?>