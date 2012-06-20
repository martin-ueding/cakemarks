<?php
// Copyright © 2011-2012 Martin Ueding <dev@martin-ueding.de>

App::import('Lib', 'CakemarksWebTestCase');

class BookmarkDeleteTestCase extends CakemarksWebTestCase {
	/**
	 * Adds a bookmark and deletes it right after. Then it checks the main page
	 * whether it is still there.
	 *
	 * @author Martin Ueding <dev@martin-ueding.de>
	 */
	function test_bookmark_delete() {
		$this->bookmark_add(false);

		$this->click("Delete Bookmark");

		$this->get($this->baseurl."/");
		$this->verify_page_load();

		$this->assertNoPattern("/$this->input_title/");
	}
}
?>
