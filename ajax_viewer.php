<?php
include_once('image.php');
include_once('config.php');
include_once('client_functions.php');

if(logged_in() == FALSE)
{
	direct('login.php', 0);
}

?>

<script>

var xmlhttp = new XMLHttpRequest();

function load()
{
	xmlhttp.onreadystatechange=function() {
	    if (xmlhttp.readyState==4 && xmlhttp.status==200)
			document.getElementById("docview").innerHTML = xmlhttp.responseText;
	}
	
	xmlhttp.open("POST","view_img.php",true);
	
	xmlhttp.send();
	
}

var page = -1;

function send(inc) 
{
	<?php if(logged_in() == FALSE) direct('login.php', 0); ?>;
	page = inc(page);
	var docname = <?php echo json_encode($_POST['docname']); ?>;
	xmlhttp.open("POST","view_img.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("pagenum="+page+"&docname="+docname);
	
}

load();

function loadNext()
{
	send(function(a) {return a + 1;});	
}

function loadPrev()
{
	send(function(a) {return a - 1;});
}

function goBack() {
	window.location.href = "login.php";
}
</script>
<html>
<head>
<link rel='stylesheet prefetch' href='inc/jquery-ui.css'>
<link rel="stylesheet" href="inc/style.css">	
</head>
<body onload="loadNext()">

<center>

<!-- <div id="test"></div>-->
<div class="container">
   <div class="column-center"><div id='docview'></div></div>
   <div class="column-left-top"><input type='button' value='books' id='books' class='login login-submit' onclick='goBack()'></div>
 <div class="column-left"><input type='button' name='previous' value='previous' id='previous' class='login login-submit' onclick='loadPrev()'>
</div>
   <div class="column-right"><input type='button' name='next' value='next' id='next' class='login login-submit' onclick='loadNext()'>

</div>
	
</div>





</center>
<script src='inc/jquery.min.js'></script>
<script src='inc/jquery-ui.min.js'></script>
</body>
</html>