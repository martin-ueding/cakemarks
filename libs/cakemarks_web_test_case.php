<?php
// Copyright © 2011-2012 Martin Ueding <dev@martin-ueding.de>

class CakemarksWebTestCase extends CakeWebTestCase {
	function __construct() {
		$this->baseurl = "127.0.0.1".current(split("app", $_SERVER['PHP_SELF']));
	}

	/**
	 * Verifies the load of a page by checking the HTTP code and possible
	 * CakePHP warnings.
	 *
	 * @author Martin Ueding <dev@martin-ueding.de>
	 */
	function verify_page_load() {
		$this->assertResponse(200);
		$this->assertMime(array('text/plain', 'text/html'));
		$this->assertNoPattern("/Missing Controller/");
	}

	/**
	 * Loads the bookmark adding view.
	 *
	 * @author Martin Ueding <dev@martin-ueding.de>
	 */
	function load_bookmark_add_page() {
		$this->get($this->baseurl."/bookmarks/add");
		$this->verify_page_load();
		$this->assertPattern("/Add Bookmark/");
	}

	/**
	 * Adds a bookmark which can be on the reading list and does not have any
	 * keywords.
	 *
	 * @author Martin Ueding <dev@martin-ueding.de>
	 */
	function bookmark_add($reading_list = false) {
		$this->load_bookmark_add_page();

		$this->input_title = String::uuid();
		$this->input_url = String::uuid().'.tld';
		$this->assertTrue($this->setField('data[Bookmark][title]',
			$this->input_title));
		$this->assertTrue($this->setField('data[Bookmark][url]',
			$this->input_url));
		$this->assertTrue($this->setField('data[Bookmark][reading_list]',
			$reading_list ? "1" : false));
		$this->click("Submit");

		$this->verify_page_load();

		$this->assertPattern("/$this->input_title/");
		$this->assertPattern("/$this->input_url/");

		if ($reading_list) {
			$this->assertPattern("/This is on your reading list./");
		}
		else {
			$this->assertNoPattern("/This is on your reading list./");
		}
	}

	function check_for_keyword($keyword, $expected = true) {
		$pattern = '$<dd>[\s\n]*<ul>[\s\n]*<li>[\s\n]*<a href="[^"]+">'
			.$keyword.'$';
		if ($expected) {
			$this->assertPattern($pattern);
		}
		else {
			$this->assertNoPattern($pattern);
		}
	}
}
?>
