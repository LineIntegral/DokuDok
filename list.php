<?php

class BookList
{
	public function makeList($path)
	{
		$files = scandir($path);
		$fileArray = array();
		
		for($i=0; $i<count($files); ++$i)
			if(stristr($files[$i], ".pdf"))
				array_push($fileArray, $files[$i]);

		return $fileArray;
	}
}

$list = new BookList();
$files = $list->makeList(".");
echo"<pre>";print_r($files);echo"</pre>";

?>