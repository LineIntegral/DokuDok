<?php

include_once("client_functions.php");

session_start();

if(file_exists("install.php"))
	direct("install.php", 0);
else
	direct("login.php", 0);

?>