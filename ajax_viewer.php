<?php
include_once('image.php');
include_once('config.php');
include_once('client_functions.php');
//include_once('viewer.php');

if(logged_in() == FALSE)
{
	direct('login.php', 0);
}

?>

<script>

//page = 0;
var xmlhttp = new XMLHttpRequest();

function load()
{
	
	xmlhttp.onreadystatechange=function() 
	{
	    if (xmlhttp.readyState==4 && xmlhttp.status==200)
	    {
			document.getElementById("docview").innerHTML=xmlhttp.responseText;
			
	    }
	}
	xmlhttp.open("POST","view_img.php",true);
	
	xmlhttp.send();
	
}

var page = -1;

function send(inc) 
{
	page = inc(page);
	xmlhttp.open("POST","view_img.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	var pgstr = new String(page);
	//document.getElementById("test").innerHTML = pgstr;
	xmlhttp.send("pagenum="+pgstr);
	
}

//var snd = send();
load();
function loadNext()
{
	send(function(a) {return a + 1;});
	
}

function loadPrev()
{
	send(function(a) {return a - 1;});
}
//document.writle(page);

</script>
<div id="test"></div>
<input type='button' name='next' value='next' id='next' onclick='loadNext()'>
<input type='button' name='previous' value='previous' id='previous' onclick='loadPrev()'>
<div id='docview'></div>