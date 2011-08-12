<?php
/* Bookmarks Test cases generated on: 2011-08-12 15:08:50 : 1313157050*/
App::import('Controller', 'Bookmarks');

class TestBookmarksController extends BookmarksController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class BookmarksControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.bookmark', 'app.visit', 'app.keyword', 'app.bookmarks_keyword');

	function startTest() {
		$this->Bookmarks =& new TestBookmarksController();
		$this->Bookmarks->constructClasses();
	}

	function endTest() {
		unset($this->Bookmarks);
		ClassRegistry::flush();
	}

	function testIndex() {

	}

	function testView() {

	}

	function testAdd() {

	}

	function testEdit() {

	}

	function testDelete() {

	}

	function testAdminIndex() {

	}

	function testAdminView() {

	}

	function testAdminAdd() {

	}

	function testAdminEdit() {

	}

	function testAdminDelete() {

	}

}
?>