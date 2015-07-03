<?php
include('config.php');


class AdminUser
{

	private $username;
	private $password;

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
		$query = "INSERT INTO admin (username,password)
				VALUES ('$this->username','$this->password')";

		if ($conn->query($query) !== TRUE)
			echo 'user cannot add to databse';
		
	}

}

$myadmin = new AdminUser;
$myadmin->setAUserName("alper");
$myadmin->setAPassword("7896");
	
echo $myadmin->getAUserName();
echo $myadmin->getAPassword();

$myadmin->save();
?>