<?php
//need to work on it
include_once('image.php');
include_once('config.php');
include_once('client_functions.php');

if(logged_in() == FALSE)
{
	direct('login.php', 0);
}

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

echo $_POST['docname'];


if(isset($_POST['next']))
{
	$viewer = new Viewer(get_pathname().Viewer::titleToDocName($_POST['bookName']), $_POST['pageNo']);
	$x = $viewer->nextPageN();
	echo '<center><img src='.$x.' width="500" height="500" >';
	echo '<br/><br/>';
	echo '<form action="" method="post">';
	echo '<input type="hidden" name="pageNo" value='.$viewer->getCurrentPage().'>';
	echo '<input type="hidden" name="bookName" value="'.$_POST['bookName'].'"">';
	if($viewer->getCurrentPage() > 1) echo '<input type="submit" name="previous" value="Previous">';
	echo '<input type="submit" name="next" value="Next">';
	echo '</form></center>';
}
elseif(isset($_POST['previous']))
{
	Viewer::$currentPageN = $_POST['pageNo']-1;
	$viewer = new Viewer(get_pathname().Viewer::titleToDocName($_POST['bookName']), Viewer::$currentPageN);
	$x = $viewer->previousPageN();
	echo '<center><img src='.$x.' width="500" height="500" >';
	echo '<br/><br/>';
	echo '<form action="" method="post">';
	echo '<input type="hidden" name="pageNo" value='.Viewer::$currentPageN.'>';
	echo '<input type="hidden" name="bookName" value="'.$_POST['bookName'].'">';
	if($viewer->getCurrentPage() > 1) echo '<input type="submit" name="previous" value="Previous">';
	echo '<input type="submit" name="next" value="Next">';
	echo '</form></center>';
}
elseif(isset($_POST['doc_form']))
{
	$viewer = new Viewer(get_pathname().Viewer::titleToDocName($_POST['docname']), 0);
	$x = $viewer->nextPageN();
	echo '<center><img src='.$x.' width="500" height="500" >';
	echo '<br/><br/>';
	echo '<form action="" method="post">';
	echo '<input type="hidden" name="pageNo" value='.$viewer->getCurrentPage().'>';
	echo '<input type="hidden" name="bookName" value="'.$_POST['docname'].'">';
	if($viewer->getCurrentPage() > 1) echo '<input type="submit" name="previous" value="Previous">';
	echo '<input type="submit" name="next" value="Next">';
	echo '</form></center>';
}
else
{
	direct('login.php', 0);
}


?>