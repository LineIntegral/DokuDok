<?php
//need to work on it
include_once('image.php');
include_once('config.php');
//include_once('client_functions.php');
//echo 'here';
class Viewer
{
	private $IMGMaker;
	public static $currentPageN;
	private $pdfName;

	public function __construct($pdfName, $currentPageN)
	{
		$this->IMGMaker = new PDFtoIMG($pdfName);
		$this->currentPageN = $currentPageN;
		$this->pdfName = $pdfName;
	}

	public static function titleToDocName($title)
	{
		$query = "SELECT docname,title from books";
		$conn = new Config();
		$result = $conn->getConnection()->query($query);

		if($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc())
			{
				if($row["title"] == $title)
					return $row["docname"];
			}
		}
	}

	public function hasNext()
	{
		return $this->currentPageN < $IMGMaker->getPageCount();
	}

	public function nextPageN()
	{
		return $this->IMGMaker->makeIMG($this->currentPageN++);
	}

	public function previousPageN()
	{
		return $this->IMGMaker->makeIMG(--$this->currentPageN);
	}

	public function getCurrentPage()
	{
		return $this->currentPageN;
	}

}

?>