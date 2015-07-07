<?php

include_once("config.php");

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