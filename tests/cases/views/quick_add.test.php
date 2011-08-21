<?php
// Copyright (c) 2011 Martin Ueding <dev@martin-ueding.de>

/**
 * Excerises the quick add box in the sidebar.
 *
 * @author Martin Ueding <dev@martin-ueding.de>
 */
class QuickAddTestCase extends CakeWebTestCase {
	function __construct() {
		$this->baseurl = "127.0.0.1".current(split("app", $_SERVER['PHP_SELF']));
	}

	/**
	 * Adds bookmark via the sidebar and checks whether it appears on the
	 * startscreen.
	 *
	 * @author Martin Ueding <dev@martin-ueding.de>
	 */
	function test_input_to_reading_list() {
		$this->get($this->baseurl."/");
		$this->assertResponse(200);
		$this->assertNoPattern("/Missing Controller/");

		$this->input_title = String::uuid();
		$this->input_url = String::uuid().'.tld';
		$this->setField('data[Bookmark][title]', $this->input_title);
		$this->setField('data[Bookmark][url]', $this->input_url);
		$this->setField('data[Bookmark][reading_list]', "1");
		$this->click("Create Bookmark");

		$this->assertResponse(200);
		$this->assertNoPattern("/Missing Controller/");

		$this->assertPattern("/$this->input_title/");
		$this->assertPattern("/$this->input_url/");
		$this->assertNoPattern("/This is on your reading list./");
	}
}
