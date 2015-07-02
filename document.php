<?php

include('config.php');

class Document
{
	private $docName;
	private $title;
	private $pageNum;

	public function __construct($docName, $title, $pageNum)
	{
		$this->docName = $docName;
		$this->title = $title;
		$this->pageNum = $pageNum;
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

		$query = "INSERT INTO books (docname, title, pagenum)
				VALUES ('$this->docName', '$this->title', '$this->pageNum')";

		if ($conn->query($query) !== TRUE)
			echo 'sometning bad happened';
		
	}
	
	public function totalNumber()
	{
		$pdftext = file_get_contents($this->pdfName);
  		$num = preg_match_all("/\/Page\W/", $pdftext, $dummy);
  		return $num;
	}
}

$d = new Document("Kappa", "Keepo", 666);
$d->save();

?>