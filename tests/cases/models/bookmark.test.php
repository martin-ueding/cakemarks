<?php
/* Bookmark Test cases generated on: 2011-08-12 15:08:06 : 1313155926*/
App::import('Model', 'Bookmark');

class BookmarkTestCase extends CakeTestCase {
	var $fixtures = array('app.bookmark', 'app.visit', 'app.keyword', 'app.bookmarks_keyword');

	function startTest() {
		$this->Bookmark =& ClassRegistry::init('Bookmark');
	}

	function endTest() {
		unset($this->Bookmark);
		ClassRegistry::flush();
	}

}
?>