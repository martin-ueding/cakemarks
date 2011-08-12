<?php
/* Keyword Test cases generated on: 2011-08-12 15:08:13 : 1313154073*/
App::import('Model', 'Keyword');

class KeywordTestCase extends CakeTestCase {
	var $fixtures = array('app.keyword', 'app.bookmark', 'app.visit', 'app.bookmarks_keyword');

	function startTest() {
		$this->Keyword =& ClassRegistry::init('Keyword');
	}

	function endTest() {
		unset($this->Keyword);
		ClassRegistry::flush();
	}

}
?>