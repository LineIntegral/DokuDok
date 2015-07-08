<!DOCTYPE html>
<html>
<head>
<link rel='stylesheet prefetch' href='inc/jquery-ui.css'>
<link rel="stylesheet" href="inc/style.css">
</head>
<body>

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
	//echo $tst;
	User::deleteUser($_SESSION['password']);
	//echo 'passed';
	logout();
	 
	//direct('google.com');
}
list_verify();

$link_list = "";
$id = 0;
foreach (list_docs() as $doc) {
	# code...
	$current_html = "<input type='radio' name='docname' value='$doc'>$doc<br>";
	$link_list.=$current_html;
}
echo '<div class="login-card">';
echo '<h1>Book List</h1>';
echo "<form action='viewer.php' method='post' accept-charset='utf-8'>
		$link_list
<br/><input type='submit' name='doc_form' value='Read' class='login login-submit'>
</form>";

echo "<form action='' method='post'>
	<input type='submit' name='lout' value='Logout' class='login login-submit'>
	</form>";
echo '</div>';
//logout();
?>

<script src='inc/jquery.min.js'></script>
<script src='inc/jquery-ui.min.js'></script>
</body>
</html>