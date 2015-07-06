<?php
include_once("list_controller.php");
include_once("client_functions.php");
include_once("deleter.php");
include_once("users.php");
//("users.php");
//echo 'something good';
//session_start();

if (isset($_POST['lout'])){
	session_start();
	//echo $_SESSION['password'];
	echo $tst;
	User::deleteUser($_SESSION['password']);
	echo 'passed';
	 logout();
	 
	 direct('google.com');
}
list_verify();

$link_list = "";
$id = 0;
foreach (list_docs() as $doc) {
	# code...
	$current_html = "<input type='radio' name='docname' value='$doc'>$doc<br>";
	$link_list.=$current_html;
}

echo "<form action='viewer.php' method='post' accept-charset='utf-8'>
		$link_list
<input type='submit' name='doc_form' value='Ok'>
</form>";

echo "<form action='' method='post'>
	<input type='submit' name='lout' value='logout'>
	</form>";
//logout();
?>
