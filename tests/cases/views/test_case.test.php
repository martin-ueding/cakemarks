<?php
// Copyright (c) 2011 Martin Ueding <dev@martin-ueding.de>

/**
 * This is a test case which just tries out some very basic features of the
 * testing itself and the site.
 * 
 * @author Martin Ueding <dev@martin-ueding.de>
 */
class TestCaseTestCase extends CakeWebTestCase {
	function __construct() {
		$this->baseurl = "127.0.0.1".current(split("webroot",
			$_SERVER['PHP_SELF']));
	}

	function testPositive() {
		$this->assertTrue(true);
		$this->assertFalse(!true);
	}

	function testPost() {
		$this->get($this->baseurl."/");
		$this->assertResponse(200);
	}

	function testForLogo() {
		$this->get($this->baseurl."/");
		$this->assertPattern('/Cakemarks/');
		$this->assertNoPattern('/CakePHP/');
	}
}
