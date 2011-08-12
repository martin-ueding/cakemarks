<?php
/* Visit Test cases generated on: 2011-08-12 15:08:27 : 1313154147*/
App::import('Model', 'Visit');

class VisitTestCase extends CakeTestCase {
	var $fixtures = array('app.visit', 'app.bookmark', 'app.keyword', 'app.bookmarks_keyword');

	function startTest() {
		$this->Visit =& ClassRegistry::init('Visit');
	}

	function endTest() {
		unset($this->Visit);
		ClassRegistry::flush();
	}

}
?>