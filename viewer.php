<?php

include('image.php');

class Viewer
{
	private $IMGMaker;
	private $currentPageN;
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

	public function getCurrentPage()
	{
		return $this->currentPageN;
	}

}

if($_POST['next'])
{
	$viewer = new Viewer("x.pdf", $_POST['pageNo']);
	$x = $viewer->nextPageN();
	echo '<center><img src='.$x.' width="500" height="500" >';
	echo '<br/><br/>';
	echo '<form action="" method="post">';
	echo '<input type="text" name="pageNo" value='.$viewer->getCurrentPage().'>';
	echo '<input type="submit" name="next" value="Next">';
	echo '</form></center>';
}
else
{
	echo '<center>';
	echo '<form action="" method="post">';
	echo 'Page : <input type="text" size="5" name="pageNo" value="0">';
	echo '<input type="submit" name="next" value="Next">';
	echo '</form></center>';
}

?>