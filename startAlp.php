 <?php
session_start();
 echo 'your session is' . $_SESSION['password'];
  
  if( isset( $_SESSION['password'] )){

  echo 	'<img src="book.jpg" alt="Book" height="1000" width="1000">';
 

	header("refresh:10;login.html");
	die('THE ENJOYING WAY FOR READING ');
  }
  else{
  	echo "YOUR SESSION END ";
  }	
 
 ?>  