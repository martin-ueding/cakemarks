<?php
# Copyright © 2011-2012 Martin Ueding <dev@martin-ueding.de>
# Licensed under the MIT License (http://www.opensource.org/licenses/mit-license.php).

App::import('Lib', 'CakemarksWebTestCase');

class BookmarkEditTestCase extends CakemarksWebTestCase {
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

		$this->assertTrue($this->setField('data[Bookmark][title]',
			$new_title));
		$this->assertTrue($this->setField('data[Bookmark][url]', $new_url));
		$this->assertTrue($this->setField('data[Bookmark][reading_list]',
			$edit_to_list ? "1" : false));
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

	function test_add_new_keyword_to_bookmark() {
		$this->bookmark_add();

		$this->click("Edit Bookmark");

		$input_new_keyword = String::uuid();
		$this->assertTrue($this->setField('data[Keyword][title]',
			$input_new_keyword));
		$this->click("Submit");

		$this->verify_page_load();

		$this->check_for_keyword($input_new_keyword);
	}
}
?>
