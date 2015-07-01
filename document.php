<?php
	/**
	* Description
	*/
	include('config.php');

	
	doku_setup();
	
	class Document
	{
		private $docName;
		private $title;
		private $pageNum;
		public function __construct($docName, $title, $page)
		{
			# code...
			$this->docName = $docName;
			
			$this->setTitle($title);
			$this->pageNum = $page;
			
		}
		
		public function getDocName() { return $this->docname; }
		public function getTitle() { return $this->title; }
		public function getPageNum() { return $this->pageNum; }
		
		public function setTitle($title)
		{
			$this->title = $title;
			
		}
		
		public function save()
		{
			global $conn;
			$query = "INSERT INTO books (docname, title, pagenum)
				VALUES ('$this->docName', '$this->title', '$this->pageNum')";
			//echo 'burda';
			//echo $query;
			//if (!isset($conn)) echo 'tamam';
			if ($conn->query($query) !== TRUE)
				echo 'sometning bas happened';
			echo 'burda';
		}	 
	}
	
	
	$d = new Document("something.pdf", "something", 322);
	$d->save();
	doku_end();
?>