<?php

include('config.php');

class Document
{
	private $docName;
	private $title;
	private $pageNum;
	private $path;

	public function __construct($path, $docName, $title)
	{
		$this->path = $path;
		$this->docName = $docName;
		$this->title = $title;
		$this->pageNum = $this->totalNumber();
	}
	
	public function getPath()
	{
		return $this->path;
	}

	public function getDocName()
	{	
		return $this->docName;	
	}

	public function getTitle()
	{	
		return $this->title;	
	}
	public function getPageNum()
	{	
		return $this->pageNum;	
	}

	public function save()
	{
		$config = new Config();
		$conn = $config->getConnection();
		
		$exist_q = "SELECT docname FROM books WHERE docname = '$this->docName'";
		if (mysqli_num_rows($conn->query($exist_q)) != 0) return;
		
		$query = "INSERT INTO books (docname, title, pagenum)
				VALUES ('$this->docName', '$this->title', '$this->pageNum')";
		if ($conn->query($query) !== TRUE)
			echo 'something bad happened while saving';
		
	}
	
	public function totalNumber()
	{
		$pdftext = file_get_contents($this->path.$this->docName);
  		$num = preg_match_all("/\/Page\W/", $pdftext, $dummy);
  		return $num;
	}
}

//$d = new Document("Kappa", "Keepo", 666);
//$d->save();

?>