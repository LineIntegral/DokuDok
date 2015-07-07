<?php
class SomethingGood {
	private static $instance = NULL;
	private $a;
	private function __constuct() {
		$a = 30;
	}
	
	public static function getInstance() {
		if ($this->instance == NULL)
			$this->instance = new SomethingGood();
		return $this->instance;
	}
}
?>