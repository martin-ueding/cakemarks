<?php
// Copyright (c) 2011 Martin Ueding <dev@martin-ueding.de>

class QuickAddTestCase extends CakeWebTestCase {
	function __construct() {
		$this->baseurl = "127.0.0.1".current(split("app", $_SERVER['PHP_SELF']));
	}

	function test_input_to_reading_list() {
		$input = uniqid();

		$this->get($this->baseurl."/");
		$this->assertResponse(200);
		$this->assertNoPattern("/$input/");
		$this->assertNoPattern("/Missing Controller/");

		$this->setField('data[Bookmark][title]', $input);
		$this->setField('data[Bookmark][url]', "$input.tld");
		$this->setField('data[Bookmark][reading_list]', "1");
		$this->click("Create Bookmark");

		$this->get($this->baseurl."/");
		$this->assertResponse(200);
		$this->assertNoPattern("/Missing Controller/");

		$this->assertPattern("/newest/");
		$this->assertPattern("/$input/");
	}
}
