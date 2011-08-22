<?php
// Copyright (c) 2011 Martin Ueding <dev@martin-ueding.de>

App::import('Lib', 'CakemarksWebTestCase');

/**
 * Exercises the adding of bookmarks on the main adding page.
 *
 * @author Martin Ueding <dev@martin-ueding.de>
 */
class BookmarkEditTestCase extends CakemarksWebTestCase {
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
	 * Adds a bookmark which can be on the reading list and does not have any
	 * keywords.
	 *
	 * @author Martin Ueding <dev@martin-ueding.de>
	 */
	function bookmark_add($reading_list = false) {
		$this->load_bookmark_add_page();

		$this->input_title = String::uuid();
		$this->input_url = String::uuid().'.tld';
		$this->setField('data[Bookmark][title]', $this->input_title);
		$this->setField('data[Bookmark][url]', $this->input_url);
		$this->setField('data[Bookmark][reading_list]', $reading_list ? "1" : "0");
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

	/**
	 * Adds two bookmarks, one on the reading list, the other not.
	 *
	 * @author Martin Ueding <dev@martin-ueding.de>
	 */
	function bookmark_edit_put_on_off_reading_list($edit_to_list = true) {
		$this->bookmark_add(!$edit_to_list);

		$this->click("Edit Bookmark");
		$this->verify_page_load();
		$this->assertPattern("/Edit Bookmark/");

		$this->assertPattern("/$this->input_title/");
		$this->assertPattern("/$this->input_url/");

		$new_title = String::uuid();
		$new_url = String::uuid().".tld";

		$this->assertTrue($this->setField('data[Bookmark][title]', $new_title));
		$this->assertTrue($this->setField('data[Bookmark][url]', $new_url));
		$this->assertTrue($this->setField('data[Bookmark][reading_list]', $edit_to_list ? "1" : ""));
		$this->click("Submit");

		$this->verify_page_load();

		$this->assertPattern("/$new_title/");
		$this->assertPattern("/$new_url/");

		if ($edit_to_list) {
			$this->assertPattern("/This is on your reading list./");
		}
		else {
			$this->assertNoPattern("/This is on your reading list./");
		}
	}

	function test_edit_reading_list() {
		$this->bookmark_edit_put_on_off_reading_list(true);
		$this->bookmark_edit_put_on_off_reading_list(false);
	}
}
?>
