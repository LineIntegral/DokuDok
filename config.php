<?php

class Config
{
	private $serverName = "localhost";
	private $username = "root";
	private $password = "root";
	private $dbName = "doku";
	private $conn;

	public function __construct()
	{
		$this->conn = new mysqli($this->serverName, $this->username, $this->password);

		if ($this->conn->connect_error)
	    	die("Connection failed: " . $conn->connect_error);
	}

	public function getConnection()
	{
		$this->conn->query("USE $this->dbName");
		return $this->conn;
	}

	public function createDB()
	{
		$createdb = "CREATE DATABASE IF NOT EXISTS $this->dbName";
		if($this->conn->query($createdb) !== TRUE) 
		{
			echo 'error occured in db creation<br>';
			return;
		}
	}

	public function createBooksTable()
	{
		$this->conn->query("USE $this->dbName");

		$createtb  = "CREATE TABLE IF NOT EXISTS books (
		id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		docname VARCHAR(40) NOT NULL,
		title VARCHAR(30) NOT NULL,
		pagenum INT(10) UNSIGNED
		)";
	
		if($this->conn->query($createtb) !== TRUE)
		{
			echo 'error occured in table';
			return;
		}
	}
	
	public function createUserTable()
	{	
		
		$this->conn->query("USE $this->dbName");

		$createtb  = "CREATE TABLE IF NOT EXISTS users (
		id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,	
		password VARCHAR(8) NOT NULL
		)";
		
		if($this->conn->query($createtb) !== TRUE)
		{
			//echo 'error occured in user table';
			return;
		}
		
	}
	
	public function createAdminTable()
	{	
		
		$this->conn->query("USE $this->dbName");

		$createtb  = "CREATE TABLE IF NOT EXISTS admin (
		id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		username VARCHAR(15) NOT NULL,	
		password VARCHAR(8) NOT NULL,
		pathname VARCHAR(200) NOT NULL
		)";
		
		if($this->conn->query($createtb) !== TRUE)
		{
			//echo 'error occured in user table';
			return;
		}
	}

	public function __destruct()
	{
		$this->conn->close();
	}
}



?>