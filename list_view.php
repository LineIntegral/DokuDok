<?php
include_once("list_controller.php");

$link_list = "";

$id = 0;
foreach (list_docs() as $doc) {
	# code...
	$current_html = "<input type='radio' name='docname' >$doc<br>";
	$link_list.=$current_html;
}

echo "<form action='viewer.php' method='post' accept-charset='utf-8'>
		$link_list
<input type='submit' name='doc_form' value='Ok'>
</form>"

?>
