<?php
/* Keywords Test cases generated on: 2011-08-12 15:08:51 : 1313154591*/
App::import('Controller', 'Keywords');

class TestKeywordsController extends KeywordsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class KeywordsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.keyword', 'app.bookmark', 'app.visit', 'app.bookmarks_keyword');

	function startTest() {
		$this->Keywords =& new TestKeywordsController();
		$this->Keywords->constructClasses();
	}

	function endTest() {
		unset($this->Keywords);
		ClassRegistry::flush();
	}

}
?>