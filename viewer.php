<?php
//need to work on it
include('image.php');

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

if(isset($_POST['next']))
{
	$viewer = new Viewer("books/".$_POST['bookName'], $_POST['pageNo']);
	$x = $viewer->nextPageN();
	echo '<center><img src='.$x.' width="500" height="500" >';
	echo '<br/><br/>';
	echo '<form action="" method="post">';
	echo '<input type="hidden" name="pageNo" value='.$viewer->getCurrentPage().'>';
	echo '<input type="hidden" name="bookName" value='.$_POST['bookName'].'>';
	if($viewer->getCurrentPage() > 1) echo '<input type="submit" name="previous" value="Previous">';
	echo '<input type="submit" name="next" value="Next">';
	echo '</form></center>';
}
elseif(isset($_POST['previous']))
{
	Viewer::$currentPageN = $_POST['pageNo']-1;
	$viewer = new Viewer("books/".$_POST['bookName'], Viewer::$currentPageN);
	$x = $viewer->previousPageN();
	echo '<center><img src='.$x.' width="500" height="500" >';
	echo '<br/><br/>';
	echo '<form action="" method="post">';
	echo '<input type="hidden" name="pageNo" value='.Viewer::$currentPageN.'>';
	echo '<input type="hidden" name="bookName" value='.$_POST['bookName'].'>';
	if($viewer->getCurrentPage() > 1) echo '<input type="submit" name="previous" value="Previous">';
	echo '<input type="submit" name="next" value="Next">';
	echo '</form></center>';
}
else
{
	echo '<center>';
	echo '<form action="" method="post">';
	echo '<input type="hidden" size="5" name="pageNo" value="0">';
	echo '<input type="text" size="5" name="bookName">';
	echo '<input type="submit" name="next" value="Start Reading">';
	echo '</form></center>';
}

?>