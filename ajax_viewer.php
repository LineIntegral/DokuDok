<?php
include_once('image.php');
include_once('config.php');
include_once('client_functions.php');
//include_once('viewer.php');

if(logged_in() == FALSE)
{
	//direct('login.php', 0);
}

$page = 0;


?>

<script>

//page = 0;
var xmlhttp = new XMLHttpRequest();

function load(inc)
{
	
	xmlhttp.onreadystatechange=function() 
	{
	    if (xmlhttp.readyState==4 && xmlhttp.status==200)
	    {
			document.getElementById("docview").innerHTML=xmlhttp.responseText;
			page = inc(page);
	    }
	}
	xmlhttp.open("POST","view_img.php",true);
	
	xmlhttp.send();
	
}

function send()
{
	//var xmlhttp = new XMLHttpRequest();
	//if (!page) page=0;
	var page=0;
	return function() {
		xmlhttp.open("POST","view_img.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		var pgstr = new String(page);
		document.getElementById("test").innerHTML = pgstr;
		xmlhttp.send("pagenum="+pgstr);
		page++;
	}
}

var snd = send();

function loadNext()
{
	//send();
	load(function(a) {a + 1});
	
}

function loadPrev()
{
	page = 0;
	//send();
	load(function(a) { a - 1} );
}
//document.writle(page);

</script>
<div id="test"></div>
<input type='button' name='next' value='next' id='next' onclick='snd()'>
<input type='button' name='previous' value='previous' id='previous' onclick='loadPrev()'>
<div id='docview'></div>