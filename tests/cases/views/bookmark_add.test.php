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
		$this->assertPattern('#<div class="small_tag">[\s\n]*'
			.'<a href="[^"]+" class="black">'.$input_new_keyword.'#');
		$this->assertNoPattern("/This is on your reading list./");
		$this->assertPattern("/$input_new_keyword/");
	}

	/**
	 * Creates a new keyword and then creates a new bookmark which uses this
	 * keyword.
	 *
	 * @author Martin Ueding <dev@martin-ueding.de>
	 */
	function test_add_bookmark_with_existing_keyword() {
		$this->get($this->baseurl."/keywords/add");
		$this->verify_page_load();

		$new_keyword = String::uuid();
		$this->assertTrue($this->setField('data[Keyword][title]', $new_keyword));
		$this->click("Submit");

		$this->verify_page_load();

		// Find the ID of the newly created bookmark.
		$urlparts = explode('/', $this->getUrl());
		$this->assertTrue(!empty($urlparts));
		$keyword_id = $urlparts[count($urlparts)-1];
		$this->assertTrue($keyword_id > 0);


		$this->load_bookmark_add_page();

		$input_title = String::uuid();
		$input_url = String::uuid().'.tld';
		$this->assertTrue($this->setField('data[Bookmark][title]',
			$input_title));
		$this->assertTrue($this->setField('data[Bookmark][url]', $input_url));
		$this->assertTrue($this->setField('data[Keyword][Keyword][]',
			array($keyword_id)));
		$this->click("Submit");

		$this->verify_page_load();

		$this->assertPattern("/$input_title/");
		$this->assertPattern("/$input_url/");
		$this->check_for_keyword($new_keyword);
		$this->assertNoPattern("/This is on your reading list./");
		$this->assertPattern("/$new_keyword/");
	}
}
?>
