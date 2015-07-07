<?php
include_once('config.php');


class AdminUser
{

	private $username;
	private $password;
	private $pathname;

	public function getAPassword()
	{
		return $this->password;
	}

	public function getAUserName()
	{
		return $this->username;
	}

	public function setAPassword($passWd)
	{
		$this->password = $passWd;
	}


	public function setAUserName($userV)
	{
		$this->username= $userV;
	}

	

	public function save()
	{
		$config = new Config();
		$conn = $config->getConnection();
		$query = "INSERT INTO admin (username,password,pathname)
				VALUES ('$this->username','$this->password', '$this->pathname')";

		if ($conn->query($query) !== TRUE)
			echo 'user cannot add to databse';
		
	}
	
	public function setPath($pathname)
	{
		$this->pathname = $pathname;
	}
	
	public function getPath() { return $this->pathname; }

}


?>