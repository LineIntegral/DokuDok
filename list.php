<?php
include("document.php");

class BookList
{
	private $path;
	private $fileArray;
	public function __construct($path)
	{
		$this->path = $path;
		$this->makeList();
	}
	
	public function makeList()
	{
		$files = scandir($this->path);
		$this->fileArray = array();
		
		for($i=0; $i<count($files); ++$i)
			if(stristr($files[$i], ".pdf"))
				array_push($this->fileArray, $files[$i]);

		//return $fileArray;
	}
	
	public function saveList()
	{
		removeOlds();
		addNews();
	}
	
	private function removeOlds()
	{
		
	}
	
	private function addNews()
	{
		foreach ($this->fileArray as $file) {
			# code...
			$title = explode(".", $file)[0];
			$pgnum = $this->totalNumber();
			$book = new Document($file, $title, $pgnum);
			$book->save();
		}
	}
	
	
}

$list = new BookList();
$files = $list->makeList(".");
echo"<pre>";print_r($files);echo"</pre>";


?>