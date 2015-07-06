<?php

include('config.php');


class User
{
	private $password;

	
	public function getPassword()
	{
		return $this->password;
	}

	public function setPassword()
	{
	
		$this->password = $this->randomPassword(8);
	}


	public function setLogPassword($logPass)
	{
	
		$this->password = $logPass;
	}



	public function randomPassword($size) {
	    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
	    $pass = array(); //remember to declare $pass as an array
	    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
	    
	    for ($i = 0; $i < $size; $i++) {
	        $n = rand(0, $alphaLength);
	        $pass[] = $alphabet[$n];
	    }
	    	return implode($pass); //turn the array into a string
	}




	public function save()
	{
		$config = new Config();
		$conn = $config->getConnection();
		$query = "INSERT INTO users (password)
				VALUES ('$this->password')";

		if ($conn->query($query) !== TRUE)
			echo 'user cannot add to databse';
		
	}

	public function userInfo()
	{
		$givenpass = $this->getPassword();
		echo "User Password : $givenpass". "<br>";
	}


	public function deleteUser($passwd)
	{
		$config = new Config();
		$conn = $config->getConnection();

		// sql to delete a record
		$sql = "DELETE FROM users WHERE password='$passwd'";

		if (mysqli_query($conn, $sql)) {
		   // echo "Record deleted successfully";
		} else {
		    echo "Error deleting record: " . mysqli_error($conn);
		}

	}


	public function searchUser($passwd)
	{
		$config = new Config();
		$conn = $config->getConnection();

		$sql = "SELECT id, password FROM users";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		    // output data of each row
		    while($row = $result->fetch_assoc()) {
		       // echo "id: " . $row["id"]. " - Name: " . $row["password"]. "<br>";
		   		if($passwd == $row["password"] ){
		   			return true;
		   		}
		    }
		} else {
		    echo "0 results";
		}



	}

}
	

	if( isset( $_POST['create'] )){

		$userM = new User();
		$userM->setPassword();
		$userM->save();
		$userM->userInfo();
	}
	
	if( isset( $_POST['pass'] )){
		session_start();
		$_SESSION['password'] = $_POST['pass'];
		
		$logUser = new User();
		$givenp = $_POST['pass'];
		if($logUser->searchUser($givenp)==true){
			echo "LOGGED IN   ";
			$logUser->deleteUser($givenp);
			echo '<meta http-equiv="refresh" content="3;URL=start.php">';
			
			//header("refresh:3;url=start.php");
			//die('THE ENJOYING WAY FOR READING ');
			
		}
		else{
			echo "ACCESS DENIED   ";
			echo '<meta http-equiv="refresh" content="3;URL=login.html">';
			//die('THE ENJOYING WAY FOR READING ');
		}
	}	

?>