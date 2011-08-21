<?php
// Copyright (c) 2011 Martin Ueding <dev@martin-ueding.de>

/**
 * Exercises the adding of bookmarks on the main adding page.
 *
 * @author Martin Ueding <dev@martin-ueding.de>
 */
class BookmarkAddTestCase extends CakeWebTestCase {
	function __construct() {
		$this->baseurl = "127.0.0.1".current(split("app", $_SERVER['PHP_SELF']));
	}

	/**
	 * Loads the bookmark adding view.
	 *
	 * @author Martin Ueding <dev@martin-ueding.de>
	 */
	function load_bookmark_add_page() {
		$this->get($this->baseurl."/bookmarks/add");
		$this->verify_page_load();
	}

	/**
	 * Verifies the load of a page by checking the HTTP code and possible
	 * CakePHP warnings.
	 *
	 * @author Martin Ueding <dev@martin-ueding.de>
	 */
	function verify_page_load() {
		$this->assertResponse(200);
		$this->assertNoPattern("/Missing Controller/");
	}

	/**
	 * Adds a bookmark which is not on the reading list and does not have any
	 * keywords.
	 *
	 * @author Martin Ueding <dev@martin-ueding.de>
	 */
	function test_bookmark_add() {
		$this->load_bookmark_add_page();

		$this->input_title = String::uuid();
		$this->input_url = String::uuid().'.tld';
		$this->setField('data[Bookmark][title]', $this->input_title);
		$this->setField('data[Bookmark][url]', $this->input_url);
		$this->setField('data[Bookmark][reading_list]', "0");
		$this->click("Create Bookmark");

		$this->verify_page_load();

		$this->assertPattern("/$this->input_title/");
		$this->assertPattern("/$this->input_url/");
		$this->assertNoPattern("/This is on your reading list./");
	}

	/**
	 * Adds a bookmark which is on the reading list but has no keywords.
	 *
	 * @author Martin Ueding <dev@martin-ueding.de>
	 */
	function test_bookmark_add_reading_list() {
		$this->load_bookmark_add_page();

		$this->input_title = String::uuid();
		$this->input_url = String::uuid().'.tld';
		$this->setField('data[Bookmark][title]', $this->input_title);
		$this->setField('data[Bookmark][url]', $this->input_url);
		$this->setField('data[Bookmark][reading_list]', "1");
		$this->click("Create Bookmark");

		$this->verify_page_load();

		$this->assertPattern("/$this->input_title/");
		$this->assertPattern("/$this->input_url/");
		$this->assertPattern("/This is on your reading list./");
	}

	/**
	 * Adds a bookmark with a new keyword.
	 *
	 * @author Martin Ueding <dev@martin-ueding.de>
	 */
	function test_bookmark_with_new_keyword() {
		$this->load_bookmark_add_page();

		$this->input_title = String::uuid();
		$this->input_url = String::uuid().'.tld';
		$this->input_new_keyword = String::uuid();
		$this->setField('data[Bookmark][title]', $this->input_title);
		$this->setField('data[Bookmark][url]', $this->input_url);
		$this->setField('data[Keyword][title]', $this->input_new_keyword);
		$this->click("Create Bookmark");

		$this->verify_page_load();

		$this->assertPattern("/$this->input_title/");
		$this->assertPattern("/$this->input_url/");
		$this->assertPattern("/$this->input_new_keyword/");
		$this->assertNoPattern("/This is on your reading list./");
	}

	/**
	 * Adds a bookmark and selects the "Linux" keyword which has to exist at ID
	 * 124 in the database before this test.
	 *
	 * TODO create a keyword dynamically
	 *
	 * @author Martin Ueding <dev@martin-ueding.de>
	 */
	function test_bookmark_with_existing_keyword() {
		$this->load_bookmark_add_page();

		$this->input_title = String::uuid();
		$this->input_url = String::uuid().'.tld';
		$this->setField('data[Bookmark][title]', $this->input_title);
		$this->setField('data[Bookmark][url]', $this->input_url);
		$this->setField('data[Keyword][Keyword][]', array(124));
		$this->click("Create Bookmark");

		$this->verify_page_load();

		$this->assertPattern("/$this->input_title/");
		$this->assertPattern("/$this->input_url/");
		$this->assertPattern('$<a href="[^"]+" class="black">Linux</a>$');
		$this->assertNoPattern("/This is on your reading list./");
	}
}
?>
