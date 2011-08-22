<?php
// Copyright (c) 2011 Martin Ueding <dev@martin-ueding.de>

App::import('Lib', 'CakemarksWebTestCase');

/**
 * Exercises the bookmarks.
 *
 * @author Martin Ueding <dev@martin-ueding.de>
 */
class BookmarkTestCase extends CakemarksWebTestCase {
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

		$this->input_title = String::uuid();
		$this->input_url = String::uuid().'.tld';
		$this->input_new_keyword = String::uuid();
		$this->setField('data[Bookmark][title]', $this->input_title);
		$this->setField('data[Bookmark][url]', $this->input_url);
		$this->setField('data[Keyword][title]', $this->input_new_keyword);
		$this->click("Submit");

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
	function test_add_bookmark_with_existing_keyword() {
		$this->load_bookmark_add_page();

		$this->input_title = String::uuid();
		$this->input_url = String::uuid().'.tld';
		$this->setField('data[Bookmark][title]', $this->input_title);
		$this->setField('data[Bookmark][url]', $this->input_url);
		$this->setField('data[Keyword][Keyword][]', array(124));
		$this->click("Submit");

		$this->verify_page_load();

		$this->assertPattern("/$this->input_title/");
		$this->assertPattern("/$this->input_url/");
		$this->assertPattern('$<a href="[^"]+" class="black">Linux</a>$');
		$this->assertNoPattern("/This is on your reading list./");
	}


	/*************************************************************************/
	/*                                                                       */
	/*                                Editing                                */
	/*                                                                       */
	/*************************************************************************/

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
		$this->assertTrue($this->setField('data[Bookmark][reading_list]', $edit_to_list ? "1" : 0));
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


	/*************************************************************************/
	/*                                                                       */
	/*                               Deleting                                */
	/*                                                                       */
	/*************************************************************************/

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
