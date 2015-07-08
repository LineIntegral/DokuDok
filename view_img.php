<!DOCTYPE html>
<html>
<head>
<link rel='stylesheet prefetch' href='inc/jquery-ui.css'>
<link rel="stylesheet" href="inc/style.css">
</head>
<body>

<?php

include_once('viewer_model.php');
include_once('client_functions.php');

if (isset($_POST['pagenum'])) 
{	
	$pgn = (int)$_POST['pagenum'];
	$totalPage = totalNumber(get_pathname().Viewer::titleToDocName($_POST['docname']));
	
	if ($pgn < $totalPage && $pgn >= 0)
	{
		$view = new Viewer(get_pathname().Viewer::titleToDocName($_POST['docname']), $_POST['pagenum']);
		$x = $view->nextPageN();
		echo '<img src='.$x.' width="60%" height="%70" >';

	}
}

?>

<script src='inc/jquery.min.js'></script>
<script src='inc/jquery-ui.min.js'></script>
</body>
</html>