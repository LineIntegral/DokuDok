 <?php
session_start();
 echo 'your session is' . $_SESSION['password'];
 //echo session.gc_maxlifetime;
 //echo $_SESSION['LAST_ACTIVITY'];
  if( isset( $_SESSION['password'] )){

  echo 	'<img src="book.jpg" alt="Book" height="1000" width="1000">';
 
  	//session_destroy();
	echo '<meta http-equiv="refresh" content="3;URL=login.html">';
	
	die('THE ENJOYING WAY FOR READING ');
  }
  else{
  	echo "YOUR SESSION END ";
  }	
 
 ?>  