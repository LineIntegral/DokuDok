<?php
include_once("config.php");
include_once("adminUser.php");
include_once("list.php");
include_once("client_functions.php");
if(isset($_POST['sub']))
{
	$myadmin = new AdminUser();
	$myadmin->setAUserName($_POST['username']);
	$myadmin->setAPassword($_POST['password']);
	$myadmin->setPath($_POST['pathname']);
	$myadmin->save();	
	$list = new BookList($_POST['pathname']);
	$list->saveList();
	echo "Book list has been created<br/><br/>";
	echo "Usernane : ".$myadmin->getAUserName()."<br/>";
	echo "Password : ".$myadmin->getAPassword()."<br/>";
	echo "Pathname : ".$myadmin->getPath()."<br/>";
	direct('admin.php', 0);
}
else
{
	$myconf = new Config();
	$myconf->createDB();
	echo "Database Created<br/>";
	$myconf->createUserTable();
	echo "User table Created<br/>";
	$myconf->createBooksTable();
	echo "Books table Created<br/>";
	$myconf->createAdminTable();
	echo "Admin table Created<br/><br/>";
	echo '<form action="" method="post">';
	echo 'Username : <input type="text" name="username"><br/>';
	echo 'Password : <input type="text" name="password"><br/>';
	echo 'Path : <input type="text" name="pathname"><br/>';
	echo '<input type="submit" name="sub" value="Send">';
	echo '</form>';	
}
?>