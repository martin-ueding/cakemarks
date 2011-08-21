<?php
// Copyright (c) 2011 Martin Ueding <dev@martin-ueding.de>

App::import('Lib', 'CakemarksWebTestCase');

/**
 * Excerises the quick add box in the sidebar.
 *
 * @author Martin Ueding <dev@martin-ueding.de>
 */
class QuickAddTestCase extends CakemarksWebTestCase {
	/**
	 * Adds bookmark via the sidebar and checks whether it is added correctly.
	 *
	 * @author Martin Ueding <dev@martin-ueding.de>
	 * @param boolean reading_list Whether to add to the reading list.
	 */
	function input_to_reading_list($reading_list = false) {
		$this->get($this->baseurl."/");
		$this->verify_page_load();

		$this->input_title = String::uuid();
		$this->input_url = String::uuid().'.tld';
		$this->setField('data[Bookmark][title]', $this->input_title);
		$this->setField('data[Bookmark][url]', $this->input_url);
		$this->setField('data[Bookmark][reading_list]', $reading_list ? "1": "0");
		$this->click("Create Bookmark");

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
	 * Adds two bookmarks, one with reading list, one without.
	 *
	 * @author Martin Ueding <dev@martin-ueding.de>
	 */
	function test_input() {
		$this->input_to_reading_list(true);
		$this->input_to_reading_list(false);
	}
}
