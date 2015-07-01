<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "doku";

$conn = NULL;
function doku_setup() 
{
	// Create connection
	global $conn, $servername, $username, $password, $dbname;
	$conn = new mysqli($servername, $username, $password);
	
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

	// Create database
	$createdb = "CREATE DATABASE IF NOT EXISTS $dbname";
	if  ($conn->query($createdb) !== TRUE) {
		echo 'error occured<br>';
		return;
	}
	
	$conn->query("USE $dbname");
	
	$createtb  = "CREATE TABLE IF NOT EXISTS books (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	docname VARCHAR(40) NOT NULL,
	title VARCHAR(30) NOT NULL,
	pagenum INT(10) UNSIGNED
	)";
	
	if  ($conn->query($createtb) !== TRUE) {
		echo 'error occured in table';
	}
	
	
}


function doku_end()
{
	global $conn;
	$conn->close();
}


?>