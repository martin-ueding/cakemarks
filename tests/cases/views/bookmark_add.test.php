<?php
// Copyright (c) 2011 Martin Ueding <dev@martin-ueding.de>

App::import('Lib', 'CakemarksWebTestCase');

class BookmarkAddTestCase extends CakemarksWebTestCase {
	/**
	 * Adds two bookmarks, one on the reading list, the other not.
	 *
	 * @author Martin Ueding <dev@martin-ueding.de>
	 */
	function test_bookmark_add_reading_list() {
		$this->bookmark_add(true);
		$this->bookmark_add(false);
	}

	/**
	 * Adds a bookmark with a new keyword.
	 *
	 * @author Martin Ueding <dev@martin-ueding.de>
	 */
	function test_add_bookmark_with_new_keyword() {
		$this->load_bookmark_add_page();

		$input_title = String::uuid();
		$input_url = String::uuid().'.tld';
		$input_new_keyword = String::uuid();
		$this->assertTrue($this->setField('data[Bookmark][title]',
			$input_title));
		$this->assertTrue($this->setField('data[Bookmark][url]', $input_url));
		$this->assertTrue($this->setField('data[Keyword][title]',
			$input_new_keyword));
		$this->click("Submit");

		$this->verify_page_load();

		$this->assertPattern("/$input_title/");
		$this->assertPattern("/$input_url/");
		$this->check_for_keyword($input_new_keyword);
		$this->assertNoPattern("/This is on your reading list./");
		$this->assertPattern("/$input_new_keyword/");
	}

	/**
	 * Adds a bookmark and selects the "Linux" keyword which has to exist at ID
	 * 124 in the database before this test.
	 *
	 * TODO create a keyword dynamically
	 *
	 * @author Martin Ueding <dev@martin-ueding.de>
	 */
	function test_add_bookmark_with_existing_keyword() {
		$this->load_bookmark_add_page();

		$input_title = String::uuid();
		$input_url = String::uuid().'.tld';
		$this->assertTrue($this->setField('data[Bookmark][title]',
			$input_title));
		$this->assertTrue($this->setField('data[Bookmark][url]', $input_url));
		$this->assertTrue($this->setField('data[Keyword][Keyword][]',
			array(124)));
		$this->click("Submit");

		$this->verify_page_load();

		$this->assertPattern("/$input_title/");
		$this->assertPattern("/$input_url/");
		$this->check_for_keyword("Linux");
		$this->assertNoPattern("/This is on your reading list./");
		$this->assertPattern("/Linux/");
	}
}
?>
